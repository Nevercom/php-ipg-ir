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
*  Created by nevercom at 12/30/17 2:21 PM
*/

namespace IPG\Models;


class BaseModel {
    public function __toString() {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }

    public function toArray() {
        return $this->processArray(get_object_vars($this));
    }

    private function processArray($array) {
        foreach ($array as $key => $value) {
            if (is_object($value) && $value instanceof BaseModel) {
                $array[$key] = $value->toArray();
            }
            if (is_array($value)) {
                $array[$key] = $this->processArray($value);
            }
        }

        // If the property isn't an object or array, leave it untouched
        return $array;
    }

    public function toJSON() {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }
}