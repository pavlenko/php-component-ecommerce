<?php

namespace PE\Component\ECommerce\WaitList\Repository;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;
use PE\Component\ECommerce\Product\Entity\Product;
use PE\Component\ECommerce\WaitList\Model\WaitListElementInterface;

interface WaitListElementRepositoryInterface
{
    /**
     * @param CustomerInterface $customer
     * @param Product           $product
     *
     * @return null|WaitListElementInterface
     */
    public function findByCustomerAndProduct(CustomerInterface $customer, Product $product);

    /**
     * @return WaitListElementInterface
     */
    public function createWaitListElement();

    /**
     * @param WaitListElementInterface $element
     * @param bool                     $flush
     */
    public function updateWaitListElement(WaitListElementInterface $element, $flush = true);

    /**
     * @param WaitListElementInterface $element
     * @param bool                     $flush
     */
    public function removeWaitListElement(WaitListElementInterface $element, $flush = true);
}