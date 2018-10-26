<?php

namespace PE\Component\ECommerce\DeliveryService\Repository;

use PE\Component\ECommerce\Delivery\Model\DeliveryMethodInterface;
use PE\Component\ECommerce\DeliveryService\Model\DeliveryServiceInterface;

interface DeliveryServiceRepositoryInterface
{
    /**
     * @param DeliveryMethodInterface $method
     *
     * @return null|DeliveryServiceInterface
     */
    public function findServiceByMethod(DeliveryMethodInterface $method);

    /**
     * @return DeliveryServiceInterface
     */
    public function createService();

    /**
     * @param DeliveryServiceInterface $service
     * @param bool                     $flush
     */
    public function updateService(DeliveryServiceInterface $service, $flush = true);

    /**
     * @param DeliveryServiceInterface $service
     * @param bool                     $flush
     */
    public function removeService(DeliveryServiceInterface $service, $flush = true);
}