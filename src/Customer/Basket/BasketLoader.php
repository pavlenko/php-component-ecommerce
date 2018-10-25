<?php

namespace PE\Component\ECommerce\Customer\Basket;

use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Customer\Loader\CustomerLoaderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketLoader extends \PE\Component\ECommerce\Basket\Loader\BasketLoader
{
    /**
     * @var CustomerLoaderInterface
     */
    private $customerLoader;

    /**
     * @inheritDoc
     */
    public function __construct(
        BasketRepositoryInterface $basketRepository,
        SessionInterface $session,
        CustomerLoaderInterface $customerLoader
    ) {
        parent::__construct($basketRepository, $session);
        $this->customerLoader = $customerLoader;
    }

    /**
     * @inheritDoc
     */
    public function loadBasket()
    {
        $customer = $this->customerLoader->loadCustomer();
        $basket   = $this->basketRepository->findBasketBy(['customer' => $customer]);

        return $basket;
    }
}