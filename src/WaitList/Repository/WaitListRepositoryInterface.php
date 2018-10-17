<?php

namespace PE\Component\ECommerce\WaitList\Repository;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;
use PE\Component\ECommerce\WaitList\Entity\WaitList;
use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

interface WaitListRepositoryInterface
{
    /**
     * @param CustomerInterface $customer
     *
     * @return WaitList|null
     */
    public function findByCustomer(CustomerInterface $customer);

    /**
     * @return WaitListInterface
     */
    public function createWaitList();

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