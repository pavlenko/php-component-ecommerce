<?php

namespace PE\Component\ECommerce\Basket\Repository;

use PE\Component\ECommerce\Basket\Model\BasketInterface;

interface BasketRepositoryInterface
{
    /**
     * @param string $id
     *
     * @return null|BasketInterface
     */
    public function findBasketByID($id);

    /**
     * @return BasketInterface
     */
    public function createBasket();

    /**
     * @param BasketInterface $basket
     * @param bool            $flush
     */
    public function updateBasket(BasketInterface $basket, $flush = true);

    /**
     * @param BasketInterface $basket
     * @param bool            $flush
     */
    public function removeBasket(BasketInterface $basket, $flush = true);
}