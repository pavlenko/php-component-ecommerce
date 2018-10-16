<?php

namespace PE\Component\ECommerce\Discount\Model;

interface DiscountsAwareInterface
{
    /**
     * @return DiscountInterface[]
     */
    public function getDiscounts();

    /**
     * @param DiscountInterface $discount
     *
     * @return self
     */
    public function addDiscount(DiscountInterface $discount);

    /**
     * @param DiscountInterface $discount
     *
     * @return self
     */
    public function removeDiscount(DiscountInterface $discount);
}