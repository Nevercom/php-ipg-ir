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
*  Created by nevercom at 7/20/16 6:48 PM
*/
namespace IPG\Contract;
abstract class AbstractIPGDatabaseManager {
    const VERIFIED = 1;
    const SETTLED  = 2;
    const REVERSED = 3;

    public abstract function __construct($username, $password, $db, $host = 'localhost', $port = '3306',
                                         $charset = 'utf8');

    public abstract function saveTransaction($transactionId, $bankName, $amount);

    public abstract function updateTransaction($payId, $refId = NULL, $status = NULL);

    public abstract function getPaymentGateway($payId);

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
    public abstract function getTransactionStatus($payId);

    /**
     * @param int $payId Payment ID
     *
     * @return int Transaction ID
     */
    public abstract function getTransactionId($payId);

    public abstract function logMethodCall($paymentId, $methodName, $input);

    public abstract function logMethodResponse($id, $output, $statusCode = 0);

    /**
     * @param boolean $enabled if logging method calls to database should be enabled
     *
     */
    public abstract function setLoggingEnabled($enabled);

}