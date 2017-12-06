<?php

namespace PE\Component\ECommerce\Discount\Entity;

trait DiscountAwareTrait
{
    /**
     * @var Discount[]
     */
    private $discounts = [];

    /**
     * @return Discount[]
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * @param Discount $discount
     *
     * @return $this
     */
    public function addDiscount(Discount $discount)
    {
        $this->discounts[] = $discount;
        return $this;
    }

    /**
     * @param Discount $discount
     *
     * @return $this
     */
    public function removeDiscount(Discount $discount)
    {
        unset($this->discounts[array_search($discount, $this->discounts, true)]);
        return $this;
    }
}