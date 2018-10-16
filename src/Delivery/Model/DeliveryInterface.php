<?php

namespace PE\Component\ECommerce\Delivery\Model;

interface DeliveryInterface
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
}