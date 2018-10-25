<?php

namespace PE\Component\ECommerce\Basket\Manager;

use PE\Component\ECommerce\Basket\Model\BasketInterface;

interface BasketManagerInterface
{
    /**
     * @param BasketInterface $basket
     * @param string          $productID
     *
     * @return self
     */
    public function addElement(BasketInterface $basket, $productID);

    /**
     * @param BasketInterface $basket
     * @param string          $elementID
     * @param int             $quantity
     *
     * @return self
     */
    public function updateElement(BasketInterface $basket, $elementID, $quantity);

    /**
     * @param BasketInterface $basket
     * @param string          $elementID
     *
     * @return self
     */
    public function removeElement(BasketInterface $basket, $elementID);

    /**
     * @param BasketInterface $basket
     *
     * @return self
     */
    public function clearElements(BasketInterface $basket);

    /**
     * @param BasketInterface $basket
     *
     * @return self
     */
    public function saveBasket(BasketInterface $basket);
}