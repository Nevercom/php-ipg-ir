<?php

namespace IPG\Gateways\Mellat;

use Exception;
use IPG\Contract\AbstractIPG;
use IPG\Models\PaymentResponse;
use IPG\Models\ValidationResponse;
use IPG\Models\VerificationResponse;
use IPG\Utils\Utils;

class MellatIPG extends AbstractIPG {

    protected $terminalId;
    protected $userName;
    protected $userPassword;
    private   $service;
    private   $errorCode;
    private   $errorMessagesList = [
        0   => 'تراکنش با موفقیت انجام شده است',
        11  => 'شماره كارت نامعتبر است.',
        12  => 'موجودي كافي نيست.',
        13  => 'رمز نادرست است.',
        14  => 'تعداد دفعات وارد كردن رمز بيش از حد مجاز است.',
        15  => 'كارت نامعتبر است.',
        16  => 'دفعات برداشت وجه بيش از حد مجاز است.',
        17  => "لغو عملیات پرداخت توسط کاربر صورت گرفته است.",
        18  => 'تاريخ انقضاي كارت گذشته است.',
        19  => 'مبلغ برداشت وجه بيش از حد مجاز است.',
        21  => 'پذيرنده نامعتبر است.',
        23  => 'خطاي امنيتي رخ داده است.',
        24  => 'اطلاعات كاربري پذيرنده نامعتبر است.',
        25  => 'مبلغ نامعتبر است.',
        31  => 'پاسخ نامعتبر است.',
        32  => 'فرمت اطلاعات وارد شده صحيح نمي باشد.',
        33  => 'حساب نامعتبر است.',
        34  => 'خطاي سيستمي.',
        35  => 'تاريخ نامعتبر است.',
        41  => 'شماره درخواست تکراری است.',
        42  => 'خریدی با این شماره درخواست یافت نشد.',
        43  => 'عملیات قبلا انجام شده است.',
        44  => 'کسر پول از حساب مشتری صورت نگرفته است.',
        45  => 'واریز پول قبلا انجام شده است.',
        46  => 'واریز پول به حساب پذیرنده انجام نشده است.',
        47  => 'واریز پول به حساب پذیرنده انجام نشده است.',
        48  => 'پول مشتری به حساب او بازگشت داده شده است.',
        49  => 'تراکنش استرداد وجه دلخواه یافت نشد.',
        51  => 'تراکنش تکراری است.',
        54  => 'تراکنش مرجع موجود نیست.',
        55  => 'تراکنش نامعتبر است.',
        61  => 'خطا در واریز وجه.',
        111 => 'صادر كننده كارت نامعتبر است.',
        112 => 'خطاي سوييچ صادر كننده كارت.',
        113 => 'پاسخي از صادر كننده كارت دريافت نشد.',
        114 => 'دارنده كارت مجاز به انجام اين تراكنش نيست.',
        412 => 'شناسه قبض نادرست است.',
        413 => 'شناسه پرداخت نادرست است.',
        414 => 'سازمان صادر كننده قبض نامعتبر است.',
        415 => 'زمان شما برای انجام عملیات پرداخت به پایان رسیده است.',
        416 => 'در ثبت اطلاعات پرداخت شما در بانک ملت خطایی رخ داده است.',
        417 => 'شناسه پرداخت کننده نامعتبر است.',
        418 => 'در تعریف اطلاعات شما نزد بانک ملت خطایی پدید آمده است.',
        419 => 'تعداد دفعات ورود اطلاعات از حد مجاز گذشته است.',
        421 => 'IP نامعتبر است.'
    ];

    /**
     * MellatIPG constructor.
     *
     * @param array $config
     */
    public function __construct($config = array()) {
        if (isset($config['amount'])) {
            $this->amount = $config['amount'];
        }
        $this->service = new MellatPaymentGatewayService("https://pgws.bpm.bankmellat.ir/pgwchannel/services/pgw?wsdl");
    }

