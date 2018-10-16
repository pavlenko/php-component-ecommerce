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
     * @return PurchaseInterface[]
     */
    public function getPurchases();

    /**
     * @param PurchaseInterface $purchase
     *
     * @return self
     */
    public function addPurchase(PurchaseInterface $purchase);

    /**
     * @param PurchaseInterface $purchase
     *
     * @return self
     */
    public function removePurchase(PurchaseInterface $purchase);
}