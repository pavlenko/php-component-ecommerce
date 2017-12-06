<?php

namespace PE\Component\ECommerce\WaitList;

use PE\Component\ECommerce\Core\Exception\ImplementationRequiredException;
use PE\Component\ECommerce\Customer\Factory\CustomerFactory;
use PE\Component\ECommerce\Customer\Loader\CustomerLoader;
use PE\Component\ECommerce\Product\Factory\ProductFactory;
use PE\Component\ECommerce\Product\Factory\ProductFactoryExtensions;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use PE\Component\ECommerce\WaitList\Controller\WaitListController;
use PE\Component\ECommerce\WaitList\Factory\ProductFactoryExtension;
use PE\Component\ECommerce\WaitList\Factory\WaitListFactory;
use PE\Component\ECommerce\WaitList\Repository\WaitListRepositoryInterface;
use PE\Component\SimpleDI\Container;
use PE\Component\SimpleDI\ServiceProviderInterface;

class WaitListPlugin implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     *
     * @throws ExceptionInterface
     */
    public function register(Container $c)
    {
        $c->set(WaitListRepositoryInterface::class, $c->service(function () {
            throw new ImplementationRequiredException(WaitListRepositoryInterface::class);
        }));

        $c->set(WaitListFactory::class, $c->service(function (Container $c) {
            return new WaitListFactory(
                $c->get(CustomerFactory::class),
                $c->get(ProductFactory::class)
            );
        }));

        $c->set(WaitListController::class, $c->service(function (Container $c) {
            return new WaitListController(
                $c->get(WaitListFactory::class),
                $c->get(WaitListRepositoryInterface::class),
                $c->get(CustomerLoader::class),
                $c->get(ProductRepositoryInterface::class)
            );
        }));

        $c->set(ProductFactoryExtension::class, $c->service(function (Container $c) {
            return new ProductFactoryExtension(
                $c->get(WaitListRepositoryInterface::class),
                $c->get(CustomerLoader::class)
            );
        }));

        $c->extend(ProductFactoryExtensions::class, function (ProductFactoryExtensions $e, Container $c) {
            $e->add($c->get(ProductFactoryExtension::class));
            return $e;
        });
    }
}