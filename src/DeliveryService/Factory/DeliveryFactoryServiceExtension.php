<?php

namespace PE\Component\ECommerce\DeliveryService\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Delivery\Factory\DeliveryFactoryExtensionInterface;
use PE\Component\ECommerce\Delivery\Model\DeliveryMethodInterface;
use PE\Component\ECommerce\DeliveryService\Repository\DeliveryServiceRepositoryInterface;

class DeliveryFactoryServiceExtension implements DeliveryFactoryExtensionInterface
{
    /**
     * @var DeliveryServiceRepositoryInterface
     */
    private $deliveryServiceRepository;

    /**
     * @inheritDoc
     */
    public function buildMethodView(View $view, DeliveryMethodInterface $method, array $options = [])
    {
        $view->vars['places'] = [];

        $service = $this->deliveryServiceRepository->findServiceByMethod($method);
        if ($service) {
            $view->vars['places']  = [];
            $view->vars['service'] = [
                'id'    => $service->getID(),
                'title' => $service->getTitle(),
            ];

            foreach ($service->getPlaces() as $place) {
                $view->vars['places'][] = [
                    'id'    => $place->getID(),
                    'title' => $place->getTitle(),
                ];
            }
        }
    }
}