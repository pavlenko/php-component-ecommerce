<?php

namespace PE\Component\ECommerce\WishList\Repository;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;
use PE\Component\ECommerce\WishList\Model\WishListInterface;

interface WishListRepositoryInterface
{
    /**
     * @param CustomerInterface $customer
     *
     * @return null|WishListInterface
     */
    public function findWishListByCustomer(CustomerInterface $customer);

    /**
     * @param CustomerInterface $customer
     *
     * @return WishListInterface
     */
    public function createWishList(CustomerInterface $customer);

    /**
     * @param WishListInterface $wishList
     * @param bool              $flush
     */
    public function updateWishList(WishListInterface $wishList, $flush = true);

    /**
     * @param WishListInterface $wishList
     * @param bool              $flush
     */
    public function removeWishList(WishListInterface $wishList, $flush = true);
}