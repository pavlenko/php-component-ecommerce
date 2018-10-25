<?php

namespace PE\Component\ECommerce\WishList\Controller;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\WishList\Factory\WishListFactoryInterface;
use PE\Component\ECommerce\WishList\Loader\WishListLoaderInterface;

class ExampleController
{
    /**
     * @var WishListLoaderInterface
     */
    private $loader;

    /**
     * @var WishListFactoryInterface
     */
    private $factory;

    /**
     * @param WishListLoaderInterface  $loader
     * @param WishListFactoryInterface $factory
     */
    public function __construct(WishListLoaderInterface $loader, WishListFactoryInterface $factory)
    {
        $this->loader  = $loader;
        $this->factory = $factory;
    }

    /**
     * @return View
     */
    public function actionView()
    {
        return $this->factory->createWishListView($this->loader->loadWishList());
    }

    /**
     * @param string $productID
     *
     * @return View
     */
    public function actionAdd($productID)
    {
        $wishList = $this->loader->loadWishList();
        $manager  = $this->factory->createManager();

        $manager->addElement($wishList, $productID);
        $manager->saveWishList($wishList);

        return $this->factory->createWishListView($wishList);
    }

    /**
     * @param string $elementID
     *
     * @return View
     */
    public function actionRemove($elementID)
    {
        $wishList = $this->loader->loadWishList();
        $manager  = $this->factory->createManager();

        $manager->removeElement($wishList, $elementID);
        $manager->saveWishList($wishList);

        return $this->factory->createWishListView($wishList);
    }
}