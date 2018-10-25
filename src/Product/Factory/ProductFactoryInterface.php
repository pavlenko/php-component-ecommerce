<?php

namespace PE\Component\ECommerce\Product\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Model\ProductInterface;

interface ProductFactoryInterface
{
    /**
     * @param ProductInterface $product
     * @param array            $options
     *
     * @return View
     */
    public function createProductView(ProductInterface $product, array $options = []);
}