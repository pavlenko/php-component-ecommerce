<?php

namespace PE\Component\ECommerce\Payment\Model;

interface PaymentAwareInterface
{
    /**
     * @return PaymentInterface
     */
    public function getPayment();

    /**
     * @param PaymentInterface $payment
     *
     * @return self
     */
    public function setPayment(PaymentInterface $payment);
}