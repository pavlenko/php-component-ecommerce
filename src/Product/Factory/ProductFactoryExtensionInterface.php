<?php

namespace PE\Component\ECommerce\Product\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Model\ProductInterface;

interface ProductFactoryExtensionInterface
{
    /**
     * @param View             $view
     * @param ProductInterface $product
     * @param array            $options
     */
    public function buildProductView(View $view, ProductInterface $product, array $options);
}