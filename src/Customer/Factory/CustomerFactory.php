<?php

namespace PE\Component\ECommerce\Customer\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Entity\Customer;

class CustomerFactory
{
    /**
     * @var CustomerFactoryExtensions
     */
    private $extensions;

    /**
     * @param CustomerFactoryExtensions $extensions
     */
    public function __construct(CustomerFactoryExtensions $extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * @param Customer $customer
     * @param array    $options
     *
     * @return View
     */
    public function createView(Customer $customer, array $options = [])
    {
        //TODO fill data
        $view = new View([]);

        foreach ($this->extensions->all() as $extension) {
            $extension->buildCustomerView($view, $customer, $options);
        }

        return $view;
    }
}