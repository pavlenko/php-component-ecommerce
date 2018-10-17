<?php

namespace PE\Component\ECommerce\WaitList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

interface WaitListFactoryInterface
{
    /**
     * @param WaitListInterface $waitList
     *
     * @return View
     */
    public function createView(WaitListInterface $waitList);
}