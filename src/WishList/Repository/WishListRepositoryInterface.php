<?php

namespace PE\Component\ECommerce\WishList\Repository;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Customer\Model\CustomerInterface;
use PE\Component\ECommerce\WishList\Entity\WishList;
use PE\Component\Query\Query;

/**
 * @method WishList   findOneByID($identifier)
 * @method WishList[] findAllByID(array $identifiers)
 * @method WishList   findOneBy(Query $query)
 * @method WishList[] findAllBy(Query $query)
 * @method WishList   get($identifier)
 * @method WishList   create()
 */
interface WishListRepositoryInterface extends RepositoryInterface
{
    /**
     * @param CustomerInterface $customer
     *
     * @return WishList|null
     */
    public function findByCustomer(CustomerInterface $customer);
}