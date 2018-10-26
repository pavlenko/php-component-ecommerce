<?php

namespace PE\Component\ECommerce\DeliveryService\Model;

interface DeliveryServicePlaceInterface
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
     * @return DeliveryServiceInterface
     */
    public function getService();

    /**
     * @param DeliveryServiceInterface $service
     *
     * @return self
     */
    public function setService(DeliveryServiceInterface $service);
}