<?php

namespace PE\Component\ECommerce\Basket\Loader;

use PE\Component\ECommerce\Basket\Entity\Basket;

/**
 * This class loads basket for current user
 */
abstract class BasketLoader
{
    /**
     * @return Basket
     */
    abstract public function load();
}