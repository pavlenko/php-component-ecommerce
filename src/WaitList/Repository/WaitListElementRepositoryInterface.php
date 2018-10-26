<?php

namespace PE\Component\ECommerce\WaitList\Repository;

use PE\Component\ECommerce\Product\Model\ProductInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListElementInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

interface WaitListElementRepositoryInterface
{
    /**
     * @param WaitListInterface $waitList
     * @param ProductInterface  $product
     *
     * @return null|WaitListElementInterface
     */
    public function findByWaitListAndProduct(WaitListInterface $waitList, ProductInterface $product);

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