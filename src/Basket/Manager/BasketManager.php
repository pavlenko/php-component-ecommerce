<?php

namespace PE\Component\ECommerce\Basket\Manager;

use PE\Component\ECommerce\Basket\Loader\BasketLoaderInterface;
use PE\Component\ECommerce\Basket\Repository\BasketElementRepositoryInterface;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;

//TODO maybe remove loader & use session for repos or rename it to CurrentBasket
//TODO or create manager for concrete model
class BasketManager
{
    /**
     * @var BasketLoaderInterface
     */
    private $basketLoader;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var BasketRepositoryInterface
     */
    private $basketRepository;

    /**
     * @var BasketElementRepositoryInterface
     */
    private $basketElementRepository;

    public function add($productID, $quantity = 1)
    {
        $basket  = $this->basketLoader->loadBasket();
        $product = $this->productRepository->findProductByID($productID);

        if ($product) {
            $element = $this->basketElementRepository->createElement();
            $element->setBasket($basket);
            $element->setProduct($product);
            $element->setQuantity($quantity);

            $this->basketElementRepository->updateElement($element);
        }
    }

    public function edit($elementID, $quantity)
    {
        $element = $this->basketElementRepository->findElementByID($elementID);
        if ($element) {
            if ($quantity > 0) {
                $this->basketElementRepository->updateElement($element->setQuantity($quantity));
            } else {
                $this->basketElementRepository->removeElement($element);
            }
        }
    }

    public function remove($elementID)
    {
        $element = $this->basketElementRepository->findElementByID($elementID);
        if ($element) {
            $this->basketElementRepository->removeElement($element);
        }
    }

    public function clear()
    {
        $basket = $this->basketLoader->loadBasket();

        foreach ($basket->getElements() as $element) {
            $basket->removeElement($element);
            $this->basketElementRepository->removeElement($element);
        }

        $this->basketRepository->updateBasket($basket);
    }
}