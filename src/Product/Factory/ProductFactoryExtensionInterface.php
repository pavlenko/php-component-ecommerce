<?php

namespace PE\Component\ECommerce\Product\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Entity\Product;

interface ProductFactoryExtensionInterface
{
    /**
     * Builds a product view
     *
     * @param View    $view
     * @param Product $product
     * @param array   $options
     */
    public function buildProductView(View $view, Product $product, array $options);
}