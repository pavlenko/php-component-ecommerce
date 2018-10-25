<?php

namespace PE\Component\ECommerce\WishList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Factory\ProductFactoryInterface;
use PE\Component\ECommerce\WishList\Model\WishListElementInterface;
use PE\Component\ECommerce\WishList\Model\WishListInterface;

class WishListFactory implements WishListFactoryInterface
{
    /**
     * @var ProductFactoryInterface
     */
    private $productFactory;

    /**
     * @inheritDoc
     */
    public function createManager()
    {
        // TODO: Implement createManager() method.
    }

    /**
     * @inheritDoc
     */
    public function createWishListView(WishListInterface $list, array $options = [])
    {
        $view = new View(['elements' => []]);

        foreach ($list->getElements() as $element) {
            $view->vars['elements'][] = $this->createElementView($element, $options);
        }

        return $view;
    }

    /**
     * @inheritDoc
     */
    public function createElementView(WishListElementInterface $element, array $options = [])
    {
        return new View([
            'id'      => $element->getID(),
            'product' => $this->productFactory->createProductView($element->getProduct(), $options),
        ]);
    }
}