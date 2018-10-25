<?php

namespace PE\Component\ECommerce\Basket\Manager;

use PE\Component\ECommerce\Basket\Model\BasketInterface;

class BasketManagerPersistent extends BasketManagerBase
{
    /**
     * @inheritDoc
     */
    public function saveBasket(BasketInterface $basket)
    {
        foreach ($this->toRemove as $element) {
            $this->basketElementRepository->removeElement($element);
        }

        foreach ($this->toUpdate as $element) {
            $this->basketElementRepository->updateElement($element);
        }

        foreach ($this->toCreate as $element) {
            $this->basketElementRepository->updateElement($element);
        }

        $this->basketRepository->updateBasket($basket);

        $this->toCreate = $this->toUpdate = $this->toRemove = [];
    }
}