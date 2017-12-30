<?php
namespace IPG\Models;
class VerificationResponse extends BaseModel {
    /** @var  boolean */
    protected $isSuccessful;
    /** @var  int */
    protected $status;
    /** @var  string */
    protected $invoiceNumber;

    /**
     * @return boolean
     */
    public function isSuccessful() {
        return $this->isSuccessful;
    }

    /**
     * @param boolean $isSuccessful
     */
    public function setSuccessful($isSuccessful) {
        $this->isSuccessful = $isSuccessful;
    }

    /**
     * @return int
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber() {
        return $this->invoiceNumber;
    }

    /**
     * @param string $invoiceNumber
     */
    public function setInvoiceNumber($invoiceNumber) {
        $this->invoiceNumber = $invoiceNumber;
    }

}