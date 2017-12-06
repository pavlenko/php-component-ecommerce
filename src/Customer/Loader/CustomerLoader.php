<?php

namespace PE\Component\ECommerce\Customer\Loader;

use PE\Component\ECommerce\Customer\Entity\Customer;

/**
 * This class loads customer for current user
 */
abstract class CustomerLoader
{
    /**
     * @return Customer
     */
    abstract public function load();
}