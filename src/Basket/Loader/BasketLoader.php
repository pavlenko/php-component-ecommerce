<?php

namespace PE\Component\ECommerce\Basket\Loader;

use PE\Component\ECommerce\Basket\Model\BasketInterface;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketLoader implements BasketLoaderInterface
{
    /**
     * @var BasketRepositoryInterface
     */
    protected $basketRepository;

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @param BasketRepositoryInterface $basketRepository
     * @param SessionInterface          $session
     */
    public function __construct(BasketRepositoryInterface $basketRepository, SessionInterface $session)
    {
        $this->basketRepository = $basketRepository;
        $this->session          = $session;
    }

    /**
     * @inheritDoc
     */
    public function loadBasket()
    {
        $basket = $this->session->get(BasketInterface::class);

        if (!($basket instanceof BasketInterface)) {
            $this->session->set(BasketInterface::class, $basket = $this->basketRepository->createBasket());
        }

        return $basket;
    }
}