<?php

namespace IPG\Gateways\Parsian;

class PinSettlement {
    public $pin; // string
    public $status; // unsignedByte
}

class PinSettlementResponse {
    public $status; // unsignedByte
}

class PinPaymentRequest {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinPaymentRequestResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinPaymentRequestNew {
    public $pin; // string
    public $amount; // long
    public $orderId; // int
    public $callbackUrl; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinPaymentRequestNewResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinPaymentRequestWithExtra {
    public $pin; // string
    public $amount; // decimal
    public $orderId; // int
    public $callbackUrl; // string
    public $AdditionalData; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinPaymentRequestWithExtraResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinPaymentRequestIranianProduct {
    public $pin; // string
    public $amount; // decimal
    public $orderId; // long
    public $callbackUrl; // string
    public $additionalData; // string
    public $authority; // long
    public $status; // int
}

class PinPaymentRequestIranianProductResponse {
    public $authority; // long
    public $status; // int
}

class PinBillPaymentRequest {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $billType; // string
    public $billIdentity; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinPersianInsurancePaymentRequest {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $customerId; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinPersianInsurancePaymentRequestResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinIsacoPaymentRequest {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $DeligateCode; // string
    public $DeligatePass; // string
    public $PaymentType; // int
    public $authority; // long
    public $status; // unsignedByte
}

class PinIsacoPaymentRequestResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinPaymentEnquiry {
    public $pin; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinPaymentEnquiryResponse {
    public $status; // unsignedByte
}

class PaymentEnquiry {
    public $pin; // string
    public $authority; // long
    public $status; // unsignedByte
    public $invoiceNumber; // long
}

class PaymentEnquiryResponse {
    public $status; // unsignedByte
    public $invoiceNumber; // long
}

class PaymentEnquiryWithTransData {
    public $pin; // string
    public $authority; // long
    public $status; // unsignedByte
    public $invoiceNumber; // long
    public $truncatedCardNo; // string
    public $encCardNo; // string
}

class PaymentEnquiryWithTransDataResponse {
    public $status; // unsignedByte
    public $invoiceNumber; // long
    public $truncatedCardNo; // string
    public $encCardNo; // string
}

class PaymentEnquiryWithCardNo {
    public $serviceCode; // string
    public $pin; // string
    public $authority; // long
    public $status; // unsignedByte
    public $invoiceNumber; // long
    public $CardNo; // string
    public $encCardNo; // string
}

class PaymentEnquiryWithCardNoResponse {
    public $status; // unsignedByte
    public $invoiceNumber; // long
    public $CardNo; // string
    public $encCardNo; // string
}

class PaymentOCPEnquiry {
    public $pin; // string
    public $authority; // long
    public $token; // guid
    public $status; // unsignedByte
    public $invoiceNumber; // long
    public $truncatedCardNo; // string
}

class PaymentOCPEnquiryResponse {
    public $status; // unsignedByte
    public $invoiceNumber; // long
    public $truncatedCardNo; // string
}

class PaymentEnquiryWithAmount {
    public $pin; // string
    public $authority; // long
    public $status; // unsignedByte
    public $invoiceNumber; // long
    public $amount; // decimal
}

class PaymentEnquiryWithAmountResponse {
    public $status; // unsignedByte
    public $invoiceNumber; // long
    public $amount; // decimal
}

class PinVoidPayment {
    public $pin; // string
    public $orderId; // int
    public $orderToVoid; // int
    public $status; // unsignedByte
}

class PinVoidPaymentResponse {
    public $status; // unsignedByte
}

class PinReversal {
    public $pin; // string
    public $orderId; // int
    public $orderToReversal; // int
    public $status; // unsignedByte
}

class PinReversalResponse {
    public $status; // unsignedByte
}

class PinReversalIranianGoods {
    public $pin; // string
    public $orderId; // int
    public $orderToReversal; // int
    public $status; // unsignedByte
}

class PinReversalIranianGoodsResponse {
    public $status; // unsignedByte
}

class PinSetDefaultCallbackUrl {
    public $pin; // string
    public $url; // string
    public $status; // unsignedByte
}

class PinSetDefaultCallbackUrlResponse {
    public $status; // unsignedByte
}

class PinRefundPayment {
    public $pin; // string
    public $orderId; // int
    public $orderToRefund; // int
    public $amount; // int
    public $status; // unsignedByte
}

class PinRefundPaymentResponse {
    public $status; // unsignedByte
}

class PinRefundIranianGoodsPayment {
    public $pin; // string
    public $orderId; // int
    public $orderToRefund; // int
    public $amount; // int
    public $additionalData; // string
    public $email; // string
    public $rrn; // string
    public $status; // int
    public $result; // string
}

class PinRefundIranianGoodsPaymentResponse {
    public $status; // int
    public $result; // string
}

class PinRefund {
    public $pin; // string
    public $orderId; // int
    public $orderToRefund; // int
    public $amount; // int
    public $destSheba; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinRefundResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBatchPaymentRequest {
    public $pin; // string
    public $callbackUrl; // string
    public $batchAuthority; // long
    public $status; // unsignedByte
}

class PinBatchPaymentRequestResponse {
    public $batchAuthority; // long
    public $status; // unsignedByte
}

class PinBatchBillPaymentRequest {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $billType; // string
    public $billIdentity; // string
    public $batchAuthority; // long
    public $authority; // long
    public $status; // unsignedByte
}

class PinBatchBillPaymentRequestResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBatchItemPaymentRequest {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $batchAuthority; // long
    public $authority; // long
    public $status; // unsignedByte
}

class PinBatchItemPaymentRequestResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBatchItemPaymentRequestWithData {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $batchAuthority; // long
    public $AdditionalData; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinBatchItemPaymentRequestWithDataResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestTC {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $billIdentity; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestTCResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestEL {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $billIdentity; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestELResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestGA {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $billIdentity; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestGAResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestMC {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $billIdentity; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestMCResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestMN {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $billIdentity; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestMNResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestWA {
    public $pin; // string
    public $amount; // int
    public $orderId; // int
    public $callbackUrl; // string
    public $billIdentity; // string
    public $authority; // long
    public $status; // unsignedByte
}

class PinBillPaymentRequestWAResponse {
    public $authority; // long
    public $status; // unsignedByte
}

class IsValidBill {
    public $pin; // string
    public $BillId; // string
    public $PayID; // string
    public $status; // unsignedByte
    public $amount; // int
    public $billType; // string
}

class IsValidBillResponse {
    public $status; // unsignedByte
    public $amount; // int
    public $billType; // string
}

class guid {
}


/**
 * EShopService class
 *
 *
 *
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class EShopService extends \SoapClient {

    private static $classmap = array(
        'PinSettlement'                              => 'PinSettlement',
        'PinSettlementResponse'                      => 'PinSettlementResponse',
        'PinPaymentRequest'                          => 'PinPaymentRequest',
        'PinPaymentRequestResponse'                  => 'PinPaymentRequestResponse',
        'PinPaymentRequestNew'                       => 'PinPaymentRequestNew',
        'PinPaymentRequestNewResponse'               => 'PinPaymentRequestNewResponse',
        'PinPaymentRequestWithExtra'                 => 'PinPaymentRequestWithExtra',
        'PinPaymentRequestWithExtraResponse'         => 'PinPaymentRequestWithExtraResponse',
        'PinPaymentRequestIranianProduct'            => 'PinPaymentRequestIranianProduct',
        'PinPaymentRequestIranianProductResponse'    => 'PinPaymentRequestIranianProductResponse',
        'PinBillPaymentRequest'                      => 'PinBillPaymentRequest',
        'PinBillPaymentRequestResponse'              => 'PinBillPaymentRequestResponse',
        'PinPersianInsurancePaymentRequest'          => 'PinPersianInsurancePaymentRequest',
        'PinPersianInsurancePaymentRequestResponse'  => 'PinPersianInsurancePaymentRequestResponse',
        'PinIsacoPaymentRequest'                     => 'PinIsacoPaymentRequest',
        'PinIsacoPaymentRequestResponse'             => 'PinIsacoPaymentRequestResponse',
        'PinPaymentEnquiry'                          => 'PinPaymentEnquiry',
        'PinPaymentEnquiryResponse'                  => 'PinPaymentEnquiryResponse',
        'PaymentEnquiry'                             => 'PaymentEnquiry',
        'PaymentEnquiryResponse'                     => 'PaymentEnquiryResponse',
        'PaymentEnquiryWithTransData'                => 'PaymentEnquiryWithTransData',
        'PaymentEnquiryWithTransDataResponse'        => 'PaymentEnquiryWithTransDataResponse',
        'PaymentEnquiryWithCardNo'                   => 'PaymentEnquiryWithCardNo',
        'PaymentEnquiryWithCardNoResponse'           => 'PaymentEnquiryWithCardNoResponse',
        'PaymentOCPEnquiry'                          => 'PaymentOCPEnquiry',
        'PaymentOCPEnquiryResponse'                  => 'PaymentOCPEnquiryResponse',
        'PaymentEnquiryWithAmount'                   => 'PaymentEnquiryWithAmount',
        'PaymentEnquiryWithAmountResponse'           => 'PaymentEnquiryWithAmountResponse',
        'PinVoidPayment'                             => 'PinVoidPayment',
        'PinVoidPaymentResponse'                     => 'PinVoidPaymentResponse',
        'PinReversal'                                => 'PinReversal',
        'PinReversalResponse'                        => 'PinReversalResponse',
        'PinReversalIranianGoods'                    => 'PinReversalIranianGoods',
        'PinReversalIranianGoodsResponse'            => 'PinReversalIranianGoodsResponse',
        'PinSetDefaultCallbackUrl'                   => 'PinSetDefaultCallbackUrl',
        'PinSetDefaultCallbackUrlResponse'           => 'PinSetDefaultCallbackUrlResponse',
        'PinRefundPayment'                           => 'PinRefundPayment',
        'PinRefundPaymentResponse'                   => 'PinRefundPaymentResponse',
        'PinRefundIranianGoodsPayment'               => 'PinRefundIranianGoodsPayment',
        'PinRefundIranianGoodsPaymentResponse'       => 'PinRefundIranianGoodsPaymentResponse',
        'PinRefund'                                  => 'PinRefund',
        'PinRefundResponse'                          => 'PinRefundResponse',
        'PinBatchPaymentRequest'                     => 'PinBatchPaymentRequest',
        'PinBatchPaymentRequestResponse'             => 'PinBatchPaymentRequestResponse',
        'PinBatchBillPaymentRequest'                 => 'PinBatchBillPaymentRequest',
        'PinBatchBillPaymentRequestResponse'         => 'PinBatchBillPaymentRequestResponse',
        'PinBatchItemPaymentRequest'                 => 'PinBatchItemPaymentRequest',
        'PinBatchItemPaymentRequestResponse'         => 'PinBatchItemPaymentRequestResponse',
        'PinBatchItemPaymentRequestWithData'         => 'PinBatchItemPaymentRequestWithData',
        'PinBatchItemPaymentRequestWithDataResponse' => 'PinBatchItemPaymentRequestWithDataResponse',
        'PinBillPaymentRequestTC'                    => 'PinBillPaymentRequestTC',
        'PinBillPaymentRequestTCResponse'            => 'PinBillPaymentRequestTCResponse',
        'PinBillPaymentRequestEL'                    => 'PinBillPaymentRequestEL',
        'PinBillPaymentRequestELResponse'            => 'PinBillPaymentRequestELResponse',
        'PinBillPaymentRequestGA'                    => 'PinBillPaymentRequestGA',
        'PinBillPaymentRequestGAResponse'            => 'PinBillPaymentRequestGAResponse',
        'PinBillPaymentRequestMC'                    => 'PinBillPaymentRequestMC',
        'PinBillPaymentRequestMCResponse'            => 'PinBillPaymentRequestMCResponse',
        'PinBillPaymentRequestMN'                    => 'PinBillPaymentRequestMN',
        'PinBillPaymentRequestMNResponse'            => 'PinBillPaymentRequestMNResponse',
        'PinBillPaymentRequestWA'                    => 'PinBillPaymentRequestWA',
        'PinBillPaymentRequestWAResponse'            => 'PinBillPaymentRequestWAResponse',
        'IsValidBill'                                => 'IsValidBill',
        'IsValidBillResponse'                        => 'IsValidBillResponse',
        'guid'                                       => 'guid',
    );

    public function EShopService($wsdl = "https://pec.shaparak.ir/pecpaymentgateway/EShopService.asmx?wsdl",
                                 $options = array()) {
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        parent::__construct($wsdl, $options);
    }

    /**
     *
     *
     * @param PinSettlement $parameters
     *
     * @return PinSettlementResponse
     */
    public function PinSettlement(PinSettlement $parameters) {
        return $this->__soapCall('PinSettlement', array($parameters), array(
                                                    'uri'        => 'http://tempuri.org/',
                                                    'soapaction' => ''
                                                )
        );
    }

    /**
     *
     *
     * @param PinPaymentRequest $parameters
     *
     * @return PinPaymentRequestResponse
     */
    public function PinPaymentRequest(PinPaymentRequest $parameters) {
        return $this->__soapCall('PinPaymentRequest', array($parameters), array(
                                                        'uri'        => 'http://tempuri.org/',
                                                        'soapaction' => ''
                                                    )
        );
    }

    /**
     *
     *
     * @param PinPaymentRequestNew $parameters
     *
     * @return PinPaymentRequestNewResponse
     */
    public function PinPaymentRequestNew(PinPaymentRequestNew $parameters) {
        return $this->__soapCall('PinPaymentRequestNew', array($parameters), array(
                                                           'uri'        => 'http://tempuri.org/',
                                                           'soapaction' => ''
                                                       )
        );
    }

    /**
     *
     *
     * @param PinPaymentRequestWithExtra $parameters
     *
     * @return PinPaymentRequestWithExtraResponse
     */
    public function PinPaymentRequestWithExtra(PinPaymentRequestWithExtra $parameters) {
        return $this->__soapCall('PinPaymentRequestWithExtra', array($parameters), array(
                                                                 'uri'        => 'http://tempuri.org/',
                                                                 'soapaction' => ''
                                                             )
        );
    }

    /**
     *
     *
     * @param PinPaymentRequestIranianProduct $parameters
     *
     * @return PinPaymentRequestIranianProductResponse
     */
    public function PinPaymentRequestIranianProduct(PinPaymentRequestIranianProduct $parameters) {
        return $this->__soapCall('PinPaymentRequestIranianProduct', array($parameters), array(
                                                                      'uri'        => 'http://tempuri.org/',
                                                                      'soapaction' => ''
                                                                  )
        );
    }

    /**
     *
     *
     * @param PinBillPaymentRequest $parameters
     *
     * @return PinBillPaymentRequestResponse
     */
    public function PinBillPaymentRequest(PinBillPaymentRequest $parameters) {
        return $this->__soapCall('PinBillPaymentRequest', array($parameters), array(
                                                            'uri'        => 'http://tempuri.org/',
                                                            'soapaction' => ''
                                                        )
        );
    }

    /**
     *
     *
     * @param PinPersianInsurancePaymentRequest $parameters
     *
     * @return PinPersianInsurancePaymentRequestResponse
     */
    public function PinPersianInsurancePaymentRequest(PinPersianInsurancePaymentRequest $parameters) {
        return $this->__soapCall('PinPersianInsurancePaymentRequest', array($parameters), array(
                                                                        'uri'        => 'http://tempuri.org/',
                                                                        'soapaction' => ''
                                                                    )
        );
    }

    /**
     *
     *
     * @param PinIsacoPaymentRequest $parameters
     *
     * @return PinIsacoPaymentRequestResponse
     */
    public function PinIsacoPaymentRequest(PinIsacoPaymentRequest $parameters) {
        return $this->__soapCall('PinIsacoPaymentRequest', array($parameters), array(
                                                             'uri'        => 'http://tempuri.org/',
                                                             'soapaction' => ''
                                                         )
        );
    }

    /**
     *
     *
     * @param PinPaymentEnquiry $parameters
     *
     * @return PinPaymentEnquiryResponse
     */
    public function PinPaymentEnquiry(PinPaymentEnquiry $parameters) {
        return $this->__soapCall('PinPaymentEnquiry', array($parameters), array(
                                                        'uri'        => 'http://tempuri.org/',
                                                        'soapaction' => ''
                                                    )
        );
    }

    /**
     *
     *
     * @param PaymentEnquiry $parameters
     *
     * @return PaymentEnquiryResponse
     */
    public function PaymentEnquiry(PaymentEnquiry $parameters) {
        return $this->__soapCall('PaymentEnquiry', array($parameters), array(
                                                     'uri'        => 'http://tempuri.org/',
                                                     'soapaction' => ''
                                                 )
        );
    }

    /**
     *
     *
     * @param PaymentEnquiryWithTransData $parameters
     *
     * @return PaymentEnquiryWithTransDataResponse
     */
    public function PaymentEnquiryWithTransData(PaymentEnquiryWithTransData $parameters) {
        return $this->__soapCall('PaymentEnquiryWithTransData', array($parameters), array(
                                                                  'uri'        => 'http://tempuri.org/',
                                                                  'soapaction' => ''
                                                              )
        );
    }

    /**
     *
     *
     * @param PaymentEnquiryWithCardNo $parameters
     *
     * @return PaymentEnquiryWithCardNoResponse
     */
    public function PaymentEnquiryWithCardNo(PaymentEnquiryWithCardNo $parameters) {
        return $this->__soapCall('PaymentEnquiryWithCardNo', array($parameters), array(
                                                               'uri'        => 'http://tempuri.org/',
                                                               'soapaction' => ''
                                                           )
        );
    }

    /**
     *
     *
     * @param PaymentOCPEnquiry $parameters
     *
     * @return PaymentOCPEnquiryResponse
     */
    public function PaymentOCPEnquiry(PaymentOCPEnquiry $parameters) {
        return $this->__soapCall('PaymentOCPEnquiry', array($parameters), array(
                                                        'uri'        => 'http://tempuri.org/',
                                                        'soapaction' => ''
                                                    )
        );
    }

    /**
     *
     *
     * @param PaymentEnquiryWithAmount $parameters
     *
     * @return PaymentEnquiryWithAmountResponse
     */
    public function PaymentEnquiryWithAmount(PaymentEnquiryWithAmount $parameters) {
        return $this->__soapCall('PaymentEnquiryWithAmount', array($parameters), array(
                                                               'uri'        => 'http://tempuri.org/',
                                                               'soapaction' => ''
                                                           )
        );
    }

    /**
     *
     *
     * @param PinVoidPayment $parameters
     *
     * @return PinVoidPaymentResponse
     */
    public function PinVoidPayment(PinVoidPayment $parameters) {
        return $this->__soapCall('PinVoidPayment', array($parameters), array(
                                                     'uri'        => 'http://tempuri.org/',
                                                     'soapaction' => ''
                                                 )
        );
    }

    /**
     *
     *
     * @param PinReversal $parameters
     *
     * @return PinReversalResponse
     */
    public function PinReversal(PinReversal $parameters) {
        return $this->__soapCall('PinReversal', array($parameters), array(
                                                  'uri'        => 'http://tempuri.org/',
                                                  'soapaction' => ''
                                              )
        );
    }

    /**
     *
     *
     * @param PinReversalIranianGoods $parameters
     *
     * @return PinReversalIranianGoodsResponse
     */
    public function PinReversalIranianGoods(PinReversalIranianGoods $parameters) {
        return $this->__soapCall('PinReversalIranianGoods', array($parameters), array(
                                                              'uri'        => 'http://tempuri.org/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param PinSetDefaultCallbackUrl $parameters
     *
     * @return PinSetDefaultCallbackUrlResponse
     */
    public function PinSetDefaultCallbackUrl(PinSetDefaultCallbackUrl $parameters) {
        return $this->__soapCall('PinSetDefaultCallbackUrl', array($parameters), array(
                                                               'uri'        => 'http://tempuri.org/',
                                                               'soapaction' => ''
                                                           )
        );
    }

    /**
     *
     *
     * @param PinRefundPayment $parameters
     *
     * @return PinRefundPaymentResponse
     */
    public function PinRefundPayment(PinRefundPayment $parameters) {
        return $this->__soapCall('PinRefundPayment', array($parameters), array(
                                                       'uri'        => 'http://tempuri.org/',
                                                       'soapaction' => ''
                                                   )
        );
    }

    /**
     *
     *
     * @param PinRefundIranianGoodsPayment $parameters
     *
     * @return PinRefundIranianGoodsPaymentResponse
     */
    public function PinRefundIranianGoodsPayment(PinRefundIranianGoodsPayment $parameters) {
        return $this->__soapCall('PinRefundIranianGoodsPayment', array($parameters), array(
                                                                   'uri'        => 'http://tempuri.org/',
                                                                   'soapaction' => ''
                                                               )
        );
    }

    /**
     *
     *
     * @param PinRefund $parameters
     *
     * @return PinRefundResponse
     */
    public function PinRefund(PinRefund $parameters) {
        return $this->__soapCall('PinRefund', array($parameters), array(
                                                'uri'        => 'http://tempuri.org/',
                                                'soapaction' => ''
                                            )
        );
    }

    /**
     *
     *
     * @param PinBatchPaymentRequest $parameters
     *
     * @return PinBatchPaymentRequestResponse
     */
    public function PinBatchPaymentRequest(PinBatchPaymentRequest $parameters) {
        return $this->__soapCall('PinBatchPaymentRequest', array($parameters), array(
                                                             'uri'        => 'http://tempuri.org/',
                                                             'soapaction' => ''
                                                         )
        );
    }

    /**
     *
     *
     * @param PinBatchBillPaymentRequest $parameters
     *
     * @return PinBatchBillPaymentRequestResponse
     */
    public function PinBatchBillPaymentRequest(PinBatchBillPaymentRequest $parameters) {
        return $this->__soapCall('PinBatchBillPaymentRequest', array($parameters), array(
                                                                 'uri'        => 'http://tempuri.org/',
                                                                 'soapaction' => ''
                                                             )
        );
    }

    /**
     *
     *
     * @param PinBatchItemPaymentRequest $parameters
     *
     * @return PinBatchItemPaymentRequestResponse
     */
    public function PinBatchItemPaymentRequest(PinBatchItemPaymentRequest $parameters) {
        return $this->__soapCall('PinBatchItemPaymentRequest', array($parameters), array(
                                                                 'uri'        => 'http://tempuri.org/',
                                                                 'soapaction' => ''
                                                             )
        );
    }

    /**
     *
     *
     * @param PinBatchItemPaymentRequestWithData $parameters
     *
     * @return PinBatchItemPaymentRequestWithDataResponse
     */
    public function PinBatchItemPaymentRequestWithData(PinBatchItemPaymentRequestWithData $parameters) {
        return $this->__soapCall('PinBatchItemPaymentRequestWithData', array($parameters), array(
                                                                         'uri'        => 'http://tempuri.org/',
                                                                         'soapaction' => ''
                                                                     )
        );
    }

    /**
     *
     *
     * @param PinBillPaymentRequestTC $parameters
     *
     * @return PinBillPaymentRequestTCResponse
     */
    public function PinBillPaymentRequestTC(PinBillPaymentRequestTC $parameters) {
        return $this->__soapCall('PinBillPaymentRequestTC', array($parameters), array(
                                                              'uri'        => 'http://tempuri.org/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param PinBillPaymentRequestEL $parameters
     *
     * @return PinBillPaymentRequestELResponse
     */
    public function PinBillPaymentRequestEL(PinBillPaymentRequestEL $parameters) {
        return $this->__soapCall('PinBillPaymentRequestEL', array($parameters), array(
                                                              'uri'        => 'http://tempuri.org/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param PinBillPaymentRequestGA $parameters
     *
     * @return PinBillPaymentRequestGAResponse
     */
    public function PinBillPaymentRequestGA(PinBillPaymentRequestGA $parameters) {
        return $this->__soapCall('PinBillPaymentRequestGA', array($parameters), array(
                                                              'uri'        => 'http://tempuri.org/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param PinBillPaymentRequestMC $parameters
     *
     * @return PinBillPaymentRequestMCResponse
     */
    public function PinBillPaymentRequestMC(PinBillPaymentRequestMC $parameters) {
        return $this->__soapCall('PinBillPaymentRequestMC', array($parameters), array(
                                                              'uri'        => 'http://tempuri.org/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param PinBillPaymentRequestMN $parameters
     *
     * @return PinBillPaymentRequestMNResponse
     */
    public function PinBillPaymentRequestMN(PinBillPaymentRequestMN $parameters) {
        return $this->__soapCall('PinBillPaymentRequestMN', array($parameters), array(
                                                              'uri'        => 'http://tempuri.org/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param PinBillPaymentRequestWA $parameters
     *
     * @return PinBillPaymentRequestWAResponse
     */
    public function PinBillPaymentRequestWA(PinBillPaymentRequestWA $parameters) {
        return $this->__soapCall('PinBillPaymentRequestWA', array($parameters), array(
                                                              'uri'        => 'http://tempuri.org/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param IsValidBill $parameters
     *
     * @return IsValidBillResponse
     */
    public function IsValidBill(IsValidBill $parameters) {
        return $this->__soapCall('IsValidBill', array($parameters), array(
                                                  'uri'        => 'http://tempuri.org/',
                                                  'soapaction' => ''
                                              )
        );
    }

}

?>
