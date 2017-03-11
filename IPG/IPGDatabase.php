<?php

/*
*                        _oo0oo_
*                       o8888888o
*                       88" . "88
*                       (| -_- |)
*                       0\  =  /0
*                     ___/'---'\___
*                   .' \\|     |// '.
*                  / \\|||  :  |||// \
*                 / _||||| -:- |||||- \
*                |   | \\\  -  /// |   |
*                | \_|  ''\---/''  |_/ |
*                \  .-\__  '-'  ___/-. /
*              ___'. .'  /--.--\  '. .'___
*           ."" '<  '.___\_<|>_/___.' >' "".
*          | | :  '- \'.;'\ _ /';.'/ - ' : | |
*          \  \ '_.   \_ __\ /__ _/   .-' /  /
*      ====='-.____'.___ \_____/___.-'___.-'=====
*                        '=---='
* 
* 
*      ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
* 
*                Buddha Bless This Code
*                    To be Bug Free
* 
*  Created by nevercom at 7/19/16 6:46 PM
*/
namespace IPG;

use IPG\Contract\AbstractIPGDatabaseManager;
use MysqliDb;

class IPGDatabase extends AbstractIPGDatabaseManager {
    private $PAY_ID    = 'pay_id';
    private $TR_ID     = 'transaction_id';
    private $BANK_NAME = 'bank_name';
    private $BANK_ID   = 'bank_id';
    private $AMOUNT    = 'amount';
    private $REF_ID    = 'reference_id';
    private $AUTHORITY = 'authority';
    private $STATUS    = 'status';
    private $CR_AT     = 'created_at';
    private $UP_AT     = 'updated_at';

    private $TABLE_TRANSACTIONS = 'bank_transactions';
    private $TABLE_LOGS         = 'bank_logs';

    /** @var MysqliDb */
    private $db;

    private $logging = TRUE;

    /**
     * This class handles all the database interaction supporting the Payment process
     *
     * @param string $username MySQL username
     * @param string $password MySQL password
     * @param string $db       Database name
     * @param string $host     MySQL database host address
     * @param string    $port     MySQL database port
     * @param string $charset  Character Set for the database connection
     *
     * @throws \Exception if any error occur in connecting to database, an exception is thrown explaining the issue.
     */
    public function __construct($username, $password, $db, $host = 'localhost', $port = '3306',
                                $charset = 'utf8') {

        $this->db = new MysqliDb($host, $username, $password, $db, $port, $charset);

    }

    /**
     * @param int    $transactionId
     * @param string $bankName
     * @param int    $amount
     *
     * @return int PayID
     */
    public function saveTransaction($transactionId, $bankName, $amount) {
        $this->db->insert($this->TABLE_TRANSACTIONS,
                          [
                              $this->TR_ID     => $transactionId,
                              $this->BANK_NAME => $bankName,
                              $this->AMOUNT    => $amount,
                              $this->STATUS    => 0,
                              $this->CR_AT     => $this->db->now()
                          ]
        );

        return $this->db->getInsertId();
    }

    public function updateTransaction($payId, $refId = NULL, $status = NULL) {
        $this->db->where($this->PAY_ID, $payId);
        $data = Array();
        if (!empty($refId)) {
            $data[$this->REF_ID] = $refId;
        }
        if (!empty($status)) {
            $data[$this->STATUS] = $status;
        }
        if (empty($data)) {
            return FALSE;
        }

        return $this->db->update($this->TABLE_TRANSACTIONS, $data);
    }

    public function getPaymentGateway($payId) {
        $this->db->where($this->PAY_ID, $payId);
        $row = $this->db->getOne($this->TABLE_TRANSACTIONS, $this->BANK_NAME);

        return $row[$this->BANK_NAME];
    }

    public function logMethodCall($paymentId, $methodName, $input) {
        if (!$this->logging) {
            return FALSE;
        }
        $this->db->insert($this->TABLE_LOGS,
                          [
                              $this->PAY_ID => $paymentId,
                              "method"      => $methodName,
                              "input"       => is_array($input) ? json_encode($input, JSON_UNESCAPED_UNICODE) : $input
                          ]
        );

        return $this->db->getInsertId();
    }

    public function logMethodResponse($id, $output, $statusCode = 0) {
        if (!$this->logging) {
            return FALSE;
        }
        $this->db->where('id', $id);

        return $this->db->update($this->TABLE_LOGS, [
            "output"      => is_array($output) ? json_encode($output, JSON_UNESCAPED_UNICODE) : $output,
            "status_code" => $statusCode
        ]);
    }

    /**
     * @param boolean $enabled if logging method calls to database should be enabled (enabled by default)
     */
    public function setLoggingEnabled($enabled) {
        $this->logging = $enabled;
    }

    /**
     * @param int $payId Payment ID
     *
     * @return int Transaction Status, Could be:
     *             <ul>
     *             <li>if less than 1: transaction not completed yet</li>
     *             <li>AbstractIPGDatabaseManager::VERIFIED</li>
     *             <li>AbstractIPGDatabaseManager::SETTLED</li>
     *             <li>AbstractIPGDatabaseManager::REVERSED</li>
     *             </ul>
     */
    public function getTransactionStatus($payId) {
        $this->db->where($this->PAY_ID, $payId);
        $row = $this->db->getOne($this->TABLE_TRANSACTIONS, $this->STATUS);

        return $row[$this->STATUS];
    }

    public function getTransactionId($payId) {
        $this->db->where($this->PAY_ID, $payId);
        $row = $this->db->getOne($this->TABLE_TRANSACTIONS, $this->TR_ID);

        return $row[$this->TR_ID];
    }

    public function getTransactionAmount($payId) {
        $this->db->where($this->PAY_ID, $payId);
        $row = $this->db->getOne($this->TABLE_TRANSACTIONS, $this->AMOUNT);

        return $row[$this->AMOUNT];
    }
}