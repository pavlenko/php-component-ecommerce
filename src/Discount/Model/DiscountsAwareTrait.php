<?php

namespace PE\Component\ECommerce\Discount\Model;

trait DiscountsAwareTrait
{
    protected $discounts = [];

    /**
     * @return DiscountInterface[]
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * @param DiscountInterface $discount
     *
     * @return self
     */
    public function addDiscount(DiscountInterface $discount)
    {
        if (false === array_search($discount, $this->discounts, true)) {
            $this->discounts[] = $discount;
        }

        return $this;
    }

    /**
     * @param DiscountInterface $discount
     *
     * @return self
     */
    public function removeDiscount(DiscountInterface $discount)
    {
        if (false !== ($key = array_search($discount, $this->discounts, true))) {
            unset($this->discounts[$key]);
        }

        return $this;
    }
}