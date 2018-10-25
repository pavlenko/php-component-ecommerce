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
     * @var BasketInterface
     */
    private $basket;

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
    public function getBasket()
    {
        return $this->basket = $this->session->get(BasketInterface::class) ?: $this->basketRepository->createBasket();
    }

    /**
     * @inheritDoc
     */
    public function addElement($productID)
    {
        $this->getBasket();

        if ($product = $this->productRepository->findProductByID($productID)) {
            $element = $this->basketElementRepository->createElement();
            $element->setBasket($this->basket);
            $element->setProduct($product);
            $element->setQuantity(1);

            $this->basket->addElement($element);
        }
    }

    /**
     * @inheritDoc
     */
    public function updateElement($elementID, $quantity)
    {
        $this->getBasket();

        foreach ($this->basket->getElements() as $element) {
            if ($element->getID() == $elementID) {
                if ($quantity < 1) {
                    $this->basket->removeElement($element);
                } else {
                    $element->setQuantity($quantity);
                }
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function removeElement($elementID)
    {
        $this->getBasket();

        foreach ($this->basket->getElements() as $element) {
            if ($element->getID() == $elementID) {
                $this->basket->removeElement($element);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function clearElements()
    {
        $this->getBasket();

        foreach ($this->basket->getElements() as $element) {
            $this->basket->removeElement($element);
        }
    }

    /**
     * @inheritDoc
     */
    public function saveBasket()
    {
        $this->session->set(BasketInterface::class, $this->basket);
    }
}