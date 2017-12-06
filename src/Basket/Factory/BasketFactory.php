<?php

namespace PE\Component\ECommerce\Basket\Factory;

use PE\Component\ECommerce\Basket\Entity\Basket;
use PE\Component\ECommerce\Core\View\View;

class BasketFactory
{
    /**
     * @var BasketFactoryExtensions
     */
    private $extensions;

    /**
     * @param BasketFactoryExtensions $extensions
     */
    public function __construct(BasketFactoryExtensions $extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * @param Basket $basket
     * @param array  $options
     *
     * @return View
     */
    public function createView(Basket $basket, array $options = [])
    {
        $view = new View([]);

        foreach ($this->extensions->all() as $extension) {
            $extension->buildBasketView($view, $basket, $options);
        }

        return $view;
    }
}