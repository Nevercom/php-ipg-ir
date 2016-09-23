<?php

namespace IPG\Gateways\SamanKish;


use Exception;
use IPG\Contract\AbstractIPG;
use IPG\Models\PaymentResponse;
use IPG\Models\ValidationResponse;
use IPG\Models\VerificationResponse;

class SamanKishIPG extends AbstractIPG {
    protected $MID;
    protected $PASS;
    private   $service;
    private   $tokenservice;
    private   $BASE_TARGET_URL   = "https://sep.shaparak.ir/Payment.aspx";
    private   $errorCode         = -9000;
    private   $errorMessagesList = [
        -1  => "خطای در پردازش اطلاعات ارسالی",
        -3  => "ورودی‌ها حاوی کاراکتر غیر مجاز می‌باشند ",
        -4 => "کلمه عبور یا کد فروشنده اشتباه است",
        -6 => "سند قبلا برگشت کامل یافته ‌است",
        -7 => "رسید دیجیتال تهی است",
        -8 => "طول ورودی‌ها بیشتر از حد مجاز است",
        -9 => "ورود کاراکتر غیر مجاز در مبلغ برگشتی ",
        -10 => "رسید دیجیتالی به صورت Base64 نیست ",
        -11 => "طول ورودی‌ها کمتر از حد مجاز است",
        -12 => "مبلغ برگشتی منفی است",
        -13 => "مبلغ برگشتی برای برگشت جزئی بیشتر از مبلغ برگشت نخورده رسید دیجیتالی است",
        -14 => "چنین تراکنشی تعریف نشده است",
        -15 => "مبلغ برگشتی به صورت اعشاری داده شده است",
        -16 => "خطای داخلی سیستم",
        -17 => "برگشت زدن جزئی از تراکنش مجاز نمی ‌باشد",
        -18 => "IP آدرس فروشنده نامعتبر است"
    ];

    public function __construct() {
        $this->service = new PaymentIFBinding();
        $this->tokenservice = new PaymentInitIFBinding();
    }

    /**
     * @param $transactionId int کد تراکنش
     * @param $amount        int مبلغ به ریال
     * @param $callbackUrl   string آدرس صفحه ای که پس از پرداخت از سمت بانک ریدایرکت می شود
     *
     * @return PaymentResponse
     */
    public function startPayment($transactionId, $amount, $callbackUrl) {


        $TermID           = $this->MID;
        $ResNum           = $transactionId;
        $TotalAmount      = $amount;
        $SegAmount1       = 0;
        $SegAmount2       = 0;
        $SegAmount3       = 0;
        $SegAmount4       = 0;
        $SegAmount5       = 0;
        $SegAmount6       = 0;
        $AdditionalData1  = "";
        $AdditionalData2  = "";
        $Wage             = 0;

        try {
            $result = $this->tokenservice->RequestToken($TermID, $ResNum, $TotalAmount, $SegAmount1, $SegAmount2, $SegAmount3, $SegAmount4, $SegAmount5, $SegAmount6, $AdditionalData1, $AdditionalData2, $Wage);

        } catch (Exception $e) {
            $result = 0;
        }

        $payment = new PaymentResponse();
        $payment->setTransactionId($transactionId);
        $this->errorCode = $result;
        if ($result > 0) {
            // Successful
            $payment->setIsSuccessful(TRUE);
            $payment->setData(array( "Token"=>$result, "RedirectURL"=>$callbackUrl));
            $payment->setReferenceId($result);
            $payment->setTargetUrl($this->BASE_TARGET_URL);
        } else {
            $payment->setIsSuccessful(FALSE);
        }

        return $payment;
    }

    public function isPaymentValid($request) {
        $this->errorCode = $request['State'];
        $isValid = $request['State'] == 'OK' ;
        $res     = new ValidationResponse();
        $res->setValid($isValid);
        $res->setReferenceId($request['RefNum']);

        return $res;
    }

    public function verify($transactionId, $referenceId) {
       

        try {
            $result = $this->service->verifyTransaction($referenceId,$this->MID);
        } catch (Exception $e) {
           
            $result= -10000;
        }
        $this->errorCode = $result;

        $status = $result > 0;

        $res = new VerificationResponse();
        $res->setSuccessful($status);
        $res->setStatus($result);
        $res->setInvoiceNumber($transactionId);

        return $res;

    }

    public function inquiry($transactionId, $referenceId) {


        try {
            $result = $this->service->verifyTransaction($referenceId,$this->MID);
        } catch (Exception $e) {

            $result= -10000;
        }
        $this->errorCode = $result;

        $status = $result > 0;

        return $status;

    }

    public function settle($transactionId, $referenceId) {


        return TRUE;
    }

    public function reversal($transactionId, $referenceId) {
        try {
            $result = $this->service->reverseTransaction($referenceId,$this->MID,$this->MID,$this->PASS);
        } catch (Exception $e) {

            $result= -10000;
        }
        $this->errorCode = $result;

        $status = $result === 1;

        return $status;

    }

    public function getErrorCode() {
        return $this->errorCode;
    }

    public function getErrorMessage() {
        return $this->errorCode === 0 || $this->errorCode > 0 ?
            $this->errorMessagesList[$this->errorCode] : "خطای ناشناخته";
    }

    public function getCanonicalName() {
        return get_class();
    }
}