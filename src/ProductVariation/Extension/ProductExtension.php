<?php

namespace PE\Component\ECommerce\ProductVariation\Extension;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Entity\Product;
use PE\Component\ECommerce\Product\Extension\ProductExtensionInterface;
use PE\Component\ECommerce\Product\Repository\FeatureRepositoryInterface;

class ProductExtension implements ProductExtensionInterface
{
    /**
     * @var FeatureRepositoryInterface
     */
    private $featureRepository;

    public function buildProductListQuery()
    {
        // TODO: Implement buildProductListQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function buildProductListView(View $view, Product $product)
    {
        $this->buildProductVariationsView($view, $product);
    }

    /**
     * @inheritDoc
     */
    public function buildProductItemView(View $view, Product $product)
    {
        $this->buildProductVariationsView($view, $product);
    }

    /**
     * @param View    $view
     * @param Product $product
     */
    private function buildProductVariationsView(View $view, Product $product)
    {
        if ($product->getType() !== 'variation') {
            return;
        }

        $feature = $this->featureRepository->get($product->getMetadataItem('variation'));
        $options = [];
        $items   = [];

        foreach ($product->getChildren() as $child) {
            $items[$child->getId()] = [
                'id'    => $child->getId(),
                'title' => $child->getTitle(),
                'sku'   => $child->getSKU(),
                'price' => $child->getPrice(),
            ];

            foreach ($child->getFeatures() as $productFeature) {
                if ($productFeature->getFeature()->getId() === $feature->getId() && $option = $productFeature->getOption()) {
                    $options[$option->getId()] = [
                        'id'    => $option->getId(),
                        'value' => $option->getValue(),
                    ];

                    $items[$child->getId()]['option'] = $option->getId();
                }
            }
        }

        $view->vars['variation'] = [
            'feature' => [
                'id'      => $feature->getId(),
                'title'   => $feature->getTitle(),
                'options' => $options,
            ],
            'items' => $items,
        ];
    }
}