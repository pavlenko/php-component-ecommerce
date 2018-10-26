<?php

namespace PE\Component\ECommerce\WaitList\Repository;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;
use PE\Component\ECommerce\Product\Model\ProductInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListElementInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

interface WaitListElementRepositoryInterface
{
    /**
     * @param CustomerInterface $customer
     * @param ProductInterface  $product
     *
     * @return int
     */
    public function countElementsByCustomerAndProduct(CustomerInterface $customer, ProductInterface $product);

    /**
     * @param WaitListInterface $waitList
     *
     * @return WaitListElementInterface[]
     */
    public function findElementsByWishList(WaitListInterface $waitList);

    /**
     * @return WaitListElementInterface
     */
    public function createElement();

    /**
     * @param WaitListElementInterface $element
     * @param bool                     $flush
     */
    public function updateElement(WaitListElementInterface $element, $flush = true);

    /**
     * @param WaitListElementInterface $element
     * @param bool                     $flush
     */
    public function removeElement(WaitListElementInterface $element, $flush = true);
}