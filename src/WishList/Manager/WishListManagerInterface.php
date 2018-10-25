<?php

namespace PE\Component\ECommerce\WishList\Manager;

use PE\Component\ECommerce\WishList\Model\WishListInterface;

interface WishListManagerInterface
{
    /**
     * @return WishListInterface
     */
    public function getWishList();

    /**
     * @param string $productID Product id to create element by and add to list
     *
     * @return self
     */
    public function addElement($productID);

    /**
     * @param string $productID Product id to find element by and remove from list
     *
     * @return self
     */
    public function removeElement($productID);

    /**
     * @return self
     */
    public function clear();

    /**
     * @return self
     */
    public function save();
}