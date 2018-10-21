<?php

namespace PE\Component\ECommerce\Delivery\Model;

interface DeliveryMethodInterface
{
    /**
     * @return string
     */
    public function getID();

    /**
     * @param string $id
     *
     * @return self
     */
    public function setID($id);

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type);
}