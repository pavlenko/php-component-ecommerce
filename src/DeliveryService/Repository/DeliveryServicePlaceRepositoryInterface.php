<?php

namespace PE\Component\ECommerce\DeliveryService\Repository;

use PE\Component\ECommerce\DeliveryService\Model\DeliveryServicePlaceInterface;

interface DeliveryServicePlaceRepositoryInterface
{
    /**
     * @return DeliveryServicePlaceInterface
     */
    public function createPlace();

    /**
     * @param DeliveryServicePlaceInterface $place
     * @param bool                          $flush
     */
    public function updatePlace(DeliveryServicePlaceInterface $place, $flush = true);

    /**
     * @param DeliveryServicePlaceInterface $place
     * @param bool                          $flush
     */
    public function removePlace(DeliveryServicePlaceInterface $place, $flush = true);
}