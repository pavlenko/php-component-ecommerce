<?php

namespace PE\Component\ECommerce\Delivery;

interface DeliveryAwareInterface
{
    /**
     * @return Delivery
     */
    public function getDelivery();

    /**
     * @param Delivery $delivery
     */
    public function setDelivery(Delivery $delivery);
}