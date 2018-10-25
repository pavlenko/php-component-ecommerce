<?php

namespace PE\Component\ECommerce\WishList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\WishList\Manager\WishListManagerInterface;
use PE\Component\ECommerce\WishList\Model\WishListInterface;

interface WishListFactoryInterface
{
    /**
     * @return null|WishListManagerInterface
     */
    public function createManager();

    /**
     * @param WishListInterface $list
     *
     * @return View
     */
    public function createView(WishListInterface $list);
}