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


class ValidationResponse {
    /** @var  boolean */
    private $valid;
    /** @var  mixed */
    private $referenceId;

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


}