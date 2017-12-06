<?php

namespace PE\Component\ECommerce\Payment;

interface PaymentAwareInterface
{
    /**
     * @return Payment
     */
    public function getPayment();

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment);
}