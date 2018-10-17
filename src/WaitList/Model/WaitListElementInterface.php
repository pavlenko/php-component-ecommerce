<?php

namespace PE\Component\ECommerce\WaitList\Model;

use PE\Component\ECommerce\Product\Model\ProductInterface;

interface WaitListElementInterface
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
     * @return WaitListInterface
     */
    public function getWaitList();

    /**
     * @param WaitListInterface $waitList
     *
     * @return self
     */
    public function setWaitList(WaitListInterface $waitList);

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
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param \DateTime $createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt);
}