<?php

namespace PE\Component\ECommerce\Delivery\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Delivery\Model\DeliveryMethodInterface;

class DeliveryFactory implements DeliveryFactoryInterface
{
    /**
     * @var DeliveryFactoryExtensionInterface[]
     */
    private $extensions = [];

    /**
     * @param DeliveryFactoryExtensionInterface $extension
     */
    public function addExtension(DeliveryFactoryExtensionInterface $extension)
    {
        $this->extensions[get_class($extension)] = $extension;
    }

    /**
     * @inheritDoc
     */
    public function createMethodView(DeliveryMethodInterface $method, array $options = [])
    {
        $view = new View([
            'id'   => $method->getID(),
            'type' => $method->getType(),
        ]);

        foreach ($this->extensions as $extension) {
            $extension->buildMethodView($view, $method, $options);
        }

        return $view;
    }
}