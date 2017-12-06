<?php

namespace PE\Component\ECommerce\WaitList\Repository;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Customer\Entity\Customer;
use PE\Component\ECommerce\WaitList\Entity\WaitList;
use PE\Component\Query\Query;

/**
 * @method WaitList   findOneByID($identifier)
 * @method WaitList[] findAllByID(array $identifiers)
 * @method WaitList   findOneBy(Query $query)
 * @method WaitList[] findAllBy(Query $query)
 * @method WaitList   get($identifier)
 * @method WaitList   create()
 */
interface WaitListRepositoryInterface extends RepositoryInterface
{
    /**
     * @param Customer $customer
     *
     * @return WaitList|null
     */
    public function findByCustomer(Customer $customer);
}