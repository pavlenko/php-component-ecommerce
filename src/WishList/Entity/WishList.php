<?php

namespace PE\Component\ECommerce\WishList\Entity;

use PE\Component\ECommerce\Customer\Entity\Customer;
use PE\Component\ECommerce\Product\Entity\Product;

class WishList
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var Product[]
     */
    private $products;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return WishList
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return WishList
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     *
     * @return WishList
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @param Product $product
     *
     * @return WishList
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
        return $this;
    }

    /**
     * @param Product $product
     *
     * @return WishList
     */
    public function removeProduct(Product $product)
    {
        unset($this->products[array_search($product, $this->products, true)]);
        return $this;
    }
}