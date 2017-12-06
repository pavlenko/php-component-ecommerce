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
 * Product
 */
class Product
{
    /**
     * @var string
     */
    private $id;

    /**
     * Product type
     *
     * @var string
     */
    private $type;

    /**
     * @var Category|null
     */
    private $category;

    /**
     * Parent product
     *
     * @var Product
     */
    private $parent;

    /**
     * Children products
     *
     * @var Product[]
     */
    private $children = [];

    /**
     * Stock keeping unit
     *
     * @var string
     */
    private $sku;

    /**
     * Title
     *
     * @var string
     */
    private $title;

    /**
     * Price
     *
     * @var float
     */
    private $price;

    /**
     * Custom product metadata, used for build product types
     *
     * @var array
     */
    private $metadata = [];

    /**
     * Product feature values
     *
     * @var ProductFeature[]
     */
    private $features = [];

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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     *
     * @return Product
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Product
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Product $product
     *
     * @return $this
     */
    public function setParent(Product $product)
    {
        $this->parent = $product;
        return $this;
    }

    /**
     * @return Product[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Product[] $children
     *
     * @return $this
     */
    public function setChildren(array $children)
    {
        $this->children = [];

        foreach ($children as $child) {
            $this->addChild($child);
        }

        return $this;
    }

    /**
     * @param Product $child
     *
     * @return $this
     */
    public function addChild(Product $child)
    {
        $this->children[] = $child->setParent($this);
        return $this;
    }

    /**
     * @param Product $child
     *
     * @return $this
     */
    public function removeChild(Product $child)
    {
        if (false !== ($key = array_search($child, $this->children, true))) {
            $child->setParent(null);
            unset($this->children[$key]);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getSKU()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     *
     * @return $this
     */
    public function setSKU($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     *
     * @return $this
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getMetadataItem($key, $default = null)
    {
        return array_key_exists((string) $key, $this->metadata) ? $this->metadata[(string) $key] : $default;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setMetadataItem($key, $value)
    {
        $this->metadata[(string) $key] = $value;
        return $this;
    }

    /**
     * @param string $key
     *
     * @return $this
     */
    public function removeMetadataItem($key)
    {
        unset($this->metadata[(string) $key]);
        return $this;
    }

    /**
     * @return ProductFeature[]
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @param ProductFeature[] $features
     *
     * @return $this
     */
    public function setFeatures(array $features)
    {
        $this->features = [];

        foreach ($features as $feature) {
            $this->addFeature($feature);
        }

        return $this;
    }

    /**
     * @param ProductFeature $feature
     *
     * @return $this
     */
    public function addFeature(ProductFeature $feature)
    {
        $this->features[] = $feature->setProduct($this);
        return $this;
    }

    /**
     * @param ProductFeature $feature
     *
     * @return $this
     */
    public function removeFeature(ProductFeature $feature)
    {
        if (false !== ($key = array_search($feature, $this->features, true))) {
            $feature->setProduct(null);
            unset($this->features[$key]);
        }

        return $this;
    }
}