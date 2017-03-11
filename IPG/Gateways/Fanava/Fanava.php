<?php
namespace IPG\Gateways\Fanava;

use SoapClient;

class verifyTransaction {
    /** @var  wsContext */
    public $context;
    /** @var  verifyRequest */
    public $verifyRequest;
}

class wsContext {
    /** @var  data */
    public $data;
}

class data {
    /** @var  entry */
    public $entry;
}

class entry {
    /** @var  string */
    public $key;
    /** @var  string */
    public $value;
}

class verifyRequest {
    /** @var  string */
    public $refNumList;
}

class verifyTransactionResponse {
    /** @var  verifyResponse */
    public $return;
}

class verifyResponse {
    /** @var  verifyResponseResult */
    public $verifyResponseResults;
}

class verifyResponseResult {
    /** @var  integer */
    public $amount;
    /** @var  string */
    public $refNum;
    /** @var  verificationError */
    public $verificationError;
}

class WsClientAddressException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class throwable {
    /** @var  stackTraceElement */
    public $stackTrace;
}

class stackTraceElement {
}

class WsInvalidSessionException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class getPurchaseParamsToSign {
    /** @var  string */
    public $resNum;
    /** @var  integer */
    public $amount;
    /** @var  string */
    public $redirectUrl;
}

class getPurchaseParamsToSignResponse {
    /** @var  dataToSignResponse */
    public $return;
}

class dataToSignResponse {
    /** @var  string */
    public $dataToSign;
    /** @var  string */
    public $uniqueId;
}

class secureVerifyTransaction {
    /** @var  wsContext */
    public $context;
    /** @var  secureVerifyRequest */
    public $secureVerifyRequest;
}

class secureVerifyRequest {
    /** @var  secureVerifyInfo */
    public $secureVerifyInfoList;
}

class secureVerifyInfo {
    /** @var  string */
    public $refNum;
    /** @var  string */
    public $resNum;
}

class secureVerifyTransactionResponse {
    /** @var  secureVerifyResponse */
    public $return;
}

class secureVerifyResponse {
    /** @var  secureVerifyResponseResult */
    public $secureVerifyResponseResults;
}

class secureVerifyResponseResult {
    /** @var  integer */
    public $amount;
    /** @var  string */
    public $refNum;
    /** @var  string */
    public $resNum;
    /** @var  verificationError */
    public $verificationError;
}

class generateSignedPurchaseToken {
    /** @var  wsContext */
    public $context;
    /** @var  string */
    public $signature;
    /** @var  string */
    public $uniqueId;
    /** @var  string */
    public $resNum;
    /** @var  integer */
    public $amount;
    /** @var  string */
    public $redirectUrl;
}

class generateSignedPurchaseTokenResponse {
    /** @var  tokenInfo */
    public $return;
}

class tokenInfo {
    /** @var  string */
    public $expirationDate;
    /** @var  string */
    public $token;
}

class WsTransactionNotFoundException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class tokenPurchaseVerifyTransaction {
    /** @var  wsContext */
    public $context;
    /** @var  tokenPurchaseVerificationRequest */
    public $purchaseVerificationDto;
}

class tokenPurchaseVerificationRequest {
    /** @var  integer */
    public $amount;
    /** @var  string */
    public $referenceNumber;
    /** @var  string */
    public $token;
}

class tokenPurchaseVerifyTransactionResponse {
    /** @var  tokenPurchaseVerificationResponse */
    public $return;
}

class tokenPurchaseVerificationResponse {
    /** @var  integer */
    public $resultTotalAmount;
}

class WsInvalidAmountException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class WsInvalidTokenException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class WsPaymentVerificationException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class login {
    /** @var  loginRequest */
    public $loginRequest;
}

class loginRequest {
    /** @var  string */
    public $password;
    /** @var  string */
    public $username;
}

class loginResponse {
    /** @var  string */
    public $return;
}

class WsBlockUserException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class WsInvalidCredentialException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class logout {
    /** @var  wsContext */
    public $context;
}

class logoutResponse {
}

class reportTransaction {
    /** @var  wsContext */
    public $context;
    /** @var  reportRequest */
    public $reportRequest;
}

class reportRequest {
    /** @var  integer */
    public $amountMax;
    /** @var  integer */
    public $amountMin;
    /** @var  string */
    public $billId;
    /** @var  billType */
    public $billTypes;
    /** @var  string */
    public $customerRefNum;
    /** @var  integer */
    public $length;
    /** @var  integer */
    public $offset;
    /** @var  boolean */
    public $onlyReversed;
    /** @var  orderField */
    public $orderField;
    /** @var  orderType */
    public $orderType;
    /** @var  string */
    public $paymentId;
    /** @var  string */
    public $refNum;
    /** @var  string */
    public $resNum;
    /** @var  string */
    public $timeMax;
    /** @var  string */
    public $timeMin;
    /** @var  transactionState */
    public $transactionState;
    /** @var  transactionType */
    public $transactionType;
}

