<?php

namespace PE\Component\ECommerce\Basket\Model;

use PE\Component\ECommerce\Core\Model\MetadataAwareInterface;

interface BasketInterface extends MetadataAwareInterface
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
     * @return BasketElementInterface[]
     */
    public function getPurchases();

    /**
     * @param BasketElementInterface $purchase
     *
     * @return self
     */
    public function addPurchase(BasketElementInterface $purchase);

    /**
     * @param BasketElementInterface $purchase
     *
     * @return self
     */
    public function removePurchase(BasketElementInterface $purchase);
}