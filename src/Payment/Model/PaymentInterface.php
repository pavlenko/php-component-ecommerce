<?php

namespace PE\Component\ECommerce\Payment\Model;

interface PaymentInterface
{
    /**
     * @return string
     */
    public function getID();

    /**
     * @param string $id
     *
     * @return self
     */
    public function setID($id);

    /**
     * @return PaymentMethodInterface
     */
    public function getMethod();

    /**
     * @param PaymentMethodInterface $method
     *
     * @return self
     */
    public function setMethod(PaymentMethodInterface $method);
}