    public function startPayment($transactionId, $amount, $callbackUrl) {

        $req = new bpPayRequest();

        $req->amount       = $amount;
        $req->callBackUrl  = $callbackUrl;
        $req->orderId      = $transactionId;
        $req->payerId      = 0;
        $req->terminalId   = $this->terminalId;
        $req->userName     = $this->userName;
        $req->userPassword = $this->userPassword;
        $req->localDate    = Utils::getCurrentDate('Ymd');
        $req->localTime    = Utils::getCurrentDate('His');

        try {
            $result = $this->service->bpPayRequest($req);
        } catch (Exception $e) {
            $result         = new bpPayRequestResponse();
            $result->return = "-1,0";
        }

        $resultArray = explode(',', $result->return);

        $responseCode = $resultArray[0];
        $referenceId  = $resultArray[1];

        $pResponse = new PaymentResponse();
        $pResponse->setTransactionId($transactionId);
        $this->errorCode = $responseCode;
        if ($responseCode === "0" && !empty($referenceId)) {
            // OK
            $pResponse->setIsSuccessful(TRUE);
            $pResponse->setReferenceId($referenceId);
            $pResponse->setTargetUrl("https://pgw.bpm.bankmellat.ir/pgwchannel/startpay.mellat");
            $pResponse->setData(["RefId" => $referenceId]);
        } else {
            $pResponse->setIsSuccessful(FALSE);
        }

        return $pResponse;
    }

    public function isPaymentValid($request) {
        $isValid = $request['ResCode'] == 0 && $request['SaleOrderId'] > 0 && $request['SaleReferenceId'] > 0 &&
                   isset($request['RefId']);

        $this->errorCode = $request['ResCode'];

        $res = new ValidationResponse();
        $res->setValid($isValid);
        $res->setReferenceId($request['SaleReferenceId']);

        return $res;
    }

    public function verify($transactionId, $referenceId) {

        $req = new bpVerifyRequest();

        $req->terminalId      = $this->terminalId;
        $req->userName        = $this->userName;
        $req->userPassword    = $this->userPassword;
        $req->orderId         = $transactionId;
        $req->saleOrderId     = $transactionId;
        $req->saleReferenceId = $referenceId;


        try {
            $result = $this->service->bpVerifyRequest($req);
        } catch (Exception $e) {
            $result = new bpVerifyRequestResponse();
        }
        $resCode = $result->return;

        $status = $resCode === '0' || $resCode === 0;

        $this->errorCode = $status ? (int)$resCode : -1;

        $res = new VerificationResponse();
        $res->setSuccessful($status);
        $res->setStatus($resCode);

        return $res;
    }

    public function inquiry($transactionId, $referenceId) {
        $req                  = new bpInquiryRequest();
        $req->terminalId      = $this->terminalId;
        $req->userName        = $this->userName;
        $req->userPassword    = $this->userPassword;
        $req->orderId         = $transactionId;
        $req->saleOrderId     = $transactionId;
        $req->saleReferenceId = $referenceId;

        try {
            $result = $this->service->bpInquiryRequest($req);
        } catch (Exception $e) {
            $result         = new bpInquiryRequestResponse();
            $result->return = -1;
        }
        $status = $result->return === '0' || $result->return === 0;

        $this->errorCode = $status ? (int)$result->return : -1;

        return $status;
    }

    public function settle($transactionId, $referenceId) {
        $req                  = new bpSettleRequest();
        $req->terminalId      = $this->terminalId;
        $req->userName        = $this->userName;
        $req->userPassword    = $this->userPassword;
        $req->orderId         = $transactionId;
        $req->saleOrderId     = $transactionId;
        $req->saleReferenceId = $referenceId;

        try {
            $result = $this->service->bpSettleRequest($req);
        } catch (Exception $e) {
            $result         = new bpSettleRequestResponse();
            $result->return = -1;
        }
        $status = $result->return === '0' || $result->return === 0 || $result->return == '45';

        $this->errorCode = $status ? (int)$result->return : -1;

        return $status;
    }

    public function reversal($transactionId, $referenceId) {
        $req                  = new bpReversalRequest();
        $req->terminalId      = $this->terminalId;
        $req->userName        = $this->userName;
        $req->userPassword    = $this->userPassword;
        $req->orderId         = $transactionId;
        $req->saleOrderId     = $transactionId;
        $req->saleReferenceId = $referenceId;

        try {
            $result = $this->service->bpReversalRequest($req);
        } catch (Exception $e) {
            $result         = new bpReversalRequestResponse();
            $result->return = -1;
        }
        $status = $result->return === '0' || $result->return === 0;

        $this->errorCode = $status ? (int)$result->return : -1;

        return $status;
    }

    public function getErrorCode() {
        return $this->errorCode;
    }

    public function getErrorMessage() {
        return $this->errorCode === 0 || $this->errorCode === '0' || $this->errorCode > 0 ?
            $this->errorMessagesList[$this->errorCode] : "خطای ناشناخته";
    }

    public function getCanonicalName() {
        return get_class();
    }
}