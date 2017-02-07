<?php
/*
*                        _oo0oo_
*                       o8888888o
*                       88" . "88
*                       (| -_- |)
*                       0\  =  /0
*                     ___/`---'\___
*                   .' \\|     |// '.
*                  / \\|||  :  |||// \
*                 / _||||| -:- |||||- \
*                |   | \\\  -  /// |   |
*                | \_|  ''\---/''  |_/ |
*                \  .-\__  '-'  ___/-. /
*              ___'. .'  /--.--\  `. .'___
*           ."" '<  `.___\_<|>_/___.' >' "".
*          | | :  `- \`.;`\ _ /`;.`/ - ` : | |
*          \  \ `_.   \_ __\ /__ _/   .-` /  /
*      =====`-.____`.___ \_____/___.-`___.-'=====
*                        `=---='
* 
* 
*      ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
* 
*                Buddha Bless This Code
*                    To be Bug Free
* 
*  Created by nevercom at 2/6/17 5:29 PM
*/

namespace IPG\Gateways\Fanava;

use SoapClient;

class verifyTransaction {
    /** @var  wsContext */
    var $context;//wsContext
    /** @var  verifyRequest */
    var $verifyRequest;//verifyRequest
}

class wsContext {
    /** @var  data */
    var $data;//data
}

class data {
    /** @var  entry */
    var $entry;//entry
}

class entry {
    /** @var  string */
    var $key;//string
    /** @var  string */
    var $value;//string
}

class verifyRequest {
    /** @var  string */
    var $refNumList;//string
}

class verifyTransactionResponse {
    /** @var  verifyResponse */
    var $return;//verifyResponse
}

class verifyResponse {
    /** @var  verifyResponseResult */
    var $verifyResponseResults;//verifyResponseResult
}

class verifyResponseResult {
    /** @var  integer */
    var $amount;//decimal
    /** @var  string */
    var $refNum;//string

    var $verificationError;//verificationError
}

class WsClientAddressException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class throwable {
    /** @var  stackTraceElement */
    var $stackTrace;//stackTraceElement
}

class stackTraceElement {
}

class WsInvalidSessionException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class getPurchaseParamsToSign {
    /** @var  string */
    var $resNum;//string
    /** @var  integer */
    var $amount;//decimal
    /** @var  string */
    var $redirectUrl;//string
}

class getPurchaseParamsToSignResponse {
    /** @var  dataToSignResponse */
    var $return;//dataToSignResponse
}

class dataToSignResponse {
    /** @var  string */
    var $dataToSign;//string
    /** @var  string */
    var $uniqueId;//string
}

class secureVerifyTransaction {
    /** @var  wsContext */
    var $context;//wsContext
    /** @var  secureVerifyRequest */
    var $secureVerifyRequest;//secureVerifyRequest
}

class secureVerifyRequest {
    /** @var  secureVerifyInfo */
    var $secureVerifyInfoList;//secureVerifyInfo
}

class secureVerifyInfo {
    /** @var  string */
    var $refNum;//string
    /** @var  string */

    var $resNum;//string
}

class secureVerifyTransactionResponse {
    /** @var  secureVerifyResponse */
    var $return;//secureVerifyResponse
}

class secureVerifyResponse {
    /** @var  secureVerifyResponseResult */
    var $secureVerifyResponseResults;//secureVerifyResponseResult
}

class secureVerifyResponseResult {
    /** @var  integer */
    var $amount;//decimal
    /** @var  string */
    var $refNum;//string
    /** @var  string */
    var $resNum;//string
    var $verificationError;//verificationError
}

class generateSignedPurchaseToken {
    /** @var  wsContext */
    var $context;//wsContext
    /** @var  string */
    var $signature;//string
    /** @var  string */
    var $uniqueId;//string
    /** @var  string */
    var $resNum;//string
    /** @var  integer */
    var $amount;//decimal
    /** @var  string */
    var $redirectUrl;//string
}

