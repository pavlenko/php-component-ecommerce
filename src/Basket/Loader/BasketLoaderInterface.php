<?php

namespace PE\Component\ECommerce\Basket\Loader;

use PE\Component\ECommerce\Basket\Model\BasketInterface;

interface BasketLoaderInterface
{
    /**
     * @return BasketInterface
     */
    public function loadBasket();
}