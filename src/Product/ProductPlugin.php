<?php

namespace PE\Component\ECommerce\Product;

use PE\Component\ECommerce\Core\Exception\ImplementationRequiredException;
use PE\Component\ECommerce\Product\Factory\ProductFactory;
use PE\Component\ECommerce\Product\Factory\ProductFactoryExtensions;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use PE\Component\SimpleDI\Container;
use PE\Component\SimpleDI\ServiceProviderInterface;

class ProductPlugin implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     *
     * @throws ExceptionInterface
     */
    public function register(Container $c)
    {
        $c->set(ProductRepositoryInterface::class, $c->service(function () {
            throw new ImplementationRequiredException(ProductRepositoryInterface::class);
        }));

        $c->set(ProductFactoryExtensions::class, $c->service(function () {
            return new ProductFactoryExtensions();
        }));

        $c->set(ProductFactory::class, $c->service(function (Container $c) {
            return new ProductFactory($c->get(ProductFactoryExtensions::class));
        }));
    }
}