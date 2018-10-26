<?php

namespace PE\Component\ECommerce\Delivery\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Delivery\Model\DeliveryMethodInterface;

interface DeliveryFactoryInterface
{
    /**
     * @param DeliveryMethodInterface $method
     * @param array                   $options
     *
     * @return View
     */
    public function createMethodView(DeliveryMethodInterface $method, array $options = []);
}