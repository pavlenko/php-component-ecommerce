<?php

namespace PE\Component\ECommerce\Product\Factory;

use PE\Component\ECommerce\Core\Collection;

/**
 * @method ProductFactoryExtensionInterface[] all()
 */
class ProductFactoryExtensions extends Collection
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
        if (!($element instanceof ProductFactoryExtensionInterface)) {
            throw new \InvalidArgumentException('Element must implements ' . ProductFactoryExtensionInterface::class);
        }
    }
}