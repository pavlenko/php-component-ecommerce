<?php

namespace PE\Component\ECommerce\Basket\Model;

use PE\Component\ECommerce\Core\Model\MetadataAwareTrait;

class Basket implements BasketInterface
{
    use MetadataAwareTrait;

    protected $id;
    protected $purchases = [];

    /**
     * @inheritDoc
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setID($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPurchases()
    {
        return $this->purchases;
    }

    /**
     * @inheritDoc
     */
    public function addPurchase(BasketElementInterface $purchase)
    {
        if (false === array_search($purchase, $this->purchases, true)) {
            $this->purchases[] = $purchase;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removePurchase(BasketElementInterface $purchase)
    {
        if (false !== ($key = array_search($purchase, $this->purchases, true))) {
            unset($this->purchases[$key]);
        }

        return $this;
    }
}