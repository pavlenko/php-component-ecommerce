<?php
/**
 * SunNY Creative Technologies
 *
 *   #####                                ##     ##    ##      ##
 * ##     ##                              ###    ##    ##      ##
 * ##                                     ####   ##     ##    ##
 * ##           ##     ##    ## #####     ## ##  ##      ##  ##
 *   #####      ##     ##    ###    ##    ##  ## ##       ####
 *        ##    ##     ##    ##     ##    ##   ####        ##
 *        ##    ##     ##    ##     ##    ##    ###        ##
 * ##     ##    ##     ##    ##     ##    ##     ##        ##
 *   #####        #######    ##     ##    ##     ##        ##
 *
 * C  R  E  A  T  I  V  E     T  E  C  H  N  O  L  O  G  I  E  S
 */

namespace PE\Component\ECommerce\Product\Entity;

/**
 * Product feature value
 */
class ProductFeature
{
    /**
     * @var string
     */
    private $id;

    /**
     * Reference to product, cannot be null
     *
     * @var Product
     */
    private $product;

    /**
     * Reference to features group, cannot be null
     *
     * @var Feature
     */
    private $feature;

    /**
     * Reference to predefined feature value, can be null
     *
     * @var FeatureOption|null
     */
    private $option;

    /**
     * Feature value
     *
     * @var string
     */
    private $value;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     *
     * @return $this
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return Feature
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @param Feature $feature
     *
     * @return $this
     */
    public function setFeature(Feature $feature)
    {
        $this->feature = $feature;
        return $this;
    }

    /**
     * @return FeatureOption|null
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param FeatureOption|null $option
     *
     * @return $this
     */
    public function setOption(FeatureOption $option = null)
    {
        $this->option = $option;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}