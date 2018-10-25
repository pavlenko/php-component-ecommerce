<?php

namespace PE\Component\ECommerce\Checkout\Controller;

class ExampleController
{
    /**
     * Process each checkout step
     */
    public function actionStep()
    {}

    /**
     * Finish checkout process (create order)
     */
    public function actionConfirm()
    {}

    // COMMON STEPS USED IN E-COMMERCE

    public function actionStep1Review(){}
    public function actionStep2Customer(){}
    public function actionStep3Delivery(){}
    public function actionStep4Payment(){}
}