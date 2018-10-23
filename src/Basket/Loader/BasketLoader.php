<?php

namespace PE\Component\ECommerce\Basket\Loader;

use PE\Component\ECommerce\Basket\Factory\BasketFactoryInterface;
use PE\Component\ECommerce\Basket\Model\BasketInterface;

/**
 * This class loads basket for current user
 */
class BasketLoader implements BasketLoaderInterface
{
    /**
     * @var BasketFactoryInterface
     */
    private $basketFactory;

    /**
     * @var BasketInterface
     */
    private $basket;

    /**
     * @param BasketFactoryInterface $basketFactory
     */
    public function __construct(BasketFactoryInterface $basketFactory)
    {
        $this->basketFactory = $basketFactory;
    }

    /**
     * @inheritDoc
     */
    public function loadBasket()
    {
        if (!$this->basket) {
            $this->basket = $this->basketFactory->loadBasket();
        }

        return $this->basket;
    }
}