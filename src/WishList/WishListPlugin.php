<?php

namespace PE\Component\ECommerce\WishList;

use PE\Component\ECommerce\Core\Exception\ImplementationRequiredException;
use PE\Component\ECommerce\Customer\Factory\CustomerFactory;
use PE\Component\ECommerce\Customer\Loader\CustomerLoader;
use PE\Component\ECommerce\Product\Factory\ProductFactory;
use PE\Component\ECommerce\Product\Factory\ProductFactoryExtensions;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use PE\Component\ECommerce\WishList\Controller\WishListController;
use PE\Component\ECommerce\WishList\Factory\ProductFactoryExtension;
use PE\Component\ECommerce\WishList\Factory\WishListFactory;
use PE\Component\ECommerce\WishList\Repository\WishListRepositoryInterface;
use PE\Component\SimpleDI\Container;
use PE\Component\SimpleDI\ServiceProviderInterface;

class WishListPlugin implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     *
     * @throws ExceptionInterface
     */
    public function register(Container $c)
    {
        $c->set(WishListRepositoryInterface::class, $c->service(function () {
            throw new ImplementationRequiredException(WishListRepositoryInterface::class);
        }));

        $c->set(WishListFactory::class, $c->service(function (Container $c) {
            return new WishListFactory(
                $c->get(CustomerFactory::class),
                $c->get(ProductFactory::class)
            );
        }));

        $c->set(WishListController::class, $c->service(function (Container $c) {
            return new WishListController(
                $c->get(WishListFactory::class),
                $c->get(WishListRepositoryInterface::class),
                $c->get(ProductRepositoryInterface::class),
                $c->get(CustomerLoader::class)
            );
        }));

        $c->set(ProductFactoryExtension::class, $c->service(function (Container $c) {
            return new ProductFactoryExtension(
                $c->get(WishListRepositoryInterface::class),
                $c->get(CustomerLoader::class)
            );
        }));

        $c->extend(ProductFactoryExtensions::class, function (ProductFactoryExtensions $e, Container $c) {
            return $e->add($c->get(ProductFactoryExtension::class));
        });
    }
}