class reportTransactionResponse {
    /** @var  reportResponse */
    public $return;
}

class reportResponse {
    /** @var  reportResponseResult */
    public $reportResponseResults;
    /** @var  integer */
    public $totalRecord;
}

class reportResponseResult {
    /** @var  integer */
    public $amount;
    /** @var  string */
    public $billId;
    /** @var  billType */
    public $billType;
    /** @var  string */
    public $customerRefNum;
    /** @var  string */
    public $errorCause;
    /** @var  integer */
    public $id;
    /** @var  string */
    public $paymentId;
    /** @var  string */
    public $refNum;
    /** @var  string */
    public $resNum;
    /** @var  string */
    public $time;
    /** @var  transactionState */
    public $transactionState;
    /** @var  transactionType */
    public $transactionType;
}

class reverseTransaction {
    /** @var  wsContext */
    public $context;
    /** @var  reverseRequest */
    public $reverseRequest;
}

class reverseRequest {
    /** @var  integer */
    public $amount;
    /** @var  string */
    public $mainTransactionRefNum;
    /** @var  string */
    public $reverseTransactionResNum;
}

class reverseTransactionResponse {
    /** @var  reverseResponse */
    public $return;
}

class reverseResponse {
    /** @var  string */
    public $refNum;
}

class WebServiceException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class WsAmountConstraintViolationException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class WsAuthenticationException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class WsInsufficientFundsException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class WsPaymentReverseException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class WsSystemMalFunctionException {
    /** @var  string */
    public $message;
    /** @var  throwable */
    public $suppressed;
}

class verificationError {
}

class billType {
}

class orderField {
}

class orderType {
}

class transactionState {
}

class transactionType {
}


/**
 * PaymentWebServiceService class
 *
 *
 *
 * @author    Nevercom <nevercom@gmail.com>
 */
class Fanava extends SoapClient {

    private static $classmap = array(
        'verifyTransaction'                      => 'verifyTransaction',
        'wsContext'                              => 'wsContext',
        'data'                                   => 'data',
        'entry'                                  => 'entry',
        'verifyRequest'                          => 'verifyRequest',
        'verifyTransactionResponse'              => 'verifyTransactionResponse',
        'verifyResponse'                         => 'verifyResponse',
        'verifyResponseResult'                   => 'verifyResponseResult',
        'WsClientAddressException'               => 'WsClientAddressException',
        'throwable'                              => 'throwable',
        'stackTraceElement'                      => 'stackTraceElement',
        'WsInvalidSessionException'              => 'WsInvalidSessionException',
        'getPurchaseParamsToSign'                => 'getPurchaseParamsToSign',
        'getPurchaseParamsToSignResponse'        => 'getPurchaseParamsToSignResponse',
        'dataToSignResponse'                     => 'dataToSignResponse',
        'secureVerifyTransaction'                => 'secureVerifyTransaction',
        'secureVerifyRequest'                    => 'secureVerifyRequest',
        'secureVerifyInfo'                       => 'secureVerifyInfo',
        'secureVerifyTransactionResponse'        => 'secureVerifyTransactionResponse',
        'secureVerifyResponse'                   => 'secureVerifyResponse',
        'secureVerifyResponseResult'             => 'secureVerifyResponseResult',
        'generateSignedPurchaseToken'            => 'generateSignedPurchaseToken',
        'generateSignedPurchaseTokenResponse'    => 'generateSignedPurchaseTokenResponse',
        'tokenInfo'                              => 'tokenInfo',
        'WsTransactionNotFoundException'         => 'WsTransactionNotFoundException',
        'tokenPurchaseVerifyTransaction'         => 'tokenPurchaseVerifyTransaction',
        'tokenPurchaseVerificationRequest'       => 'tokenPurchaseVerificationRequest',
        'tokenPurchaseVerifyTransactionResponse' => 'tokenPurchaseVerifyTransactionResponse',
        'tokenPurchaseVerificationResponse'      => 'tokenPurchaseVerificationResponse',
        'WsInvalidAmountException'               => 'WsInvalidAmountException',
        'WsInvalidTokenException'                => 'WsInvalidTokenException',
        'WsPaymentVerificationException'         => 'WsPaymentVerificationException',
        'login'                                  => 'login',
        'loginRequest'                           => 'loginRequest',
        'loginResponse'                          => 'loginResponse',
        'WsBlockUserException'                   => 'WsBlockUserException',
        'WsInvalidCredentialException'           => 'WsInvalidCredentialException',
        'logout'                                 => 'logout',
        'logoutResponse'                         => 'logoutResponse',
        'reportTransaction'                      => 'reportTransaction',
        'reportRequest'                          => 'reportRequest',
        'reportTransactionResponse'              => 'reportTransactionResponse',
        'reportResponse'                         => 'reportResponse',
        'reportResponseResult'                   => 'reportResponseResult',
        'reverseTransaction'                     => 'reverseTransaction',
        'reverseRequest'                         => 'reverseRequest',
        'reverseTransactionResponse'             => 'reverseTransactionResponse',
        'reverseResponse'                        => 'reverseResponse',
        'WebServiceException'                    => 'WebServiceException',
        'WsAmountConstraintViolationException'   => 'WsAmountConstraintViolationException',
        'WsAuthenticationException'              => 'WsAuthenticationException',
        'WsInsufficientFundsException'           => 'WsInsufficientFundsException',
        'WsPaymentReverseException'              => 'WsPaymentReverseException',
        'WsSystemMalFunctionException'           => 'WsSystemMalFunctionException',
        'verificationError'                      => 'verificationError',
        'billType'                               => 'billType',
        'orderField'                             => 'orderField',
        'orderType'                              => 'orderType',
        'transactionState'                       => 'transactionState',
        'transactionType'                        => 'transactionType',
    );

