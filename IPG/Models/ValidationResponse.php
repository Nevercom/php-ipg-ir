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
*  Created by nevercom at 8/6/16 10:44 AM
*/

namespace IPG\Models;


class ValidationResponse extends BaseModel {
    /** @var  boolean */
    protected $valid;
    /** @var  mixed */
    protected $referenceId;
    /** @var  int */
    protected $payId;
    /** @var  int */
    protected $transactionId;
    /** @var int */
    protected $amount;
    /** @var  string */
    protected $authority;

    /**
     * @return boolean
     */
    public function isValid() {
        return $this->valid;
    }

    /**
     * @param boolean $valid
     */
    public function setValid($valid) {
        $this->valid = $valid;
    }

    /**
     * @return mixed
     */
    public function getReferenceId() {
        return $this->referenceId;
    }

    /**
     * @param mixed $referenceId
     */
    public function setReferenceId($referenceId) {
        $this->referenceId = $referenceId;
    }

    /**
     * @return int
     */
    public function getPayId() {
        return $this->payId;
    }

    /**
     * @param int $payId
     */
    public function setPayId($payId) {
        $this->payId = $payId;
    }

    /**
     * @return int
     */
    public function getTransactionId() {
        return $this->transactionId;
    }

    /**
     * @param int $transactionId
     */
    public function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;
    }

    /**
     * @return int
     */
    public function getAmount() {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount) {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getAuthority() {
        return $this->authority;
    }

    /**
     * @param string $authority
     */
    public function setAuthority($authority) {
        $this->authority = $authority;
    }


}