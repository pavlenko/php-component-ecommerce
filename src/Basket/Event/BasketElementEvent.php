<?php

namespace PE\Component\ECommerce\Basket\Event;

use PE\Component\ECommerce\Basket\Entity\Basket;
use PE\Component\ECommerce\Basket\Entity\BasketElement;
use PE\Component\ECommerce\Product\Entity\Product;
use PE\Component\EventManager\Event;

class BasketElementEvent extends Event
{
    const BEFORE_ADD = 'cmf.ecommerce.basket_element.before_add';
    const AFTER_ADD  = 'cmf.ecommerce.basket_element.after_add';

    const BEFORE_EDIT = 'cmf.ecommerce.basket_element.before_edit';
    const AFTER_EDIT  = 'cmf.ecommerce.basket_element.after_edit';

    const BEFORE_DELETE = 'cmf.ecommerce.basket_element.before_delete';
    const AFTER_DELETE  = 'cmf.ecommerce.basket_element.after_delete';

    /**
     * @var Basket
     */
    private $basket;

    /**
     * @var BasketElement
     */
    private $element;

    /**
     * @var Product
     */
    private $product;

    /**
     * @param string        $name
     * @param Basket        $basket
     * @param BasketElement $element
     * @param Product       $product
     */
    public function __construct($name, Basket $basket, BasketElement $element, Product $product)
    {
        parent::__construct($name);

        $this->basket  = $basket;
        $this->element = $element;
        $this->product = $product;
    }

    /**
     * @return Basket
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @return BasketElement
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}