<?php

namespace PE\Component\ECommerce\Core\Model;

trait MetadataAwareTrait
{
    /**
     * @var array
     */
    protected $metadata = [];

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