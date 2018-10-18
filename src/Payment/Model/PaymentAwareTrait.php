<?php

namespace PE\Component\ECommerce\Payment\Model;

trait PaymentAwareTrait
{
    /**
     * @var PaymentInterface
     */
    private $payment;

    /**
     * @return PaymentInterface
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param PaymentInterface $payment
     *
     * @return self
     */
    public function setPayment(PaymentInterface $payment)
    {
        $this->payment = $payment;
        return $this;
    }
}