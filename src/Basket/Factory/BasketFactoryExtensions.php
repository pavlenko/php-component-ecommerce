<?php

namespace PE\Component\ECommerce\Basket\Factory;

use PE\Component\ECommerce\Core\Collection;

/**
 * @method BasketFactoryExtensionInterface[] all()
 */
class BasketFactoryExtensions extends Collection
{
    /**
     * @inheritDoc
     */
    protected function validateKey($key)
    {
        if (!is_string($key)) {
            throw new \InvalidArgumentException('Key must be a string');
        }
    }

    /**
     * @inheritDoc
     */
    protected function validateElement($element)
    {
        if (!($element instanceof BasketFactoryExtensionInterface)) {
            throw new \InvalidArgumentException('Element must implements ' . BasketFactoryExtensionInterface::class);
        }
    }
}