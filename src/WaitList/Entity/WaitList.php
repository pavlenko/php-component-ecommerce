<?php

namespace PE\Component\ECommerce\WaitList\Entity;

use PE\Component\ECommerce\Customer\Entity\Customer;
use PE\Component\ECommerce\Product\Entity\Product;

class WaitList
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
    private $products = [];

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
     * @return WaitList
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
     * @return WaitList
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
     * @return WaitList
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @param Product $product
     *
     * @return WaitList
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
        return $this;
    }

    /**
     * @param Product $product
     *
     * @return WaitList
     */
    public function removeProduct(Product $product)
    {
        unset($this->products[array_search($product, $this->products, true)]);
        return $this;
    }
}