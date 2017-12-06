<?php

namespace PE\Component\ECommerce\Product\Repository;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Product\Entity\Feature;
use PE\Component\Query\Query;

/**
 * @method Feature   findOneByID($identifier)
 * @method Feature[] findAllByID(array $identifiers)
 * @method Feature   findOneBy(Query $query)
 * @method Feature[] findAllBy(Query $query)
 * @method Feature   get($identifier)
 * @method Feature   create()
 */
interface FeatureRepositoryInterface extends RepositoryInterface
{}