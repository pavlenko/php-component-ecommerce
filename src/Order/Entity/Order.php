<?php

namespace PE\Component\ECommerce\Order\Entity;

class Order
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var OrderElement[]
     */
    private $elements = [];

    /**
     * Custom metadata
     *
     * @var array
     */
    private $metadata = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return OrderElement[]
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param OrderElement $element
     */
    public function addElement(OrderElement $element)
    {
        $this->elements[] = $element;
    }

    /**
     * @param OrderElement $element
     */
    public function removeElement(OrderElement $element)
    {
        if (false !== ($key = array_search($element, $this->elements))) {
            unset($this->elements[$key]);
        }
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     *
     * @return $this
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getMetadataItem($key, $default = null)
    {
        return array_key_exists((string) $key, $this->metadata) ? $this->metadata[(string) $key] : $default;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setMetadataItem($key, $value)
    {
        $this->metadata[(string) $key] = $value;
        return $this;
    }

    /**
     * @param string $key
     *
     * @return $this
     */
    public function removeMetadataItem($key)
    {
        unset($this->metadata[(string) $key]);
        return $this;
    }
}