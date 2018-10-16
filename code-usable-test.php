<?php

namespace PE\Component\ECommerce;

use PE\Component\ECommerce\Basket\Model\Basket;
use PE\Component\ECommerce\Product\Entity\Product;

$product = new Product();

$basket = new Basket();
$basket->addElement(new ProductElement($product));
$basket->addElement(new ProductElement($product));
$basket->addElement(new ProductElement($product));