<?php

namespace PE\Component\ECommerce\Customer\Loader;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;

/**
 * This class loads customer for current user
 */
abstract class CustomerLoader
{
    /**
     * @return CustomerInterface
     */
    abstract public function load();
}