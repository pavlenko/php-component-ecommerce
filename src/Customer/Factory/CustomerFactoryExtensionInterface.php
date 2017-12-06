<?php

namespace PE\Component\ECommerce\Customer\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Entity\Customer;

interface CustomerFactoryExtensionInterface
{
    /**
     * Build customer view
     *
     * @param View     $view
     * @param Customer $customer
     * @param array    $options
     */
    public function buildCustomerView(View $view, Customer $customer, array $options);
}