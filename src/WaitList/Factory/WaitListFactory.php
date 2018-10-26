<?php

namespace PE\Component\ECommerce\WaitList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Factory\ProductFactoryInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListElementInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

class WaitListFactory implements WaitListFactoryInterface
{
    /**
     * @var ProductFactoryInterface
     */
    private $productFactory;

    /**
     * @param ProductFactoryInterface $productFactory
     */
    public function __construct(ProductFactoryInterface $productFactory)
    {
        $this->productFactory  = $productFactory;
    }

    /**
     * @inheritDoc
     */
    public function createWaitListView(WaitListInterface $waitList, array $options = [])
    {
        $view = new View(['elements' => []]);

        foreach ($waitList->getElements() as $element) {
            $view->vars['elements'][] = $this->createElementView($element, $options);
        }

        return $view;
    }

    /**
     * @inheritDoc
     */
    public function createElementView(WaitListElementInterface $element, array $options = [])
    {
        return new View([
            'id'      => $element->getID(),
            'product' => $this->productFactory->createProductView($element->getProduct(), $options),
        ]);
    }
}