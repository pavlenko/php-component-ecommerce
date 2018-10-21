<?php

namespace PE\Component\ECommerce\Delivery\Repository;

use PE\Component\ECommerce\Delivery\Model\DeliveryMethodInterface;

interface DeliveryMethodRepositoryInterface
{
    /**
     * @return DeliveryMethodInterface
     */
    public function createMethod();

    /**
     * @param DeliveryMethodInterface $method
     * @param bool                    $flush
     */
    public function updateMethod(DeliveryMethodInterface $method, $flush = true);

    /**
     * @param DeliveryMethodInterface $method
     * @param bool                    $flush
     */
    public function removeMethod(DeliveryMethodInterface $method, $flush = true);
}