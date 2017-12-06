<?php

namespace PE\Component\ECommerce\Product\Extension;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Entity\Product;

interface ProductExtensionInterface
{
    public function buildProductListQuery();

    /**
     * Build products list item view
     *
     * Add data for build combination selector instead of buy button
     *
     * @param View    $view
     * @param Product $product
     */
    public function buildProductListView(View $view, Product $product);

    /**
     * Build product page item view
     *
     * Add data for build combination selector instead of buy button
     *
     * @param View    $view
     * @param Product $product
     */
    public function buildProductItemView(View $view, Product $product);
}