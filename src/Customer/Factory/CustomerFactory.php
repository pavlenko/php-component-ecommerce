<?php

namespace PE\Component\ECommerce\Customer\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Model\CustomerInterface;

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
     * @param CustomerInterface $customer
     * @param array    $options
     *
     * @return View
     */
    public function createView(CustomerInterface $customer, array $options = [])
    {
        //TODO fill data
        $view = new View([]);

        foreach ($this->extensions->all() as $extension) {
            $extension->buildCustomerView($view, $customer, $options);
        }

        return $view;
    }
}