class generateSignedPurchaseTokenResponse {
    /** @var  tokenInfo */
    var $return;//tokenInfo
}

class tokenInfo {
    /** @var  string */
    var $expirationDate;//dateTime
    /** @var  string */
    var $token;//string
}

class WsTransactionNotFoundException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class tokenPurchaseVerifyTransaction {
    /** @var  wsContext */
    var $context;//wsContext
    /** @var  tokenPurchaseVerificationRequest */
    var $purchaseVerificationDto;//tokenPurchaseVerificationRequest
}

class tokenPurchaseVerificationRequest {
    /** @var  integer */
    var $amount;//decimal
    /** @var  string */
    var $referenceNumber;//string
    /** @var  string */
    var $token;//string
}

class tokenPurchaseVerifyTransactionResponse {
    /** @var  tokenPurchaseVerificationResponse */
    var $return;//tokenPurchaseVerificationResponse
}

class tokenPurchaseVerificationResponse {
    /** @var  integer */
    var $resultTotalAmount;//decimal
}

class WsInvalidAmountException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class WsInvalidTokenException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class WsPaymentVerificationException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class login {
    /** @var loginRequest  */
    var $loginRequest;//loginRequest
}

class loginRequest {
    /** @var  string */
    var $password;//string
    /** @var  string */
    var $username;//string
}

class loginResponse {
    /** @var  string */
    var $return;//string
}

class WsBlockUserException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class WsInvalidCredentialException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class logout {
    /** @var  wsContext */
    var $context;//wsContext
}

class logoutResponse {
}

class reportTransaction {
    /** @var  wsContext */
    var $context;//wsContext
    /** @var  reportRequest */
    var $reportRequest;//reportRequest
}

class reportRequest {
    /** @var  integer */
    var $amountMax;//decimal
    /** @var  integer */
    var $amountMin;//decimal
    /** @var  string */
    var $billId;//string

    var $billTypes;//billType
    /** @var  string */
    var $customerRefNum;//string
    /** @var  integer */
    var $length;//short
    /** @var  integer */
    var $offset;//long
    /** @var  boolean */
    var $onlyReversed;//boolean

    var $orderField;//orderField
    var $orderType;//orderType
    /** @var  string */
    var $paymentId;//string
    /** @var  string */
    var $refNum;//string
    /** @var  string */
    var $resNum;//string
    /** @var  string */
    var $timeMax;//dateTime
    /** @var  string */
    var $timeMin;//dateTime
    var $transactionState;//transactionState
    var $transactionType;//transactionType
}

class reportTransactionResponse {
    /** @var  reportResponse */
    var $return;//reportResponse
}

class reportResponse {
    /** @var  reportResponseResult */
    var $reportResponseResults;//reportResponseResult
    /** @var  integer */
    var $totalRecord;//long
}

class reportResponseResult {
    /** @var  integer */
    var $amount;//decimal
    /** @var  string */
    var $billId;//string
    var $billType;//billType
    /** @var  string */
    var $customerRefNum;//string
    /** @var  string */
    var $errorCause;//string
    /** @var  integer */
    var $id;//long
    /** @var  string */
    var $paymentId;//string
    /** @var  string */
    var $refNum;//string
    /** @var  string */
    var $resNum;//string
    /** @var  string */
    var $time;//dateTime
    var $transactionState;//transactionState
    var $transactionType;//transactionType
}

class reverseTransaction {
    /** @var  wsContext */
    var $context;//wsContext
    /** @var  reverseRequest */
    var $reverseRequest;//reverseRequest
}

class reverseRequest {
    /** @var  integer */
    var $amount;//decimal
    /** @var  string */
    var $mainTransactionRefNum;//string
    /** @var  string */
    var $reverseTransactionResNum;//string
}

class reverseTransactionResponse {
    /** @var  reverseResponse */
    var $return;//reverseResponse
}

class reverseResponse {
    /** @var  string */
    var $refNum;//string
}

