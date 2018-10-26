<?php

namespace PE\Component\ECommerce\Checkout;

final class CheckoutEvents
{
    const CREATE_ORDER_PROCESS  = 'checkout.create_order.process';
    const CREATE_ORDER_SUCCESS  = 'checkout.create_order.success';
    const CREATE_ORDER_COMPLETE = 'checkout.create_order.complete';
    const CREATE_ORDER_ERROR    = 'checkout.create_order.error';

    private function __construct()
    {}
}