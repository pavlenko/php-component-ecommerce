<?php

namespace PE\Component\ECommerce\Customer\Loader;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;

interface CustomerLoaderInterface
{
    /**
     * @return null|CustomerInterface
     */
    public function loadCustomer();
}