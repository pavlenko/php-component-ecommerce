<?php

namespace PE\Component\ECommerce\Basket\Entity;

class Basket
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var BasketElement[]
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
     * @return BasketElement[]
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param BasketElement[] $elements
     *
     * @return $this
     */
    public function setElements(array $elements)
    {
        $this->elements = [];

        foreach ($elements as $element) {
            $this->addElement($element);
        }

        return $this;
    }

    /**
     * @param BasketElement $element
     *
     * @return $this
     */
    public function addElement(BasketElement $element)
    {
        $this->elements[] = $element;
        return $this;
    }

    /**
     * @param BasketElement $element
     *
     * @return $this
     */
    public function removeElement(BasketElement $element)
    {
        unset($this->elements[array_search($element, $this->elements)]);
        return $this;
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