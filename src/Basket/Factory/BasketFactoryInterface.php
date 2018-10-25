<?php

namespace PE\Component\ECommerce\Basket\Factory;

use PE\Component\ECommerce\Basket\Manager\BasketManagerInterface;
use PE\Component\ECommerce\Basket\Model\BasketElementInterface;
use PE\Component\ECommerce\Basket\Model\BasketInterface;
use PE\Component\ECommerce\Core\View\View;

interface BasketFactoryInterface
{
    /**
     * @return BasketManagerInterface
     */
    public function createManager();

    /**
     * @param BasketInterface $basket
     * @param array           $options
     *
     * @return View
     */
    public function createBasketView(BasketInterface $basket, array $options = []);

    /**
     * @param BasketElementInterface $element
     * @param array                  $options
     *
     * @return View
     */
    public function createElementView(BasketElementInterface $element, array $options = []);
}