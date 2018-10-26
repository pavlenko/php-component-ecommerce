<?php

namespace PE\Component\ECommerce\WishList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\WishList\Manager\WishListManagerInterface;
use PE\Component\ECommerce\WishList\Model\WishListElementInterface;
use PE\Component\ECommerce\WishList\Model\WishListInterface;

interface WishListFactoryInterface
{
    /**
     * @return WishListManagerInterface
     */
    public function createManager();

    /**
     * @param WishListInterface $wishList
     * @param array             $options
     *
     * @return View
     */
    public function createWishListView(WishListInterface $wishList, array $options = []);

    /**
     * @param WishListElementInterface $element
     * @param array                    $options
     *
     * @return View
     */
    public function createElementView(WishListElementInterface $element, array $options = []);
}