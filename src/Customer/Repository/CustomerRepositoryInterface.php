<?php

namespace PE\Component\ECommerce\Customer\Repository;

use PE\Component\ECommerce\Customer\Model\CustomerInterface;

interface CustomerRepositoryInterface
{
    /**
     * @param string $id
     *
     * @return null|CustomerInterface
     */
    public function findCustomerByID($id);

    /**
     * @return CustomerInterface
     */
    public function createCustomer();

    /**
     * @param CustomerInterface $customer
     * @param bool $flush
     */
    public function updateCustomer(CustomerInterface $customer, $flush = true);

    /**
     * @param CustomerInterface $customer
     * @param bool              $flush
     */
    public function removeCustomer(CustomerInterface $customer, $flush = true);
}