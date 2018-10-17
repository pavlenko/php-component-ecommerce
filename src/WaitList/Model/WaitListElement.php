<?php

namespace PE\Component\ECommerce\WaitList\Model;

use PE\Component\ECommerce\Product\Model\ProductInterface;

class WaitListElement implements WaitListElementInterface
{
    protected $id;
    protected $product;
    protected $createdAt;

    /**
     * @inheritDoc
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setID($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @inheritDoc
     */
    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}