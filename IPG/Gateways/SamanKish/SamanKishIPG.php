<?php

namespace IPG\Gateways\SamanKish;


use Exception;
use IPG\Contract\AbstractIPG;
use IPG\Models\PaymentResponse;
use IPG\Models\ValidationResponse;
use IPG\Models\VerificationResponse;

/**
 * See {@link https://www.sep.ir/%D8%AF%D8%B1%DB%8C%D8%A7%D9%81%D8%AA-%D8%AF%D8%B1%DA%AF%D8%A7%D9%87-%D8%A7%DB%8C%D9%86%D8%AA%D8%B1%D9%86%D8%AA%DB%8C- SamanKish Website} for more info
 * @package IPG\Gateways\SamanKish
 */
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
        -18 => "IP آدرس فروشنده نامعتبر است",
        'Canceled By User'  => "تراکنش توسط خر یدار کنسل شده است.",
        'Invalid Amount'  => "مبلخ سند برگشتی، از مبلخ تراکنش اصلی بیشتر است.",
        'Invalid Transaction'  => "رمز کارت )PIN )3 مرتبه اشتباه وارد شده است در نتیجه کارت غیر فعال خواهد شد.",
        'Number Card Invalid'  => "شماره کارت اشتباه است.",
        'Issuer Such No'  => " چنین صادر کننده کارتی وجود ندارد.",
        'Expired Card Pick Up'  => "",
        'Allowable PIN Tries Exceeded Pick Up'  => "",
        'Incorrect PIN'  => "خریدار رمز کارت ) PIN )را اشتباه وارد کرده است.",
        'Limit Amount Withdrawal Exceeds'  => " مبلخ بیش از سقف برداشت می باشد.",
        'Transaction Cannot Be Completed'  => "تراکنش Authorize شده است )شماره PIN و PAN درست هستند( ولی امکان سند خوردن وجود ندارد.",
        'Response Received Too Late'  => "تراکنش در شبکه بانکی Timeout خورده است",
        'Suspected Fraud Pick Up'  => "خریدار  فیلد CVV2 و یا فیلد ExpDate را اشتباه وارد کرده است )یا اصال وارد نکرده است(. ",
        'No Sufficient Funds'  => " موجودی حساب خریدار، کافی نیست",
        ' Slm Down Issuer'  => "سیستم بانک صادر کننده کارت خریتدار، در وضعیت عملیاتی نیست.",
        'TME Error'  => "کلیه خطاهای دیگر بانکی باعت ایجاد چنین خطایی می گردد"
    ];

    public function __construct($config = array()) {
        if (isset($config['amount'])) {
            $this->amount = $config['amount'];
        }
        $this->service = new PaymentIFBinding("https://sep.shaparak.ir/payments/referencepayment.asmx?WSDL");
        $this->tokenservice = new PaymentInitIFBinding("https://sep.shaparak.ir/Payments/InitPayment.asmx?wsdl");
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
        if (strlen($result) > 8) {
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
        return $this->errorMessagesList[$this->errorCode];
    }

    public function getCanonicalName() {
        return get_class();
    }
}