<?php

namespace PE\Component\ECommerce\Basket\Manager;

use PE\Component\ECommerce\Basket\Model\BasketElementInterface;
use PE\Component\ECommerce\Basket\Model\BasketInterface;
use PE\Component\ECommerce\Basket\Repository\BasketElementRepositoryInterface;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;

class BasketManagerPersistent implements BasketManagerInterface
{
    /**
     * @var BasketRepositoryInterface
     */
    private $basketRepository;

    /**
     * @var BasketElementRepositoryInterface
     */
    private $basketElementRepository;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var BasketElementInterface[]
     */
    private $toCreate = [];

    /**
     * @var BasketElementInterface[]
     */
    private $toRemove = [];

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

    /**
     * @inheritDoc
     */
    public function saveBasket(BasketInterface $basket)
    {
        foreach ($this->toRemove as $element) {
            $this->basketElementRepository->removeElement($element);
        }

        foreach ($this->toCreate as $element) {
            $this->basketElementRepository->updateElement($element);
        }

        $this->basketRepository->updateBasket($basket);

        $this->toCreate = $this->toRemove = [];
    }
}