<?php

namespace PE\Component\ECommerce\Payment;

trait PaymentAwareTrait
{
    /**
     * @var Payment
     */
    private $payment;

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
    }
}