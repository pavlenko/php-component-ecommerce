<?php

namespace PE\Component\ECommerce\WishList\Model;

use PE\Component\ECommerce\Customer\Model\CustomerAwareInterface;

interface WishListInterface extends CustomerAwareInterface
{
    /**
     * @return string
     */
    public function getID();

    /**
     * @param string $id
     *
     * @return self
     */
    public function setID($id);

    /**
     * @return WishListElementInterface[]
     */
    public function getElements();

    /**
     * @param WishListElementInterface $element
     *
     * @return self
     */
    public function addElement(WishListElementInterface $element);

    /**
     * @param WishListElementInterface $element
     *
     * @return self
     */
    public function removeElement(WishListElementInterface $element);
}