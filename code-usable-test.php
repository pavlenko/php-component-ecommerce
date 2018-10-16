<?php

namespace PE\Component\ECommerce;

use PE\Component\ECommerce\Basket\Model\Basket;
use PE\Component\ECommerce\Product\Entity\Product;

$product = new Product();

$basket = new Basket();
$basket->addPurchase(new ProductElement($product));
$basket->addPurchase(new ProductElement($product));
$basket->addPurchase(new ProductElement($product));