<?php

namespace PE\Component\ECommerce\Order\Model;

class Order implements OrderInterface
{
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
    public function addPurchase(PurchaseInterface $purchase)
    {
        if (false === array_search($purchase, $this->purchases, true)) {
            $this->purchases[] = $purchase;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removePurchase(PurchaseInterface $element)
    {
        if (false !== ($key = array_search($element, $this->purchases, true))) {
            unset($this->purchases[$key]);
        }

        return $this;
    }
}