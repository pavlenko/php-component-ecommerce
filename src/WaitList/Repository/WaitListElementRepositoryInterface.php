<?php

namespace PE\Component\ECommerce\WaitList\Repository;

use PE\Component\ECommerce\WaitList\Model\WaitListElementInterface;

interface WaitListElementRepositoryInterface
{
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