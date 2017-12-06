<?php

namespace PE\Component\ECommerce\Customer\Repository;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Customer\Entity\Customer;
use PE\Component\Query\Query;

/**
 * @method Customer   findOneByID($identifier)
 * @method Customer[] findAllByID(array $identifiers)
 * @method Customer   findOneBy(Query $query)
 * @method Customer[] findAllBy(Query $query)
 * @method Customer   get($identifier)
 * @method Customer   create()
 */
interface CustomerRepositoryInterface extends RepositoryInterface
{}