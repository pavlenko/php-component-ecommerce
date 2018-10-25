<?php

namespace PE\Component\ECommerce\WishList\Controller;

use PE\Component\ECommerce\WishList\Factory\WishListFactoryInterface;

class Controller2
{
    /**
     * @var WishListFactoryInterface
     */
    private $wishListFactory;

    public function actionIndex()
    {
        // extended version
        $wishList = $this->loader->load();
        if (!$wishList) {
            throw new \Exception('Unauthorized, no customer');
        }

        return $this->factory->createView();


        // Managed wishlist wrapper version
        if ($manager = $this->wishListFactory->createManager()) {
            return $this->wishListFactory->createView($manager->getWishList());
        }

        return false;//<-- Unauthorized, no customer
    }

    public function actionAdd($productID)
    {
        // extended version
        $wishList = $this->loader->load();
        if (!$wishList) {
            throw new \Exception('Unauthorized, no customer');
        }
        $this->manager->addElement($wishList, $productID);
        $this->manager->save($wishList);


        // Managed wishlist wrapper version
        if ($manager = $this->wishListFactory->createManager()) {
            $manager->addElement($productID);
            $manager->save();
        }
    }

    public function actionRemove($elementID)
    {
        // extended version
        $wishList = $this->loader->load();
        if (!$wishList) {
            throw new \Exception('Unauthorized, no customer');
        }
        $this->manager->removeElement($wishList, $elementID);
        $this->manager->save($wishList);



        // Managed wishlist wrapper version
        if ($manager = $this->wishListFactory->createManager()) {
            $manager->removeElement($elementID);
            $manager->save();
        }
    }

    public function actionClear()
    {
        // extended version
        $wishList = $this->loader->load();
        if (!$wishList) {
            throw new \Exception('Unauthorized, no customer');
        }
        $this->manager->clear($wishList);
        $this->manager->save($wishList);



        // Managed wishlist wrapper version
        if ($manager = $this->wishListFactory->createManager()) {
            $manager->clear();
            $manager->save();
        }
    }
}