<?php

namespace PE\Component\ECommerce\Order\Model;

interface PurchaseInterface
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