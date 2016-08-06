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
*  Created by nevercom at 7/18/16 2:46 PM
*/
namespace IPG;

use Exception;
use IPG\Contract\AbstractIPG;
use IPG\Contract\AbstractIPGDatabaseManager;
use IPG\Models\PaymentResponse;

class IPGManager {
    const PAY_ID = "IPGPaymentId";
    /** @var AbstractIPGDatabaseManager */
    protected $dbMan;
    /** @var AbstractIPG */
    private $ipg;
    private   $referenceId;

    public function __construct(AbstractIPG $ipg, AbstractIPGDatabaseManager $db) {
        if (!($ipg instanceof AbstractIPG)) {
            throw new Exception("Provided class is not an instance of AbstractIPG class");

        }
        if (!($db instanceof AbstractIPGDatabaseManager)) {
            throw new Exception("Provided class is not an instance of AbstractIPGDatabaseManager class");

        }
        $this->ipg   = $ipg;
        $this->dbMan = $db;
    }

    /**
     * @param array                      $request
     *
     * @param AbstractIPGDatabaseManager $db
     *
     * @return IPGManager
     * @throws Exception
     */
    public static function fromCallback(array $request, AbstractIPGDatabaseManager $db) {
        // implement a way to detect class name by callback info
        if (!($db instanceof AbstractIPGDatabaseManager)) {
            throw new Exception("Provided class is not an instance of AbstractIPGDatabaseManager class");

        }


        if (empty($request[self::PAY_ID])) {
            throw new Exception("Payment ID not provided");
        }

        $gateway = $db->getPaymentGateway($request[self::PAY_ID]);
        if (empty($gateway)) {
            throw new Exception("There is no valid gateway for this transaction. Gateway Class: {$gateway}");
        }
        try {
            $ipg = new $gateway();
        } catch (Exception $e) {
            throw new Exception("There is no valid gateway for this transaction. Gateway Class: {$gateway}");
        }
        $instance = new self($ipg, $db);

        $instance->dbMan = $db;

        return $instance;
    }

    /**
     * @param int    $transactionId
     * @param int    $amount
     * @param string $callbackUrl
     *
     * @return PaymentResponse
     */
    public function startPayment($transactionId, $amount, $callbackUrl) {
        // Save transaction info in database
        $payId = $this->dbMan->saveTransaction($transactionId, get_class($this->ipg), $amount);
        // Here generated payId is appended to the callback url, so that we can identify transaction in the validation process
        $callbackUrl = $callbackUrl . (strpos($callbackUrl, '?') === FALSE
                ? "?" . self::PAY_ID . "={$payId}"
                : "&" . self::PAY_ID . "={$payId}");
        // every method call is logged to the database
        $logId = $this->dbMan->logMethodCall($payId, get_class($this->ipg) . "\\startPayment", [
            "transactionId" => $transactionId, "amount" => $amount, "callbackUrl" => $callbackUrl
        ]);
        // actula method call
        $paymentResponse = $this->ipg->startPayment($transactionId, $amount, $callbackUrl);
        // and in the end, we update the logged record in the database to include the method response
        $this->dbMan->logMethodResponse($logId, [
            "isIsSuccessful" => $paymentResponse->isIsSuccessful(),
            "ReferenceId"    => $paymentResponse->getReferenceId(),
            "TargetUrl"      => $paymentResponse->getTargetUrl(),
            "Data"           => $paymentResponse->getData()
        ], $this->ipg->getErrorCode()
        );

        return $paymentResponse;
    }

    /**
     * @param array $request The $_REQUEST variable must be provided
     *
     * @return boolean
     */
    public function isPaymentValid($request) {
        $payId = $request[self::PAY_ID];
        if (empty($payId)) {
            /*
             * If there is no PaymentId present in the $_REQUEST, something mysterious happened !!!
             */
            return FALSE;
        }
        if ($this->dbMan->getTransactionStatus($payId < 1)) {
            return FALSE;
        }
        // each method call is logged
        $logId = $this->dbMan->logMethodCall($payId, get_class($this->ipg) . "\\isPaymentValid", $request);
        // query the Gateway to check if this payment is valid in their eyes
        $response = $this->ipg->isPaymentValid($request);
        // we need this "Referenece ID" for further API calls, such as "verify"
        $this->referenceId = $response->getReferenceId();
        // Again, each method response is logged
        $this->dbMan->logMethodResponse($logId, [
            "isValid"     => $response->isValid(),
            "ReferenceId" => $response->getReferenceId()
        ], $this->ipg->getErrorCode());

        if (!$response->isValid()) {
            // store the reference id
            $this->dbMan->updateTransaction($payId, $response->getReferenceId());

            return FALSE;
        }

        return $this->verify($payId, $this->referenceId);
    }

