<?php
namespace IPG\Gateways\Mellat;

class bpVerifyRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $saleOrderId; // long
    public $saleReferenceId; // long
}

class bpVerifyRequestResponse {
    public $return; // string
}

class bpRefundInquiryRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $refundOrderId; // long
    public $refundReferenceId; // long
}

class bpRefundInquiryRequestResponse {
    public $return; // string
}

class bpRefundVerifyRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $refundOrderId; // long
    public $refundReferenceId; // long
}

class bpRefundVerifyRequestResponse {
    public $return; // string
}

class bpSettleRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $saleOrderId; // long
    public $saleReferenceId; // long
}

class bpSettleRequestResponse {
    public $return; // string
}

class bpDynamicPayRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $amount; // long
    public $localDate; // string
    public $localTime; // string
    public $additionalData; // string
    public $callBackUrl; // string
    public $payerId; // long
    public $subServiceId; // long
}

class bpDynamicPayRequestResponse {
    public $return; // string
}

class bpReversalRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $saleOrderId; // long
    public $saleReferenceId; // long
}

class bpReversalRequestResponse {
    public $return; // string
}

class bpCumulativeDynamicPayRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $amount; // long
    public $localDate; // string
    public $localTime; // string
    public $additionalData; // string
    public $callBackUrl; // string
}

class bpCumulativeDynamicPayRequestResponse {
    public $return; // string
}

class bpPayRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $amount; // long
    public $localDate; // string
    public $localTime; // string
    public $additionalData; // string
    public $callBackUrl; // string
    public $payerId; // long
}

class bpPayRequestResponse {
    public $return; // string
}

class bpSaleReferenceIdRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $saleOrderId; // long
}

class bpSaleReferenceIdRequestResponse {
    public $return; // string
}

class bpChargePayRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $amount; // long
    public $localDate; // string
    public $localTime; // string
    public $additionalData; // string
    public $callBackUrl; // string
    public $payerId; // long
}

class bpChargePayRequestResponse {
    public $return; // string
}

class bpInquiryRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $saleOrderId; // long
    public $saleReferenceId; // long
}

class bpInquiryRequestResponse {
    public $return; // string
}

class bpRefundRequest {
    public $terminalId; // long
    public $userName; // string
    public $userPassword; // string
    public $orderId; // long
    public $saleOrderId; // long
    public $saleReferenceId; // long
    public $refundAmount; // long
}

class bpRefundRequestResponse {
    public $return; // string
}


