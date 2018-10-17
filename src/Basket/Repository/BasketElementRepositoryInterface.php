<?php

namespace PE\Component\ECommerce\Basket\Repository;

use PE\Component\ECommerce\Basket\Model\BasketElementInterface;

interface BasketElementRepositoryInterface
{
    /**
     * @param string $id
     *
     * @return null|BasketElementInterface
     */
    public function findElementByID($id);

    /**
     * @return BasketElementInterface
     */
    public function createElement();

    /**
     * @param BasketElementInterface $element
     * @param bool                   $flush
     */
    public function updateElement(BasketElementInterface $element, $flush = true);

    /**
     * @param BasketElementInterface $element
     * @param bool                   $flush
     */
    public function removeElement(BasketElementInterface $element, $flush = true);
}