class WebServiceException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class WsAmountConstraintViolationException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class WsAuthenticationException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class WsInsufficientFundsException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class WsPaymentReverseException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class WsSystemMalFunctionException {
    /** @var  string */
    var $message;//string
    /** @var  throwable */
    var $suppressed;//throwable
}

class Fanava {
    var $soapClient;

    private static $classmap = array('verifyTransaction'                      => 'verifyTransaction'
                                     , 'wsContext'                            => 'wsContext'
                                     , 'data'                                 => 'data'
                                     , 'entry'                                => 'entry'
                                     , 'verifyRequest'                        => 'verifyRequest'
                                     , 'verifyTransactionResponse'            => 'verifyTransactionResponse'
                                     , 'verifyResponse'                       => 'verifyResponse'
                                     , 'verifyResponseResult'                 => 'verifyResponseResult'
                                     , 'WsClientAddressException'             => 'WsClientAddressException'
                                     , 'throwable'                            => 'throwable'
                                     , 'stackTraceElement'                    => 'stackTraceElement'
                                     , 'WsInvalidSessionException'            => 'WsInvalidSessionException'
                                     , 'getPurchaseParamsToSign'              => 'getPurchaseParamsToSign'
                                     , 'getPurchaseParamsToSignResponse'      => 'getPurchaseParamsToSignResponse'
                                     , 'dataToSignResponse'                   => 'dataToSignResponse'
                                     , 'secureVerifyTransaction'              => 'secureVerifyTransaction'
                                     , 'secureVerifyRequest'                  => 'secureVerifyRequest'
                                     , 'secureVerifyInfo'                     => 'secureVerifyInfo'
                                     , 'secureVerifyTransactionResponse'      => 'secureVerifyTransactionResponse'
                                     , 'secureVerifyResponse'                 => 'secureVerifyResponse'
                                     , 'secureVerifyResponseResult'           => 'secureVerifyResponseResult'
                                     , 'generateSignedPurchaseToken'          => 'generateSignedPurchaseToken'
                                     , 'generateSignedPurchaseTokenResponse'  => 'generateSignedPurchaseTokenResponse'
                                     , 'tokenInfo'                            => 'tokenInfo'
                                     , 'WsTransactionNotFoundException'       => 'WsTransactionNotFoundException'
                                     , 'tokenPurchaseVerifyTransaction'       => 'tokenPurchaseVerifyTransaction'
                                     , 'tokenPurchaseVerificationRequest'     => 'tokenPurchaseVerificationRequest'
                                     ,
                                     'tokenPurchaseVerifyTransactionResponse' => 'tokenPurchaseVerifyTransactionResponse'
                                     , 'tokenPurchaseVerificationResponse'    => 'tokenPurchaseVerificationResponse'
                                     , 'WsInvalidAmountException'             => 'WsInvalidAmountException'
                                     , 'WsInvalidTokenException'              => 'WsInvalidTokenException'
                                     , 'WsPaymentVerificationException'       => 'WsPaymentVerificationException'
                                     , 'login'                                => 'login'
                                     , 'loginRequest'                         => 'loginRequest'
                                     , 'loginResponse'                        => 'loginResponse'
                                     , 'WsBlockUserException'                 => 'WsBlockUserException'
                                     , 'WsInvalidCredentialException'         => 'WsInvalidCredentialException'
                                     , 'logout'                               => 'logout'
                                     , 'logoutResponse'                       => 'logoutResponse'
                                     , 'reportTransaction'                    => 'reportTransaction'
                                     , 'reportRequest'                        => 'reportRequest'
                                     , 'reportTransactionResponse'            => 'reportTransactionResponse'
                                     , 'reportResponse'                       => 'reportResponse'
                                     , 'reportResponseResult'                 => 'reportResponseResult'
                                     , 'reverseTransaction'                   => 'reverseTransaction'
                                     , 'reverseRequest'                       => 'reverseRequest'
                                     , 'reverseTransactionResponse'           => 'reverseTransactionResponse'
                                     , 'reverseResponse'                      => 'reverseResponse'
                                     , 'WebServiceException'                  => 'WebServiceException'
                                     ,
                                     'WsAmountConstraintViolationException'   => 'WsAmountConstraintViolationException'
                                     , 'WsAuthenticationException'            => 'WsAuthenticationException'
                                     , 'WsInsufficientFundsException'         => 'WsInsufficientFundsException'
                                     , 'WsPaymentReverseException'            => 'WsPaymentReverseException'
                                     , 'WsSystemMalFunctionException'         => 'WsSystemMalFunctionException'

    );

