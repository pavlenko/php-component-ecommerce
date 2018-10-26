<?php

namespace PE\Component\ECommerce\Delivery\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Delivery\Model\DeliveryMethodInterface;

interface DeliveryFactoryExtensionInterface
{
    /**
     * @param View                    $view
     * @param DeliveryMethodInterface $method
     * @param array                   $options
     */
    public function buildMethodView(View $view, DeliveryMethodInterface $method, array $options = []);
}