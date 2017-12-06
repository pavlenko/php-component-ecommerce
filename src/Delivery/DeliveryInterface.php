<?php

namespace PE\Component\ECommerce\Delivery;

use PE\Component\ECommerce\Core\PurchaseCollection;

interface DeliveryInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @return float
     */
    public function getBaseCost();

    /**
     * @param PurchaseCollection $collection
     *
     * @return float
     */
    public function getTotalCost(PurchaseCollection $collection);
}