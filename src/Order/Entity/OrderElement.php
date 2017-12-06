<?php

namespace PE\Component\ECommerce\Order\Entity;

use PE\Component\ECommerce\Product\Entity\Product;

class OrderElement
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var OrderElement
     */
    private $parent;

    /**
     * @var OrderElement[]
     */
    private $children;

    /**
     * @var int
     */
    private $quantity = 0;

    /**
     * @var bool
     */
    private $enabled = true;

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return OrderElement
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param OrderElement $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return OrderElement[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param OrderElement[] $children
     */
    public function setChildren(array $children)
    {
        $this->children = $children;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }
}