<?php

namespace PE\Component\ECommerce\Basket\Manager;

use PE\Component\ECommerce\Basket\Model\BasketElementInterface;
use PE\Component\ECommerce\Basket\Model\BasketInterface;
use PE\Component\ECommerce\Basket\Repository\BasketElementRepositoryInterface;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;

abstract class BasketManagerBase implements BasketManagerInterface
{
    /**
     * @var BasketRepositoryInterface
     */
    protected $basketRepository;

    /**
     * @var BasketElementRepositoryInterface
     */
    protected $basketElementRepository;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var BasketElementInterface[]
     */
    protected $toCreate = [];

    /**
     * @var BasketElementInterface[]
     */
    protected $toUpdate = [];

    /**
     * @var BasketElementInterface[]
     */
    protected $toRemove = [];

    /**
     * @param BasketRepositoryInterface        $basketRepository
     * @param BasketElementRepositoryInterface $basketElementRepository
     * @param ProductRepositoryInterface       $productRepository
     */
    public function __construct(
        BasketRepositoryInterface $basketRepository,
        BasketElementRepositoryInterface $basketElementRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->basketRepository        = $basketRepository;
        $this->basketElementRepository = $basketElementRepository;
        $this->productRepository       = $productRepository;
    }

    /**
     * @inheritDoc
     */
    public function addElement(BasketInterface $basket, $productID)
    {
        if ($product = $this->productRepository->findProductByID($productID)) {
            $element = $this->basketElementRepository->createElement();
            $element->setBasket($basket);
            $element->setProduct($product);
            $element->setQuantity(1);

            $basket->addElement($this->toCreate[] = $element);
        }
    }

    /**
     * @inheritDoc
     */
    public function updateElement(BasketInterface $basket, $elementID, $quantity)
    {
        foreach ($basket->getElements() as $element) {
            if ($element->getID() == $elementID) {
                if ($quantity < 1) {
                    $this->removeElement($basket, $element);
                } else {
                    $element->setQuantity($quantity);
                }
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function removeElement(BasketInterface $basket, $elementID)
    {
        foreach ($basket->getElements() as $element) {
            if ($element->getID() == $elementID) {
                $basket->removeElement($this->toRemove[] = $element);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function clearElements(BasketInterface $basket)
    {
        foreach ($basket->getElements() as $element) {
            $basket->removeElement($this->toRemove[] = $element);
        }
    }
}