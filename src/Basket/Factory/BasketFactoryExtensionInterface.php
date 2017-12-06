<?php

namespace PE\Component\ECommerce\Basket\Factory;

use PE\Component\ECommerce\Basket\Entity\Basket;
use PE\Component\ECommerce\Core\View\View;

interface BasketFactoryExtensionInterface
{
    /**
     * Builds a basket view
     *
     * @param View   $view
     * @param Basket $basket
     * @param array  $options
     */
    public function buildBasketView(View $view, Basket $basket, array $options);
}