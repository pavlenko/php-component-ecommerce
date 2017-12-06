<?php

namespace PE\Component\ECommerce\Customer\Factory;

use PE\Component\ECommerce\Core\Collection;

/**
 * @method CustomerFactoryExtensionInterface[] all()
 */
class CustomerFactoryExtensions extends Collection
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
        if (!($element instanceof CustomerFactoryExtensionInterface)) {
            throw new \InvalidArgumentException('Element must implements ' . CustomerFactoryExtensionInterface::class);
        }
    }
}