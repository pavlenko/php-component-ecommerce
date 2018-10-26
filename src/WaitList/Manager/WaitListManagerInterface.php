<?php

namespace PE\Component\ECommerce\WaitList\Manager;

use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

interface WaitListManagerInterface
{
    /**
     * @param WaitListInterface $waitList
     * @param string            $productID
     *
     * @return self
     */
    public function addElement(WaitListInterface $waitList, $productID);

    /**
     * @param WaitListInterface $waitList
     * @param string            $elementID
     *
     * @return self
     */
    public function removeElement(WaitListInterface $waitList, $elementID);

    /**
     * @param WaitListInterface $waitList
     *
     * @return self
     */
    public function saveWaitList(WaitListInterface $waitList);
}