<?php

namespace PE\Component\ECommerce\WishList\Model;

use PE\Component\ECommerce\Product\Model\ProductInterface;

class WishListElement implements WishListElementInterface
{
    protected $id;
    protected $wishList;
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
    public function getWishList()
    {
        return $this->wishList;
    }

    /**
     * @inheritDoc
     */
    public function setWishList(WishListInterface $wishList)
    {
        $this->wishList = $wishList;
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