<?php

namespace IPG\Gateways\SamanKish;

/**
 * PaymentIFBinding class
 *
 *
 *
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class PaymentIFBinding extends SoapClient {

    private static $classmap = array(
    );

    public function PaymentIFBinding($wsdl = "https://sep.shaparak.ir/payments/referencepayment.asmx?WSDL", $options = array()) {
        foreach(self::$classmap as $key => $value) {
            if(!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        parent::__construct($wsdl, $options);
    }

    /**
     *
     *
     * @param string $String_1
     * @param string $String_2
     * @return double
     */
    public function verifyTransaction($String_1, $String_2) {
        return $this->__soapCall('verifyTransaction', array($String_1, $String_2),       array(
                'uri' => 'urn:Foo',
                'soapaction' => ''
            )
        );
    }

    /**
     *
     *
     * @param string $String_1
     * @param string $String_2
     * @return double
     */
    public function verifyTransaction1($String_1, $String_2) {
        return $this->__soapCall('verifyTransaction1', array($String_1, $String_2),       array(
                'uri' => 'urn:Foo',
                'soapaction' => ''
            )
        );
    }

    /**
     *
     *
     * @param string $String_1
     * @param string $String_2
     * @param string $Username
     * @param string $Password
     * @return double
     */
    public function reverseTransaction($String_1, $String_2, $Username, $Password) {
        return $this->__soapCall('reverseTransaction', array($String_1, $String_2, $Username, $Password),       array(
                'uri' => 'urn:Foo',
                'soapaction' => ''
            )
        );
    }

    /**
     *
     *
     * @param string $String_1
     * @param string $String_2
     * @param string $Password
     * @param double $Amount
     * @return double
     */
    public function reverseTransaction1($String_1, $String_2, $Password, $Amount) {
        return $this->__soapCall('reverseTransaction1', array($String_1, $String_2, $Password, $Amount),       array(
                'uri' => 'urn:Foo',
                'soapaction' => ''
            )
        );
    }

}