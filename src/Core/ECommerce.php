<?php

namespace PE\Component\ECommerce\Core;

use PE\Component\ECommerce\Core\Exception\RuntimeException;
use PE\Component\SimpleDI\Container;
use PE\Component\SimpleDI\ServiceProviderInterface;

class ECommerce
{
    /**
     * @var bool
     */
    private $initialized = false;

    /**
     * @var Container
     */
    private $container;

    /**
     * @var ServiceProviderInterface[]
     */
    private $providers = [];

    /**
     * ECommerce constructor.
     */
    public function __construct()
    {
        $this->container = new Container();
    }

    /**
     * Register service provider for lazy execution
     *
     * @param ServiceProviderInterface $provider
     *
     * @return $this
     *
     * @throws RuntimeException
     */
    public function register(ServiceProviderInterface $provider)
    {
        if ($this->initialized) {
            throw new RuntimeException('You cannot register service providers after initialization');
        }

        $this->providers[get_class($provider)] = $provider;
        return $this;
    }

    /**
     * Get container item
     *
     * @param string $id
     *
     * @return mixed
     *
     * @throws ExceptionInterface
     */
    public function get($id)
    {
        $this->initialize();
        return $this->container->get($id);
    }

    /**
     * Check container item exists
     *
     * @param string $id
     *
     * @return bool
     */
    public function has($id)
    {
        $this->initialize();
        return $this->container->has($id);
    }

    /**
     * Initialize internal container
     */
    private function initialize()
    {
        if ($this->initialized) {
            return;
        }

        foreach ($this->providers as $provider) {
            $this->container->register($provider);
        }

        $this->initialized = true;
    }
}