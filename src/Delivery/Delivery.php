<?php

namespace PE\Component\ECommerce\Delivery;

// Delivery data object
class Delivery
{
    public $type;//TODO free, courier, delivery service

    public $service;

    public $place;

    /**
     * @var int
     */
    private $cost;
}