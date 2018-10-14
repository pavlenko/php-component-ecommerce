<?php

namespace PE\Component\ECommerce\Basket;

use PE\Component\ECommerce\Basket\Loader\BasketLoader;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Core\Exception\ImplementationRequiredException;
use PE\Component\SimpleDI\Container;
use PE\Component\SimpleDI\Exception\ExceptionInterface;
use PE\Component\SimpleDI\ServiceProviderInterface;

class BasketPlugin implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     *
     * @throws ExceptionInterface
     */
    public function register(Container $c)
    {
        $c->set(BasketRepositoryInterface::class, $c->service(function () {
            throw new ImplementationRequiredException(BasketRepositoryInterface::class);
        }));

        $c->set(BasketLoader::class, $c->service(function () {
            throw new ImplementationRequiredException(BasketLoader::class);
        }));
    }
}