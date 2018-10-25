<?php

namespace PE\Component\ECommerce\WishList\Model;

use PE\Component\ECommerce\Customer\Model\CustomerAwareTrait;

class WishList implements WishListInterface
{
    use CustomerAwareTrait;

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
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @inheritDoc
     */
    public function addElement(WishListElementInterface $element)
    {
        if (!in_array($element, $this->elements, true)) {
            $this->elements[] = $element;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeElement(WishListElementInterface $element)
    {
        unset($this->elements[array_search($element, $this->elements, true)]);
        return $this;
    }
}