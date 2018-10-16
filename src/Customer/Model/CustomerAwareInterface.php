<?php

namespace PE\Component\ECommerce\Customer\Model;

interface CustomerAwareInterface
{
    /**
     * @return CustomerInterface
     */
    public function getCustomer();

    /**
     * @param CustomerInterface $customer
     *
     * @return self
     */
    public function setCustomer(CustomerInterface $customer);
}