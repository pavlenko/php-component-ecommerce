<?php

namespace PE\Component\ECommerce\WaitList\Controller;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\WaitList\Factory\WaitListFactoryInterface;
use PE\Component\ECommerce\WaitList\Loader\WaitListLoaderInterface;

class ExampleController
{
    /**
     * @var WaitListLoaderInterface
     */
    private $loader;

    /**
     * @var WaitListFactoryInterface
     */
    private $factory;

    /**
     * @param WaitListLoaderInterface  $loader
     * @param WaitListFactoryInterface $factory
     */
    public function __construct(WaitListLoaderInterface $loader, WaitListFactoryInterface $factory)
    {
        $this->loader  = $loader;
        $this->factory = $factory;
    }

    /**
     * @return View
     */
    public function actionView()
    {
        return $this->factory->createWaitListView($this->loader->loadWaitList());
    }

    /**
     * @param string $productID
     *
     * @return View
     */
    public function actionAdd($productID)
    {
        $wishList = $this->loader->loadWaitList();
        $manager  = $this->factory->createManager();

        $manager->addElement($wishList, $productID);
        $manager->saveWaitList($wishList);

        return $this->factory->createWaitListView($wishList);
    }

    /**
     * @param string $elementID
     *
     * @return View
     */
    public function actionRemove($elementID)
    {
        $wishList = $this->loader->loadWaitList();
        $manager  = $this->factory->createManager();

        $manager->removeElement($wishList, $elementID);
        $manager->saveWaitList($wishList);

        return $this->factory->createWaitListView($wishList);
    }
}