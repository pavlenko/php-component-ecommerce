<?php

namespace PE\Component\ECommerce\Customer\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Model\CustomerInterface;

interface CustomerFactoryExtensionInterface
{
    /**
     * Build customer view
     *
     * @param View     $view
     * @param CustomerInterface $customer
     * @param array    $options
     */
    public function buildCustomerView(View $view, CustomerInterface $customer, array $options);
}