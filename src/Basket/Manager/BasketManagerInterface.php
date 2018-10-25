<?php

namespace PE\Component\ECommerce\Basket\Manager;

use PE\Component\ECommerce\Basket\Model\BasketInterface;

interface BasketManagerInterface
{
    /**
     * @return BasketInterface
     */
    public function getBasket();

    /**
     * @param string $productID
     *
     * @return self
     */
    public function addElement($productID);

    /**
     * @param string $elementID
     * @param int    $quantity
     *
     * @return self
     */
    public function updateElement($elementID, $quantity);

    /**
     * @param string $elementID
     *
     * @return self
     */
    public function removeElement($elementID);

    /**
     * @return self
     */
    public function clearElements();

    /**
     * @return self
     */
    public function saveBasket();
}