<?php

namespace IPG\Models;

class PaymentResponse extends BaseModel {
    /** @var  $isSuccessful boolean */
    protected $isSuccessful;
    /** @var  $transactionId int */
    protected $transactionId;
    /** @var  $referenceId string */
    protected $referenceId;
    /** @var  $targetUrl string */
    protected $targetUrl;
    /** @var  $data array */
    protected $data;

    /**
     * @return boolean
     */
    public function isIsSuccessful() {
        return $this->isSuccessful;
    }

    /**
     * @param boolean $isSuccessful
     */
    public function setIsSuccessful($isSuccessful) {
        $this->isSuccessful = $isSuccessful;
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
     * @return string
     */
    public function getReferenceId() {
        return $this->referenceId;
    }

    /**
     * @param string $referenceId
     */
    public function setReferenceId($referenceId) {
        $this->referenceId = $referenceId;
    }

    /**
     * @return string
     */
    public function getTargetUrl() {
        return $this->targetUrl;
    }

    /**
     * @param string $targetUrl
     */
    public function setTargetUrl($targetUrl) {
        $this->targetUrl = $targetUrl;
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data) {
        $this->data = $data;
    }
}