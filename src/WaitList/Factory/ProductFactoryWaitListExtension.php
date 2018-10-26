<?php

namespace PE\Component\ECommerce\WaitList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Factory\ProductFactoryExtensionInterface;
use PE\Component\ECommerce\Product\Model\ProductInterface;

class ProductFactoryWaitListExtension implements ProductFactoryExtensionInterface
{
    /**
     * @inheritDoc
     */
    public function buildProductView(View $view, ProductInterface $product, array $options)
    {
        // TODO: Implement buildProductView() method.
    }
}