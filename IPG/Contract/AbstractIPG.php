<?php

namespace IPG\Contract;


use IPG\Models\PaymentResponse;
use IPG\Models\ValidationResponse;
use IPG\Models\VerificationResponse;

abstract class AbstractIPG {
     protected $amount;
    /**
     * AbstractIPG constructor.
     *
     * @param array $config
     */
    abstract function __construct($config = array());

    /**
     * @param int    $paymentId   Payment ID, this the id that is used to identify the transaction
     * @param int    $amount      Amount of payment (Rial)
     * @param string $callbackUrl Callback URL which the data should be sent to by IPG upon payment
     *
     * @return PaymentResponse
     */
    abstract public function startPayment($paymentId, $amount, $callbackUrl);

    /**
     * @param array $request $_REQUEST is passed to this method for validation check
     *
     * @return ValidationResponse
     */
    abstract public function isPaymentValid($request);

    /**
     * @param int    $paymentId
     * @param string $referenceId
     *
     * @return VerificationResponse
     */
    abstract public function verify($paymentId, $referenceId);

    abstract public function inquiry($paymentId, $referenceId);

    abstract public function settle($paymentId, $referenceId);

    abstract public function reversal($paymentId, $referenceId);


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