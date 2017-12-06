<?php

namespace PE\Component\ECommerce\Discount\Entity;

class Discount
{
    const REDUCTION_PERCENT = 'percent';
    const REDUCTION_AMOUNT  = 'amount';

    /**
     * Apply to
     *
     * Possible values:
     *   basket
     *   basket element
     *   delivery TODO may be create common applier object for use as interface
     *
     * @var object
     */
    private $applyTo;

    /**
     * @var string
     */
    private $reductionType;

    /**
     * @return object
     */
    public function getApplyTo()
    {
        return $this->applyTo;
    }

    /**
     * @param object $applyTo
     *
     * @return $this
     */
    public function setApplyTo($applyTo)
    {
        $this->applyTo = $applyTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getReductionType()
    {
        return $this->reductionType;
    }

    /**
     * @param string $reductionType
     *
     * @return $this
     */
    public function setReductionType($reductionType)
    {
        $this->reductionType = $reductionType;
        return $this;
    }
}