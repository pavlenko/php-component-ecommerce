<?php

namespace PE\Component\ECommerce\Basket\Factory;

use PE\Component\ECommerce\Basket\Model\BasketElementInterface;
use PE\Component\ECommerce\Basket\Model\BasketInterface;
use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Factory\ProductFactory;

class BasketFactory implements BasketFactoryInterface
{
    /**
     * @TODO replace with interface
     * @var ProductFactory
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
    public function createBasketView(BasketInterface $basket, array $options = [])
    {
        $view = new View([
            'elements' => [],
        ]);

        foreach ($basket->getElements() as $element) {
            $view->vars['elements'][] = $this->createElementView($element, $options);
        }

        return $view;
    }

    /**
     * @inheritDoc
     */
    public function createElementView(BasketElementInterface $element, array $options = [])
    {
        return new View([
            'id'       => $element->getID(),
            'product'  => $this->productFactory->createView($element->getProduct()),
            'quantity' => $element->getQuantity(),
        ]);
    }
}