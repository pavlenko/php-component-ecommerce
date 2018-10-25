<?php

namespace PE\Component\ECommerce\Basket\Manager;

use PE\Component\ECommerce\Basket\Model\BasketInterface;
use PE\Component\ECommerce\Basket\Repository\BasketElementRepositoryInterface;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketManagerSession implements BasketManagerInterface
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
     * @var SessionInterface
     */
    private $session;

    /**
     * @param BasketRepositoryInterface        $basketRepository
     * @param BasketElementRepositoryInterface $basketElementRepository
     * @param ProductRepositoryInterface       $productRepository
     * @param SessionInterface                 $session
     */
    public function __construct(
        BasketRepositoryInterface $basketRepository,
        BasketElementRepositoryInterface $basketElementRepository,
        ProductRepositoryInterface $productRepository,
        SessionInterface $session
    ) {
        $this->basketRepository        = $basketRepository;
        $this->basketElementRepository = $basketElementRepository;
        $this->productRepository       = $productRepository;
        $this->session                 = $session;
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

            $basket->addElement($element);
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
                    $basket->removeElement($element);
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
                $basket->removeElement($element);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function clearElements(BasketInterface $basket)
    {
        foreach ($basket->getElements() as $element) {
            $basket->removeElement($element);
        }
    }

    /**
     * @inheritDoc
     */
    public function saveBasket(BasketInterface $basket)
    {
        $this->session->set(BasketInterface::class, $basket);
    }
}