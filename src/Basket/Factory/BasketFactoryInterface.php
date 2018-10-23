<?php

namespace PE\Component\ECommerce\Basket\Factory;

use PE\Component\ECommerce\Basket\Model\BasketInterface;
use PE\Component\ECommerce\Customer\Model\CustomerInterface;

//TODO SessionBasketFactory, PersistentBasketFactory
//TODO Customer already exists: if logged in - get from db by user, else - create new model
interface BasketFactoryInterface
{
    /**
     * @param CustomerInterface $customer
     *
     * @return BasketInterface
     */
    public function loadBasket(CustomerInterface $customer);

    /**
     * @param BasketInterface $basket
     */
    public function saveBasket(BasketInterface $basket);
}