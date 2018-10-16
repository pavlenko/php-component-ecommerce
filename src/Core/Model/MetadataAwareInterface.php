<?php

namespace PE\Component\ECommerce\Core\Model;

interface MetadataAwareInterface
{
    /**
     * @return array
     */
    public function getMetadata();

    /**
     * @param array $metadata
     *
     * @return $this
     */
    public function setMetadata(array $metadata);

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getMetadataItem($key, $default = null);

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setMetadataItem($key, $value);

    /**
     * @param string $key
     *
     * @return $this
     */
    public function removeMetadataItem($key);
}