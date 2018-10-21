<?php

namespace PE\Component\ECommerce\Basket\Model;

use PE\Component\ECommerce\Product\Model\ProductInterface;

interface BasketElementInterface
{
    /**
     * @return string
     */
    public function getID();

    /**
     * @param string $id
     *
     * @return self
     */
    public function setID($id);

    /**
     * @return BasketInterface
     */
    public function getBasket();

    /**
     * @param BasketInterface $basket
     *
     * @return self
     */
    public function setBasket(BasketInterface $basket);

    /**
     * @return ProductInterface
     */
    public function getProduct();

    /**
     * @param ProductInterface $product
     *
     * @return self
     */
    public function setProduct(ProductInterface $product);

    /**
     * @return int
     */
    public function getQuantity();

    /**
     * @param int $quantity
     *
     * @return self
     */
    public function setQuantity($quantity);
}