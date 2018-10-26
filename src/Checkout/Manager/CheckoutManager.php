<?php

namespace PE\Component\ECommerce\Checkout\Manager;

use PE\Component\ECommerce\Checkout\CheckoutEvents;
use PE\Component\ECommerce\Checkout\Event\CheckoutEvent;
use PE\Component\ECommerce\Checkout\Model\CheckoutInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CheckoutManager implements CheckoutManagerInterface
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * @inheritDoc
     */
    public function confirmCheckout(CheckoutInterface $checkout)
    {
        $this->dispatcher->dispatch(CheckoutEvents::CREATE_ORDER_PROCESS, $event = new CheckoutEvent($checkout));

        if ($event->isValid()) {
            $this->dispatcher->dispatch(CheckoutEvents::CREATE_ORDER_SUCCESS, new CheckoutEvent($checkout));

            //TODO clear steps data & remove checkout from session

            $this->dispatcher->dispatch(CheckoutEvents::CREATE_ORDER_COMPLETE, new CheckoutEvent($checkout));
        } else {
            $this->dispatcher->dispatch(CheckoutEvents::CREATE_ORDER_ERROR, new CheckoutEvent($checkout));
        }
    }
}