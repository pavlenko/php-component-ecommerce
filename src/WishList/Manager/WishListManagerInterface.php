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
     * @param string $productID
     *
     * @return self
     */
    public function addElement($productID);

    /**
     * @param string $elementID
     *
     * @return self
     */
    public function removeElement($elementID);

    /**
     * @return self
     */
    public function clear();

    /**
     * @return self
     */
    public function save();
}