<?php

namespace PE\Component\ECommerce\Payment\Repository;

use PE\Component\ECommerce\Payment\Model\PaymentMethodInterface;

interface PaymentMethodRepositoryInterface
{
    /**
     * @return PaymentMethodInterface
     */
    public function createMethod();

    /**
     * @param PaymentMethodInterface $method
     * @param bool                   $flush
     */
    public function updateMethod(PaymentMethodInterface $method, $flush = true);

    /**
     * @param PaymentMethodInterface $method
     * @param bool                   $flush
     */
    public function removeMethod(PaymentMethodInterface $method, $flush = true);
}