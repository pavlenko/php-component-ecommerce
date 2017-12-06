<?php

namespace PE\Component\ECommerce\Product\Repository;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Product\Entity\FeatureOption;
use PE\Component\Query\Query;

/**
 * @method FeatureOption   findOneByID($identifier)
 * @method FeatureOption[] findAllByID(array $identifiers)
 * @method FeatureOption   findOneBy(Query $query)
 * @method FeatureOption[] findAllBy(Query $query)
 * @method FeatureOption   get($identifier)
 * @method FeatureOption   create()
 */
interface FeatureOptionRepositoryInterface extends RepositoryInterface
{}