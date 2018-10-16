<?php

namespace PE\Component\ECommerce\Delivery\Model;

interface DeliveryAwareInterface
{
    /**
     * @return DeliveryInterface
     */
    public function getDelivery();

    /**
     * @param DeliveryInterface $delivery
     *
     * @return self
     */
    public function setDelivery(DeliveryInterface $delivery);
}