<?php

namespace PE\Component\ECommerce\Basket\Event;

use PE\Component\ECommerce\Basket\Entity\Basket;
use PE\Component\EventManager\Event;

class BasketEvent extends Event
{
    const BEFORE_CLEAR = 'cmf.ecommerce.basket.before_clear';
    const AFTER_CLEAR  = 'cmf.ecommerce.basket.after_clear';

    /**
     * @var Basket
     */
    private $basket;

    /**
     * @param string $name
     * @param Basket $basket
     */
    public function __construct($name, Basket $basket)
    {
        parent::__construct($name);

        $this->basket = $basket;
    }

    /**
     * @return Basket
     */
    public function getBasket()
    {
        return $this->basket;
    }
}