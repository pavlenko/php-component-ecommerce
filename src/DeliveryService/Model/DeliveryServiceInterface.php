<?php

namespace PE\Component\ECommerce\DeliveryService\Model;

interface DeliveryServiceInterface
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
     * @return DeliveryServicePlaceInterface[]
     */
    public function getPlaces();

    /**
     * @param DeliveryServicePlaceInterface $place
     *
     * @return self
     */
    public function addPlace(DeliveryServicePlaceInterface $place);

    /**
     * @param DeliveryServicePlaceInterface $place
     *
     * @return self
     */
    public function removePlace(DeliveryServicePlaceInterface $place);
}