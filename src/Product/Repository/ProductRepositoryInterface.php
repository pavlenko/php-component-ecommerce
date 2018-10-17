<?php

namespace PE\Component\ECommerce\Product\Repository;

use PE\Component\ECommerce\Core\Repository\RepositoryInterface;
use PE\Component\ECommerce\Product\Entity\Product;
use PE\Component\ECommerce\Product\Model\ProductInterface;
use PE\Component\Query\Query;

/**
 * @method Product   findOneByID($identifier)
 * @method Product[] findAllByID(array $identifiers)
 * @method Product   findOneBy(Query $query)
 * @method Product[] findAllBy(Query $query)
 * @method Product   get($identifier)
 * @method Product   create()
 */
interface ProductRepositoryInterface extends RepositoryInterface
{
    /**
     * @param string $id
     *
     * @return null|ProductInterface
     */
    public function findProductByID($id);

    /**
     * @return ProductInterface
     */
    public function createProduct();

    /**
     * @param ProductInterface $product
     * @param bool             $flush
     */
    public function updateProduct(ProductInterface $product, $flush = true);

    /**
     * @param ProductInterface $product
     * @param bool             $flush
     */
    public function removeProduct(ProductInterface $product, $flush = true);
}