<?php

namespace PE\Component\ECommerce\Customer\Model;

trait CustomerAwareTrait
{
    protected $customer;

    /**
     * @return CustomerInterface
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param CustomerInterface $customer
     *
     * @return self
     */
    public function setCustomer(CustomerInterface $customer)
    {
        $this->customer = $customer;
        return $this;
    }
}