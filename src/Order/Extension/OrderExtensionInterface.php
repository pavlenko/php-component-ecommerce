<?php

namespace PE\Component\ECommerce\Order\Extension;

use PE\Component\ECommerce\Order\Entity\Order;

interface OrderExtensionInterface
{
    /**
     * Build order object after creation
     *
     * @param Order $order
     */
    public function buildOrder(Order $order);
}