<?php

namespace PE\Component\ECommerce\Product\Entity;

class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Category|null
     */
    private $parent;

    /**
     * @var Category[]
     */
    private $children;

    /**
     * @var Product[]
     */
    private $products;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Category|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Category|null $parent
     *
     * @return Category
     */
    public function setParent(Category $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return Category[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Category[] $children
     *
     * @return Category
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @param Category $child
     *
     * @return Category
     */
    public function addChild(Category $child)
    {
        $this->children[] = $child->setParent($this);
        return $this;
    }

    /**
     * @param Category $child
     *
     * @return Category
     */
    public function removeChild(Category $child)
    {
        if (false !== ($key = array_search($child, $this->children, true))) {
            $child->setParent(null);
            unset($this->children[$key]);
        }

        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     *
     * @return Category
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @param Product $product
     *
     * @return Category
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product->setCategory($this);
        return $this;
    }

    /**
     * @param Product $product
     *
     * @return Category
     */
    public function removeProduct(Product $product)
    {
        if (false !== ($key = array_search($product, $this->products, true))) {
            $product->setCategory(null);
            unset($this->products[$key]);
        }

        return $this;
    }
}