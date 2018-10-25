<?php

namespace PE\Component\ECommerce\WishList\Manager;

use PE\Component\ECommerce\WishList\Model\WishListInterface;

interface WishListManagerInterface
{
    /**
     * @param WishListInterface $wishList
     * @param string            $productID
     *
     * @return self
     */
    public function addElement(WishListInterface $wishList, $productID);

    /**
     * @param WishListInterface $wishList
     * @param string            $elementID
     *
     * @return self
     */
    public function removeElement(WishListInterface $wishList, $elementID);

    /**
     * @return self
     */
    public function saveWishList(WishListInterface $wishList);
}