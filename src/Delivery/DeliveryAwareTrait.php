<?php

namespace PE\Component\ECommerce\Delivery;

trait DeliveryAwareTrait
{
    /**
     * @var Delivery
     */
    private $delivery;

    /**
     * @return Delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param Delivery $delivery
     */
    public function setDelivery(Delivery $delivery)
    {
        $this->delivery = $delivery;
    }
}