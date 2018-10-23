<?php

namespace PE\Component\ECommerce\Basket\Factory;

use PE\Component\ECommerce\Basket\Model\BasketInterface;

//TODO SessionBasketFactory, PersistentBasketFactory
//TODO Customer already exists: if logged in - get from db by user, else - create new model
interface BasketFactoryInterface
{
    /**
     * @return BasketInterface
     */
    public function loadBasket();

    /**
     * @param BasketInterface $basket
     */
    public function saveBasket(BasketInterface $basket);
}