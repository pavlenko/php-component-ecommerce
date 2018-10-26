<?php

namespace PE\Component\ECommerce\Checkout\Manager;

use PE\Component\ECommerce\Checkout\Model\CheckoutInterface;

interface CheckoutManagerInterface
{
    /**
     * @param CheckoutInterface $checkout
     */
    public function confirmCheckout(CheckoutInterface $checkout);
}