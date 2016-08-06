<?php

namespace IPG\Contract;


use IPG\Models\PaymentResponse;
use IPG\Models\ValidationResponse;
use IPG\Models\VerificationResponse;

abstract class AbstractIPG {
    /**
     * @param int    $transactionId
     * @param int    $amount
     * @param string $callbackUrl
     *
     * @return PaymentResponse
     */
    abstract public function startPayment($transactionId, $amount, $callbackUrl);

    /**
     * @param array $request $_REQUEST is passed to this method for validation check
     *
     * @return ValidationResponse
     */
    abstract public function isPaymentValid($request);

    /**
     * @param int    $transactionId
     * @param string $referenceId
     *
     * @return VerificationResponse
     */
    abstract public function verify($transactionId, $referenceId);

    abstract public function inquiry($transactionId, $referenceId);

    abstract public function settle($transactionId, $referenceId);

    abstract public function reversal($transactionId, $referenceId);

    /**
     * @return int
     */
    abstract public function getErrorCode();

    /**
     * @return string
     */
    abstract public function getErrorMessage();

    /**
     * @return string
     */
    abstract public function getCanonicalName();
}