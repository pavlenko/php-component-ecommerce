<?php

namespace PE\Component\ECommerce\Basket\Manager;

use PE\Component\ECommerce\Basket\Model\BasketInterface;
use PE\Component\ECommerce\Basket\Repository\BasketElementRepositoryInterface;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketManagerSession extends BasketManagerBase
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param BasketRepositoryInterface        $basketRepository
     * @param BasketElementRepositoryInterface $basketElementRepository
     * @param ProductRepositoryInterface       $productRepository
     * @param SessionInterface                 $session
     */
    public function __construct(
        BasketRepositoryInterface $basketRepository,
        BasketElementRepositoryInterface $basketElementRepository,
        ProductRepositoryInterface $productRepository,
        SessionInterface $session
    ) {
        parent::__construct($basketRepository, $basketElementRepository, $productRepository);

        $this->session = $session;
    }

    /**
     * @inheritDoc
     */
    public function saveBasket(BasketInterface $basket)
    {
        $this->session->set(BasketInterface::class, $basket);

        $this->toCreate = $this->toUpdate = $this->toRemove = [];

        return $this;
    }
}