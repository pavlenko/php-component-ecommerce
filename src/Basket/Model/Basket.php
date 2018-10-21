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
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @inheritDoc
     */
    public function addElement(BasketElementInterface $element)
    {
        if (!in_array($element, $this->elements, true)) {
            $this->elements[] = $element;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeElement(BasketElementInterface $element)
    {
        if (false !== ($key = array_search($element, $this->elements, true))) {
            unset($this->elements[$key]);
        }

        return $this;
    }
}