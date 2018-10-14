<?php

namespace PE\Component\ECommerce\Basket\Controller;

use PE\Component\ECommerce\Basket\Entity\BasketElement;
use PE\Component\ECommerce\Basket\Factory\BasketFactory;
use PE\Component\ECommerce\Basket\Loader\BasketLoaderInterface;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;

class BasketController
{
    /**
     * @var BasketLoaderInterface
     */
    private $basketLoader;

    /**
     * @var BasketFactory
     */
    private $basketFactory;

    /**
     * @var BasketRepositoryInterface
     */
    private $basketRepository;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @return View
     */
    public function getBasket()
    {
        return $this->basketFactory->createView($this->basketLoader->load());
    }

    /**
     * @param int $productID
     * @param int $quantity
     */
    public function add($productID, $quantity)
    {
        $basket  = $this->basketLoader->load();
        $product = $this->productRepository->get($productID);

        $element = (new BasketElement())
            ->setId(count($basket->getElements()))
            ->setProduct($product)
            ->setQuantity($quantity);

        //TODO extensions

        $this->basketRepository->save($basket->addElement($element));
    }

    public function edit($elementID, $quantity)
    {
        $basket = $this->basketLoader->load();

        foreach ($basket->getElements() as $element) {
            if ($element->getId() === $elementID) {
                $element->setQuantity($quantity);
                break;
            }
        }

        $this->basketRepository->save($basket);
    }

    /**
     * @param $elementID
     */
    public function remove($elementID)
    {
        $basket = $this->basketLoader->load();

        foreach ($basket->getElements() as $element) {
            if ($element->getId() === $elementID) {
                $basket->removeElement($element);
            }
        }

        //TODO extensions

        $this->basketRepository->save($basket);
    }

    public function clear()
    {
        $basket = $this->basketLoader->load();

        foreach ($basket->getElements() as $element) {
            $basket->removeElement($element);
        }

        //TODO extensions

        $this->basketRepository->save($basket);
    }
}