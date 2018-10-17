<?php

namespace PE\Component\ECommerce\WaitList\Model;

use PE\Component\ECommerce\Customer\Model\CustomerAwareTrait;

class WaitList implements WaitListInterface
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
    public function addElement(WaitListElementInterface $element)
    {
        if (!in_array($element, $this->elements, true)) {
            $this->elements[] = $element;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeElement(WaitListElementInterface $element)
    {
        unset($this->elements[array_search($element, $this->elements, true)]);
        return $this;
    }
}