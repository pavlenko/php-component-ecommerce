<?php

namespace PE\Component\ECommerce\Discount\Entity;

interface DiscountAwareInterface
{
    /**
     * @return Discount[]
     */
    public function getDiscounts();

    /**
     * @param Discount $discount
     *
     * @return $this
     */
    public function addDiscount(Discount $discount);

    /**
     * @param Discount $discount
     *
     * @return $this
     */
    public function removeDiscount(Discount $discount);
}