    function __construct($url = 'https://fanava.shaparak.ir/ref-payment/jax/merchantAuth?wsdl') {
        $this->soapClient =
            new SoapClient($url, array("classmap" => self::$classmap, "trace" => TRUE, "exceptions" => TRUE));
    }

    /**
     * @param getPurchaseParamsToSign $getPurchaseParamsToSign
     *
     * @return getPurchaseParamsToSignResponse
     */
    function getPurchaseParamsToSign(getPurchaseParamsToSign $getPurchaseParamsToSign) {

        $getPurchaseParamsToSignResponse = $this->soapClient->getPurchaseParamsToSign($getPurchaseParamsToSign);

        return $getPurchaseParamsToSignResponse;

    }

    /**
     * @param generateSignedPurchaseToken $generateSignedPurchaseToken
     *
     * @return generateSignedPurchaseTokenResponse
     */
    function generateSignedPurchaseToken(generateSignedPurchaseToken $generateSignedPurchaseToken) {

        $generateSignedPurchaseTokenResponse =
            $this->soapClient->generateSignedPurchaseToken($generateSignedPurchaseToken);

        return $generateSignedPurchaseTokenResponse;

    }

    /**
     * @param tokenPurchaseVerifyTransaction $tokenPurchaseVerifyTransaction
     *
     * @return tokenPurchaseVerifyTransactionResponse
     */
    function tokenPurchaseVerifyTransaction(tokenPurchaseVerifyTransaction $tokenPurchaseVerifyTransaction) {

        $tokenPurchaseVerifyTransactionResponse =
            $this->soapClient->tokenPurchaseVerifyTransaction($tokenPurchaseVerifyTransaction);

        return $tokenPurchaseVerifyTransactionResponse;

    }

    /**
     * @param verifyTransaction $verifyTransaction
     *
     * @return verifyTransactionResponse
     */
    function verifyTransaction(verifyTransaction $verifyTransaction) {

        $verifyTransactionResponse = $this->soapClient->verifyTransaction($verifyTransaction);

        return $verifyTransactionResponse;

    }

    /**
     * @param secureVerifyTransaction $secureVerifyTransaction
     *
     * @return secureVerifyTransactionResponse
     */
    function secureVerifyTransaction(secureVerifyTransaction $secureVerifyTransaction) {

        $secureVerifyTransactionResponse = $this->soapClient->secureVerifyTransaction($secureVerifyTransaction);

        return $secureVerifyTransactionResponse;

    }

    /**
     * @param reverseTransaction $reverseTransaction
     *
     * @return reverseTransactionResponse
     */
    function reverseTransaction(reverseTransaction $reverseTransaction) {

        $reverseTransactionResponse = $this->soapClient->reverseTransaction($reverseTransaction);

        return $reverseTransactionResponse;

    }

    /**
     * @param reportTransaction $reportTransaction
     *
     * @return reportTransactionResponse
     */
    function reportTransaction(reportTransaction $reportTransaction) {

        $reportTransactionResponse = $this->soapClient->reportTransaction($reportTransaction);

        return $reportTransactionResponse;

    }

    /**
     * @param login $login
     *
     * @return loginResponse
     */
    function login(login $login) {

        $loginResponse = $this->soapClient->login($login);

        return $loginResponse;

    }

    /**
     * @param logout $logout
     *
     * @return logoutResponse
     */
    function logout(logout $logout) {

        $logoutResponse = $this->soapClient->logout($logout);

        return $logoutResponse;

    }
}