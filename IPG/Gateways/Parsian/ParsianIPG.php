<?php

namespace IPG\Gateways\Parsian;


use Exception;
use IPG\Contract\AbstractIPG;
use IPG\Models\PaymentResponse;
use IPG\Models\ValidationResponse;
use IPG\Models\VerificationResponse;

class ParsianIPG extends AbstractIPG {
    protected $PIN;
    private   $service;
    private   $BASE_TARGET_URL   = "https://pec.shaparak.ir/pecpaymentgateway/default.aspx";
    private   $errorCode         = -1;
    private   $errorMessagesList = [
        0  => "موفق",
        1  => "وضعیت بلاتکلیف",
        20 => "پین فروشنده صحیح نمی باشد",
        22 => "پین فروشنده یا IP فروشنده صحیح نمی باشد",
        30 => "تراکنش قبلاً انجام شده است",
        34 => "شماره تراکنش فروشنده صحیح نمی باشد"
    ];

    public function __construct() {
        $this->service = new EShopService("https://pec.shaparak.ir/pecpaymentgateway/EShopService.asmx?wsdl");
    }

    /**
     * @param $transactionId int کد تراکنش
     * @param $amount        int مبلغ به ریال
     * @param $callbackUrl   string آدرس صفحه ای که پس از پرداخت از سمت بانک ریدایرکت می شود
     *
     * @return PaymentResponse
     */
    public function startPayment($transactionId, $amount, $callbackUrl) {

        $req = new PinPaymentRequest();

        $req->amount      = $amount;
        $req->orderId     = $transactionId;
        $req->pin         = $this->PIN;
        $req->callbackUrl = $callbackUrl;
        $req->authority   = 0;
        $req->status      = 1;

        try {
            $result = $this->service->PinPaymentRequest($req);
//            print_r($result);
        } catch (Exception $e) {
            $result         = new PinPaymentRequestResponse();
            $result->status = -1;
        }

        $status    = $result->status;
        $authority = $result->authority;

        $payment = new PaymentResponse();
        $payment->setTransactionId($transactionId);
        $this->errorCode = $status;
        if ($status === 0 && $authority != -1) {
            // Successful
            $payment->setIsSuccessful(TRUE);
            $payment->setReferenceId($authority);
            $payment->setTargetUrl($this->BASE_TARGET_URL . "?au={$authority}");
        } else {
            $payment->setIsSuccessful(FALSE);
        }

        return $payment;
    }

    public function isPaymentValid($request) {
        $this->errorCode = $request['rs'];

        $isValid = $request['rs'] === 0 && $request['au'] != -1;
        $res     = new ValidationResponse();
        $res->setValid($isValid);
        $res->setReferenceId($request['au']);

        return $res;
    }

    public function verify($transactionId, $referenceId) {
        $req = new PaymentEnquiry();


        $req->pin           = $this->PIN;
        $req->authority     = $referenceId;
        $req->status        = 1;
        $req->invoiceNumber = 0;

        try {
            $result = $this->service->PaymentEnquiry($req);
        } catch (Exception $e) {
            $result         = new PinPaymentEnquiryResponse();
            $result->status = -1;
        }
        $this->errorCode = $result->status;

        $status = $result->status === 0 && $result->invoiceNumber != -1;

        $res = new VerificationResponse();
        $res->setSuccessful($status);
        $res->setStatus($result->status);
        $res->setInvoiceNumber($result->invoiceNumber);

        return $res;

    }

    public function inquiry($transactionId, $referenceId) {
        $req = new PaymentEnquiry();


        $req->pin           = $this->PIN;
        $req->authority     = $referenceId;
        $req->status        = 1;
        $req->invoiceNumber = 0;

        try {
            $result = $this->service->PaymentEnquiry($req);
        } catch (Exception $e) {
            $result         = new PinPaymentEnquiryResponse();
            $result->status = -1;
        }
        $this->errorCode = $result->status;

        return $result->status === 0 && $result->invoiceNumber != -1;

    }

    public function settle($transactionId, $referenceId) {
        $req = new PinSettlement();

        $req->pin    = $this->PIN;
        $req->status = 1;

        try {
            $result = $this->service->PinSettlement($req);
        } catch (Exception $e) {
            $result         = new PinSettlementResponse();
            $result->status = -1;
        }
        $this->errorCode = $result->status;

        return $result->status === 0;
    }

    public function reversal($transactionId, $referenceId) {
        $req = new PinReversal();

        $req->pin             = $this->PIN;
        $req->status          = 1;
        $req->orderId         = $transactionId;
        $req->orderToReversal = $transactionId;

        try {
            $result = $this->service->PinReversal($req);
        } catch (Exception $e) {
            $result         = new PinReversalResponse();
            $result->status = -1;
        }
        $this->errorCode = $result->status;

        return $result->status === 0;
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