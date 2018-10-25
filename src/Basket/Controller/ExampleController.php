<?php

namespace PE\Component\ECommerce\Basket\Controller;

use PE\Component\ECommerce\Basket\Factory\BasketFactoryInterface;
use PE\Component\ECommerce\Core\View\View;

class ExampleController
{
    /**
     * @var BasketFactoryInterface
     */
    private $factory;

    /**
     * @return View
     */
    public function actionView()
    {
        return $this->factory->createView($this->factory->createManager()->getBasket());
    }

    /**
     * @param string $productID
     *
     * @return View
     */
    public function actionAdd($productID)
    {
        $manager = $this->factory->createManager();
        $manager->addElement($productID);
        $manager->saveBasket();

        return $this->factory->createView($manager->getBasket());
    }

    /**
     * @param string $elementID
     * @param int    $quantity
     *
     * @return View
     */
    public function actionUpdate($elementID, $quantity)
    {
        $manager = $this->factory->createManager();
        $manager->updateElement($elementID, $quantity);
        $manager->saveBasket();

        return $this->factory->createView($manager->getBasket());
    }

    /**
     * @param string $elementID
     *
     * @return View
     */
    public function actionRemove($elementID)
    {
        $manager = $this->factory->createManager();
        $manager->removeElement($elementID);
        $manager->saveBasket();

        return $this->factory->createView($manager->getBasket());
    }

    /**
     * @return View
     */
    public function actionClear()
    {
        $manager = $this->factory->createManager();
        $manager->clearElements();
        $manager->saveBasket();

        return $this->factory->createView($manager->getBasket());
    }
}