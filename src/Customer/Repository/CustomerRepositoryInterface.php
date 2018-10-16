<?php

namespace PE\Component\ECommerce\Customer\Repository;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Customer\Model\CustomerInterface;
use PE\Component\Query\Query;

/**
 * @method CustomerInterface   findOneByID($identifier)
 * @method CustomerInterface[] findAllByID(array $identifiers)
 * @method CustomerInterface   findOneBy(Query $query)
 * @method CustomerInterface[] findAllBy(Query $query)
 * @method CustomerInterface   get($identifier)
 * @method CustomerInterface   create()
 */
interface CustomerRepositoryInterface extends RepositoryInterface
{}