    /**
     * @param int   $payId       Payment ID
     *
     * @param mixed $referenceId Reference ID
     *
     * @return bool
     */
    public function verify($payId, $referenceId) {
        $logId = $this->dbMan->logMethodCall($payId, get_class($this->ipg) . "\\verify",
                                             [
                                                 "payId"       => $payId,
                                                 "referenceId" => $referenceId
                                             ]);

        $verificationResponse = $this->ipg->verify($payId, $referenceId);

        $this->dbMan->logMethodResponse($logId, [
            "isSuccessful"  => $verificationResponse->isSuccessful(),
            "Status"        => $verificationResponse->getStatus(),
            "InvoiceNumber" => $verificationResponse->getInvoiceNumber()
        ], $this->ipg->getErrorCode());

        $status = $verificationResponse->isSuccessful();
        if ($status) {
            $this->dbMan->updateTransaction($payId, $referenceId, AbstractIPGDatabaseManager::VERIFIED);
        }

        return $status;
    }

    /**
     * @param int   $payId       Payment ID
     *
     * @param mixed $referenceId Reference ID
     *
     * @return bool
     */
    public function inquiry($payId, $referenceId) {
        $logId = $this->dbMan->logMethodCall($payId, get_class($this->ipg) . "\\inquiry",
                                             [
                                                 "payId"       => $payId,
                                                 "referenceId" => $referenceId
                                             ]);

        $res = $this->ipg->inquiry($payId, $referenceId);

        $this->dbMan->logMethodResponse($logId, [
            "isSuccessful" => $res
        ], $this->ipg->getErrorCode());
//        if ($res) {
//            $this->dbMan->updateTransaction($payId, $referenceId, AbstractIPGDatabaseManager::VERIFIED);
//        }

        return $res;
    }

    /**
     * @param int   $payId       Payment ID
     *
     * @param mixed $referenceId Reference ID
     *
     * @return bool
     */
    public function settle($payId, $referenceId) {
        $logId = $this->dbMan->logMethodCall($payId, get_class($this->ipg) . "\\settle",
                                             [
                                                 "payId"       => $payId,
                                                 "referenceId" => $referenceId
                                             ]);

        $res = $this->ipg->settle($payId, $referenceId);

        $this->dbMan->logMethodResponse($logId, [
            "isSuccessful" => $res
        ], $this->ipg->getErrorCode());
        if ($res) {
            $this->dbMan->updateTransaction($payId, $referenceId, AbstractIPGDatabaseManager::SETTLED);
        }

        return $res;
    }

    /**
     * @param int   $payId       Payment ID
     *
     * @param mixed $referenceId Reference ID
     *
     * @return bool
     */
    public function reversal($payId, $referenceId) {
        $logId = $this->dbMan->logMethodCall($payId, get_class($this->ipg) . "\\reversal",
                                             [
                                                 "payId"       => $payId,
                                                 "referenceId" => $referenceId
                                             ]);

        $res = $this->ipg->reversal($payId, $referenceId);

        $this->dbMan->logMethodResponse($logId, [
            "isSuccessful" => $res
        ], $this->ipg->getErrorCode());
        if ($res) {
            $this->dbMan->updateTransaction($payId, $referenceId, AbstractIPGDatabaseManager::REVERSED);
        }

        return $res;
    }

    /**
     * @return int
     */
    public function getErrorCode() {
        return $this->ipg->getErrorCode();
    }

    /**
     * @return string
     */
    public function getErrorMessage() {
        return $this->ipg->getErrorMessage();
    }

    /**
     * @param boolean $enabled if logging method calls to database should be enabled (enabled by default)
     *
     *
     */
    public function setLoggingEnabled($enabled) {
        $this->dbMan->setLoggingEnabled($enabled);
    }
}