    public function Fanava($wsdl = "https://fcp.shaparak.ir/ref-payment/jax/merchantAuth?wsdl", $options = array()) {
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
     * @param getPurchaseParamsToSign $parameters
     *
     * @return getPurchaseParamsToSignResponse
     */
    public function getPurchaseParamsToSign(getPurchaseParamsToSign $parameters) {
        return $this->__soapCall('getPurchaseParamsToSign', array($parameters), array(
                                                              'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param generateSignedPurchaseToken $parameters
     *
     * @return generateSignedPurchaseTokenResponse
     */
    public function generateSignedPurchaseToken(generateSignedPurchaseToken $parameters) {
        return $this->__soapCall('generateSignedPurchaseToken', array($parameters), array(
                                                                  'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                                                  'soapaction' => ''
                                                              )
        );
    }

    /**
     *
     *
     * @param tokenPurchaseVerifyTransaction $parameters
     *
     * @return tokenPurchaseVerifyTransactionResponse
     */
    public function tokenPurchaseVerifyTransaction(tokenPurchaseVerifyTransaction $parameters) {
        return $this->__soapCall('tokenPurchaseVerifyTransaction', array($parameters), array(
                                                                     'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                                                     'soapaction' => ''
                                                                 )
        );
    }

    /**
     *
     *
     * @param verifyTransaction $parameters
     *
     * @return verifyTransactionResponse
     */
    public function verifyTransaction(verifyTransaction $parameters) {
        return $this->__soapCall('verifyTransaction', array($parameters), array(
                                                        'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                                        'soapaction' => ''
                                                    )
        );
    }

    /**
     *
     *
     * @param secureVerifyTransaction $parameters
     *
     * @return secureVerifyTransactionResponse
     */
    public function secureVerifyTransaction(secureVerifyTransaction $parameters) {
        return $this->__soapCall('secureVerifyTransaction', array($parameters), array(
                                                              'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                                              'soapaction' => ''
                                                          )
        );
    }

    /**
     *
     *
     * @param reverseTransaction $parameters
     *
     * @return reverseTransactionResponse
     */
    public function reverseTransaction(reverseTransaction $parameters) {
        return $this->__soapCall('reverseTransaction', array($parameters), array(
                                                         'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                                         'soapaction' => ''
                                                     )
        );
    }

    /**
     *
     *
     * @param reportTransaction $parameters
     *
     * @return reportTransactionResponse
     */
    public function reportTransaction(reportTransaction $parameters) {
        return $this->__soapCall('reportTransaction', array($parameters), array(
                                                        'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                                        'soapaction' => ''
                                                    )
        );
    }

    /**
     *
     *
     * @param login $parameters
     *
     * @return loginResponse
     */
    public function login(login $parameters) {
        return $this->__soapCall('login', array($parameters), array(
                                            'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                            'soapaction' => ''
                                        )
        );
    }

    /**
     *
     *
     * @param logout $parameters
     *
     * @return logoutResponse
     */
    public function logout(logout $parameters) {
        return $this->__soapCall('logout', array($parameters), array(
                                             'uri'        => 'http://paymentService.merchant.webservice.epayment.modern.tosan.com/',
                                             'soapaction' => ''
                                         )
        );
    }

}