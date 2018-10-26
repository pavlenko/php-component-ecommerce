<?php

namespace PE\Component\ECommerce\WishList\Repository;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;
use PE\Component\ECommerce\Product\Model\ProductInterface;
use PE\Component\ECommerce\WishList\Model\WishListElementInterface;
use PE\Component\ECommerce\WishList\Model\WishListInterface;

interface WishListElementRepositoryInterface
{
    /**
     * @param CustomerInterface $customer
     * @param ProductInterface  $product
     *
     * @return int
     */
    public function countElementsByCustomerAndProduct(CustomerInterface $customer, ProductInterface $product);

    /**
     * @param WishListInterface $wishList
     *
     * @return WishListElementInterface[]
     */
    public function findElementsByWishList(WishListInterface $wishList);

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