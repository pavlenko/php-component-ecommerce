<?php

namespace PE\Component\ECommerce\Product\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Entity\Product;
use PE\Component\ECommerce\Product\Entity\ProductFeature;

class ProductFactory
{
    /**
     * @var ProductFactoryExtensions
     */
    private $extensions;

    /**
     * @param ProductFactoryExtensions $extensions
     */
    public function __construct(ProductFactoryExtensions $extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * @param Product $product
     * @param array   $options
     *
     * @return View
     */
    public function createView(Product $product, array $options = [])
    {
        $view = new View([
            'id'       => $product->getId(),
            'title'    => $product->getTitle(),
            'sku'      => $product->getSKU(),
            'price'    => $product->getPrice(),
        ]);

        $features = [];

        foreach ($product->getFeatures() as $productFeature) {
            $group = $productFeature->getFeature();

            if (!isset($features[$group->getId()])) {
                $features[$group->getId()] = [
                    'group'  => $group->getTitle(),
                    'values' => [],
                ];
            }

            $features[$group->getId()]['values'][] = $productFeature->getOption()
                ? $productFeature->getOption()->getValue()
                : $productFeature->getValue();
        }

        $view->vars['features'] = $features;

        foreach ($this->extensions->all() as $extension) {
            $extension->buildProductView($view, $product, $options);
        }

        return $view;
    }
}