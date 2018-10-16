<?php

namespace PE\Component\ECommerce\Delivery\Model;

trait DeliveryAwareTrait
{
    protected $delivery;

    /**
     * @return DeliveryInterface
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param DeliveryInterface $delivery
     *
     * @return self
     */
    public function setDelivery(DeliveryInterface $delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }
}