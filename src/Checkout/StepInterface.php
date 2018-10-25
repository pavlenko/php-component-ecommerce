<?php

namespace PE\Component\ECommerce\Checkout;

interface StepInterface
{
    // Load previously saved data
    public function loadData($data);

    // Save step submitted data
    public function saveData($data);

    // Create specific view for step
    public function createView();
}