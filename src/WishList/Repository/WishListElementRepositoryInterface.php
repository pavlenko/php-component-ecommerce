<?php

namespace PE\Component\ECommerce\WishList\Repository;

use PE\Component\ECommerce\WishList\Model\WishListElementInterface;
use PE\Component\ECommerce\WishList\Model\WishListInterface;

interface WishListElementRepositoryInterface
{
    /**
     * @param WishListInterface $list
     *
     * @return WishListElementInterface[]
     */
    public function findElementsByWishList(WishListInterface $list);

    /**
     * @param string $id
     *
     * @return null|WishListElementInterface
     */
    public function findElementByID($id);

    /**
     * @return WishListElementInterface
     */
    public function createElement();

    /**
     * @param WishListElementInterface $element
     * @param bool                     $flush
     */
    public function updateElement(WishListElementInterface $element, $flush = true);

    /**
     * @param WishListElementInterface $element
     * @param bool                     $flush
     */
    public function removeElement(WishListElementInterface $element, $flush = true);
}