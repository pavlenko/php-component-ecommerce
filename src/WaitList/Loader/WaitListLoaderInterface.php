<?php

namespace PE\Component\ECommerce\WaitList\Loader;

use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

interface WaitListLoaderInterface
{
    /**
     * @return WaitListInterface
     */
    public function loadWaitList();
}