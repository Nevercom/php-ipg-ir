<?php
/**
* PaymentIFBinding class
* 
*  
* 
* @author    {author}
* @copyright {copyright}
* @package   {package}
*/

namespace IPG\Gateways\SamanKish;

class PaymentInitIFBinding extends \SoapClient {

    private static $classmap = array(
    );

    public function PaymentInitIFBinding($wsdl = "https://sep.shaparak.ir/Payments/InitPayment.asmx?wsdl", $options = array()) {
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
     * @param string $TermID
     * @param string $ResNum
     * @param long $TotalAmount
     * @param long $SegAmount1
     * @param long $SegAmount2
     * @param long $SegAmount3
     * @param long $SegAmount4
     * @param long $SegAmount5
     * @param long $SegAmount6
     * @param string $AdditionalData1
     * @param string $AdditionalData2
     * @param long $Wage
     * @return string
     */
    public function RequestToken($TermID, $ResNum, $TotalAmount, $SegAmount1, $SegAmount2, $SegAmount3, $SegAmount4, $SegAmount5, $SegAmount6, $AdditionalData1, $AdditionalData2, $Wage) {
        return $this->__soapCall('RequestToken', array($TermID, $ResNum, $TotalAmount, $SegAmount1, $SegAmount2, $SegAmount3, $SegAmount4, $SegAmount5, $SegAmount6, $AdditionalData1, $AdditionalData2, $Wage),       array(
                'uri' => 'urn:Foo',
                'soapaction' => ''
            )
        );
    }

}
