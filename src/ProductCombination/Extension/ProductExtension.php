<?php

namespace PE\Component\ECommerce\ProductCombination\Extension;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Extension\ProductExtensionInterface;
use PE\Component\ECommerce\Product\Entity\Feature;
use PE\Component\ECommerce\Product\Entity\Product;

class ProductExtension implements ProductExtensionInterface
{
    /**
     * @var RepositoryInterface
     */
    private $featureGroupRepository;

    /**
     * @inheritDoc
     */
    public function buildProductListQuery()
    {}

    /**
     * @inheritDoc
     */
    public function buildProductListView(View $view, Product $product)
    {
        if ($product->getType() !== 'combination') {
            return;
        }

        /* @var $featureGroups Feature[] */
        $featureGroups = $product->getMetadataItem('features_groups', []);

        $featureGroupsView = [];
        foreach ($featureGroups as $featureGroup) {
            $featureGroupID = $featureGroup->getId();

            $featureGroupsView[$featureGroupID] = [
                'id'     => $featureGroupID,
                'type'   => $featureGroup->getType(),
                'title'  => $featureGroup->getTitle(),
                'values' => [],
            ];

            foreach ($featureGroup->getOptions() as $feature) {
                $featureID = $feature->getId();

                $featureGroupsView[$featureGroup->getId()]['values'][$featureID] = [
                    'id'      => $featureID,
                    'value'   => $feature->getValue(),
                    'enabled' => false,
                ];
            }
        }

        //TODO get feature groups
        //TODO get only allowed features grouped by group

        $combinations = [];
        foreach ($product->getChildren() as $child) {
            $combinations[] = [
                'id'       => $child->getId(),
                'sku'      => $child->getSKU(),
                'price'    => $child->getPrice(),
                'features' => $child->getFeatures(),
            ];
        }

        //TODO replace buy button with combination select popup
        $view->vars = array_replace($view->vars, [
            'combination_feature_groups' => $featureGroupsView,
            'combination_items'          => $combinations,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function buildProductItemView(View $view, Product $product)
    {
        //TODO for build get parent and set current as selected
        $view->vars = array_replace($view->vars, [
            'combinations' => [],
        ]);
    }

    public function getCombinations(Product $product)
    {
        $groupsIDs = $product->getMetadataItem('combination', []);
        $groups    = $this->featureGroupRepository->findAllByID($groupsIDs);

        // Collect used features
        $features = [];
        foreach ($product->getChildren() as $child) {
            foreach ($child->getFeatures() as $productFeature) {
                if (($feature = $productFeature->getOption()) && in_array($productFeature->getFeature()->getId(), $groupsIDs)) {
                    $features[$feature->getId()] = true;
                }
            }
        }

        //TODO
    }
}