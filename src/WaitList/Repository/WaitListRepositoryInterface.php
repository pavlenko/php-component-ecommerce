<?php

namespace PE\Component\ECommerce\WaitList\Repository;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

interface WaitListRepositoryInterface
{
    /**
     * @param CustomerInterface $customer
     *
     * @return null|WaitListInterface
     */
    public function findWaitListByCustomer(CustomerInterface $customer);

    /**
     * @param CustomerInterface $customer
     *
     * @return WaitListInterface
     */
    public function createWaitList(CustomerInterface $customer);

    /**
     * @param WaitListInterface $element
     * @param bool              $flush
     */
    public function updateWaitList(WaitListInterface $element, $flush = true);

    /**
     * @param WaitListInterface $element
     * @param bool              $flush
     */
    public function removeWaitList(WaitListInterface $element, $flush = true);
}