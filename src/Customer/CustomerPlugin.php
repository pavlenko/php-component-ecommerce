<?php

namespace PE\Component\ECommerce\Customer;

use PE\Component\ECommerce\Core\Exception\ImplementationRequiredException;
use PE\Component\ECommerce\Customer\Factory\CustomerFactory;
use PE\Component\ECommerce\Customer\Factory\CustomerFactoryExtensions;
use PE\Component\ECommerce\Customer\Loader\CustomerLoader;
use PE\Component\ECommerce\Customer\Repository\CustomerRepositoryInterface;
use PE\Component\SimpleDI\Container;
use PE\Component\SimpleDI\ServiceProviderInterface;

class CustomerPlugin implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     *
     * @throws ExceptionInterface
     */
    public function register(Container $c)
    {
        $c->set(CustomerRepositoryInterface::class, $c->service(function () {
            throw new ImplementationRequiredException(CustomerRepositoryInterface::class);
        }));

        $c->set(CustomerFactoryExtensions::class, $c->service(function () {
            return new CustomerFactoryExtensions();
        }));

        $c->set(CustomerFactory::class, $c->service(function (Container $c) {
            return new CustomerFactory($c->get(CustomerFactoryExtensions::class));
        }));

        $c->set(CustomerLoader::class, $c->service(function () {
            throw new ImplementationRequiredException(CustomerLoader::class);
        }));
    }
}