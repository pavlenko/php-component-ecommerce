<?php

namespace PE\Component\ECommerce\Basket\Model;

use PE\Component\ECommerce\Core\Model\MetadataAwareTrait;

class Basket implements BasketInterface
{
    use MetadataAwareTrait;

    protected $id;
    protected $elements = [];

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
        return $this->elements;
    }

    /**
     * @inheritDoc
     */
    public function addPurchase(PurchaseInterface $purchase)
    {
        if (false === array_search($purchase, $this->elements, true)) {
            $this->elements[] = $purchase;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removePurchase(PurchaseInterface $element)
    {
        if (false !== ($key = array_search($element, $this->elements, true))) {
            unset($this->elements[$key]);
        }

        return $this;
    }
}