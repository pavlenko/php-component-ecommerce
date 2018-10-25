<?php

namespace PE\Component\ECommerce\Basket\Factory;

use PE\Component\ECommerce\Basket\Manager\BasketManagerInterface;
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
    public function createView(BasketInterface $basket, array $options = []);
}