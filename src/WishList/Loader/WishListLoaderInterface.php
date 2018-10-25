<?php

namespace PE\Component\ECommerce\WishList\Loader;

use PE\Component\ECommerce\WishList\Model\WishListInterface;

interface WishListLoaderInterface
{
    /**
     * @return WishListInterface
     */
    public function loadWishList();
}