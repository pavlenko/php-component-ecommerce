<?php

namespace PE\Component\ECommerce\Basket\Controller;

use PE\Component\ECommerce\Basket\Factory\BasketFactoryInterface;
use PE\Component\ECommerce\Basket\Loader\BasketLoaderInterface;
use PE\Component\ECommerce\Core\View\View;

class ExampleController
{
    /**
     * @var BasketLoaderInterface
     */
    private $loader;

    /**
     * @var BasketFactoryInterface
     */
    private $factory;

    /**
     * @return View
     */
    public function actionView()
    {
        return $this->factory->createView($this->loader->loadBasket());
    }

    /**
     * @param string $productID
     *
     * @return View
     */
    public function actionAdd($productID)
    {
        $basket  = $this->loader->loadBasket();
        $manager = $this->factory->createManager();

        $manager->addElement($basket, $productID);
        $manager->saveBasket($basket);

        return $this->factory->createView($basket);
    }

    /**
     * @param string $elementID
     * @param int    $quantity
     *
     * @return View
     */
    public function actionUpdate($elementID, $quantity)
    {
        $basket  = $this->loader->loadBasket();
        $manager = $this->factory->createManager();

        $manager->updateElement($basket, $elementID, $quantity);
        $manager->saveBasket($basket);

        return $this->factory->createView($basket);
    }

    /**
     * @param string $elementID
     *
     * @return View
     */
    public function actionRemove($elementID)
    {
        $basket  = $this->loader->loadBasket();
        $manager = $this->factory->createManager();

        $manager->removeElement($basket, $elementID);
        $manager->saveBasket($basket);

        return $this->factory->createView($basket);
    }

    /**
     * @return View
     */
    public function actionClear()
    {
        $basket  = $this->loader->loadBasket();
        $manager = $this->factory->createManager();

        $manager->clearElements($basket);
        $manager->saveBasket($basket);

        return $this->factory->createView($basket);
    }
}