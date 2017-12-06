<?php

namespace PE\Component\ECommerce\Basket\Repository;

use PE\Component\ECommerce\Basket\Entity\Basket;
use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\Query\Query;

/**
 * @method Basket   findOneByID($identifier)
 * @method Basket[] findAllByID(array $identifiers)
 * @method Basket   findOneBy(Query $query)
 * @method Basket[] findAllBy(Query $query)
 * @method Basket   get($identifier)
 * @method Basket   create()
 */
interface BasketRepositoryInterface extends RepositoryInterface
{}