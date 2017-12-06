<?php

namespace PE\Component\ECommerce\Core;

class Collection
{
    /**
     * @var array
     */
    private $elements = [];

    /**
     * @return array
     */
    public function all()
    {
        return $this->elements;
    }

    /**
     * @param $element
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function add($element)
    {
        $this->validateElement($element);

        $this->elements[] = $element;
        return $this;
    }

    /**
     * @param $key
     *
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public function has($key)
    {
        $this->validateKey($key);
        return array_key_exists($key, $this->elements);
    }

    /**
     * @param $key
     * @param $default
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function get($key, $default = null)
    {
        $this->validateKey($key);
        return array_key_exists($key, $this->elements) ? $this->elements[$key] : $default;
    }

    /**
     * @param $key
     * @param $element
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function set($key, $element)
    {
        $this->validateKey($key);
        $this->validateElement($element);

        $this->elements[$key] = $element;
        return $this;
    }

    /**
     * @param $key
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function remove($key)
    {
        $this->validateKey($key);

        unset($this->elements[$key]);
        return $this;
    }

    /**
     * @param $key
     *
     * @throws \InvalidArgumentException
     */
    protected function validateKey($key)
    {}

    /**
     * @param $element
     *
     * @throws \InvalidArgumentException
     */
    protected function validateElement($element)
    {}
}