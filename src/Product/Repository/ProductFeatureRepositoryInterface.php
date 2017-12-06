<?php

namespace PE\Component\ECommerce\Product\Repository;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Product\Entity\ProductFeature;
use PE\Component\Query\Query;

/**
 * @method ProductFeature   findOneByID($identifier)
 * @method ProductFeature[] findAllByID(array $identifiers)
 * @method ProductFeature   findOneBy(Query $query)
 * @method ProductFeature[] findAllBy(Query $query)
 * @method ProductFeature   get($identifier)
 * @method ProductFeature   create()
 */
interface ProductFeatureRepositoryInterface extends RepositoryInterface
{}