/**
 * PaymentGatewayImplService class
 *
 *
 *
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class MellatPaymentGatewayService extends \SoapClient {

    private static $classmap = array(
        'bpVerifyRequest'                       => 'bpVerifyRequest',
        'bpVerifyRequestResponse'               => 'bpVerifyRequestResponse',
        'bpRefundInquiryRequest'                => 'bpRefundInquiryRequest',
        'bpRefundInquiryRequestResponse'        => 'bpRefundInquiryRequestResponse',
        'bpRefundVerifyRequest'                 => 'bpRefundVerifyRequest',
        'bpRefundVerifyRequestResponse'         => 'bpRefundVerifyRequestResponse',
        'bpSettleRequest'                       => 'bpSettleRequest',
        'bpSettleRequestResponse'               => 'bpSettleRequestResponse',
        'bpDynamicPayRequest'                   => 'bpDynamicPayRequest',
        'bpDynamicPayRequestResponse'           => 'bpDynamicPayRequestResponse',
        'bpReversalRequest'                     => 'bpReversalRequest',
        'bpReversalRequestResponse'             => 'bpReversalRequestResponse',
        'bpCumulativeDynamicPayRequest'         => 'bpCumulativeDynamicPayRequest',
        'bpCumulativeDynamicPayRequestResponse' => 'bpCumulativeDynamicPayRequestResponse',
        'bpPayRequest'                          => 'bpPayRequest',
        'bpPayRequestResponse'                  => 'bpPayRequestResponse',
        'bpSaleReferenceIdRequest'              => 'bpSaleReferenceIdRequest',
        'bpSaleReferenceIdRequestResponse'      => 'bpSaleReferenceIdRequestResponse',
        'bpChargePayRequest'                    => 'bpChargePayRequest',
        'bpChargePayRequestResponse'            => 'bpChargePayRequestResponse',
        'bpInquiryRequest'                      => 'bpInquiryRequest',
        'bpInquiryRequestResponse'              => 'bpInquiryRequestResponse',
        'bpRefundRequest'                       => 'bpRefundRequest',
        'bpRefundRequestResponse'               => 'bpRefundRequestResponse',
    );

    public function MellatPaymentGatewayService($wsdl = "https://pgws.bpm.bankmellat.ir/pgwchannel/services/pgw?wsdl",
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
     * @param bpVerifyRequest $parameters
     *
     * @return bpVerifyRequestResponse
     */
    public function bpVerifyRequest(bpVerifyRequest $parameters) {
        return $this->__soapCall('bpVerifyRequest', array($parameters), array(
                                                      'uri'        => 'http://service.pgw.sw.bps.com/',
                                                      'soapaction' => ''
                                                  )
        );
    }

    /**
     *
     *
     * @param bpRefundInquiryRequest $parameters
     *
     * @return bpRefundInquiryRequestResponse
     */
    public function bpRefundInquiryRequest(bpRefundInquiryRequest $parameters) {
        return $this->__soapCall('bpRefundInquiryRequest', array($parameters), array(
                                                             'uri'        => 'http://service.pgw.sw.bps.com/',
                                                             'soapaction' => ''
                                                         )
        );
    }

    /**
     *
     *
     * @param bpRefundVerifyRequest $parameters
     *
     * @return bpRefundVerifyRequestResponse
     */
    public function bpRefundVerifyRequest(bpRefundVerifyRequest $parameters) {
        return $this->__soapCall('bpRefundVerifyRequest', array($parameters), array(
                                                            'uri'        => 'http://service.pgw.sw.bps.com/',
                                                            'soapaction' => ''
                                                        )
        );
    }

    /**
     *
     *
     * @param bpSettleRequest $parameters
     *
     * @return bpSettleRequestResponse
     */
    public function bpSettleRequest(bpSettleRequest $parameters) {
        return $this->__soapCall('bpSettleRequest', array($parameters), array(
                                                      'uri'        => 'http://service.pgw.sw.bps.com/',
                                                      'soapaction' => ''
                                                  )
        );
    }

    /**
     *
     *
     * @param bpDynamicPayRequest $parameters
     *
     * @return bpDynamicPayRequestResponse
     */
    public function bpDynamicPayRequest(bpDynamicPayRequest $parameters) {
        return $this->__soapCall('bpDynamicPayRequest', array($parameters), array(
                                                          'uri'        => 'http://service.pgw.sw.bps.com/',
                                                          'soapaction' => ''
                                                      )
        );
    }

    /**
     *
     *
     * @param bpCumulativeDynamicPayRequest $parameters
     *
     * @return bpCumulativeDynamicPayRequestResponse
     */
    public function bpCumulativeDynamicPayRequest(bpCumulativeDynamicPayRequest $parameters) {
        return $this->__soapCall('bpCumulativeDynamicPayRequest', array($parameters), array(
                                                                    'uri'        => 'http://service.pgw.sw.bps.com/',
                                                                    'soapaction' => ''
                                                                )
        );
    }

    /**
     *
     *
     * @param bpReversalRequest $parameters
     *
     * @return bpReversalRequestResponse
     */
    public function bpReversalRequest(bpReversalRequest $parameters) {
        return $this->__soapCall('bpReversalRequest', array($parameters), array(
                                                        'uri'        => 'http://service.pgw.sw.bps.com/',
                                                        'soapaction' => ''
                                                    )
        );
    }

    /**
     *
     *
     * @param bpPayRequest $parameters
     *
     * @return bpPayRequestResponse
     */
    public function bpPayRequest(bpPayRequest $parameters) {
        return $this->__soapCall('bpPayRequest', array($parameters), array(
                                                   'uri'        => 'http://service.pgw.sw.bps.com/',
                                                   'soapaction' => ''
                                               )
        );
    }

    /**
     *
     *
     * @param bpSaleReferenceIdRequest $parameters
     *
     * @return bpSaleReferenceIdRequestResponse
     */
    public function bpSaleReferenceIdRequest(bpSaleReferenceIdRequest $parameters) {
        return $this->__soapCall('bpSaleReferenceIdRequest', array($parameters), array(
                                                               'uri'        => 'http://service.pgw.sw.bps.com/',
                                                               'soapaction' => ''
                                                           )
        );
    }

    /**
     *
     *
     * @param bpChargePayRequest $parameters
     *
     * @return bpChargePayRequestResponse
     */
    public function bpChargePayRequest(bpChargePayRequest $parameters) {
        return $this->__soapCall('bpChargePayRequest', array($parameters), array(
                                                         'uri'        => 'http://service.pgw.sw.bps.com/',
                                                         'soapaction' => ''
                                                     )
        );
    }

    /**
     *
     *
     * @param bpInquiryRequest $parameters
     *
     * @return bpInquiryRequestResponse
     */
    public function bpInquiryRequest(bpInquiryRequest $parameters) {
        return $this->__soapCall('bpInquiryRequest', array($parameters), array(
                                                       'uri'        => 'http://service.pgw.sw.bps.com/',
                                                       'soapaction' => ''
                                                   )
        );
    }

    /**
     *
     *
     * @param bpRefundRequest $parameters
     *
     * @return bpRefundRequestResponse
     */
    public function bpRefundRequest(bpRefundRequest $parameters) {
        return $this->__soapCall('bpRefundRequest', array($parameters), array(
                                                      'uri'        => 'http://service.pgw.sw.bps.com/',
                                                      'soapaction' => ''
                                                  )
        );
    }

}

?>
