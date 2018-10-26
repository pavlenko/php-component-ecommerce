<?php

namespace PE\Component\ECommerce\Checkout\Event;

use PE\Component\ECommerce\Checkout\Model\CheckoutInterface;
use Symfony\Component\EventDispatcher\Event;

class CheckoutEvent extends Event
{
    /**
     * @var CheckoutInterface
     */
    private $checkout;

    /**
     * @var bool
     */
    private $valid = false;

    /**
     * @param CheckoutInterface $checkout
     */
    public function __construct(CheckoutInterface $checkout)
    {
        $this->checkout = $checkout;
    }

    /**
     * @return CheckoutInterface
     */
    public function getCheckout()
    {
        return $this->checkout;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }
}