<?php

namespace PE\Component\ECommerce\Basket\Model;

class BasketElement implements BasketElementInterface
{
    protected $id;
    protected $quantity = 0;

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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @inheritDoc
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}