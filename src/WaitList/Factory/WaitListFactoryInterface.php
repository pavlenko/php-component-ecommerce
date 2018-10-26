<?php

namespace PE\Component\ECommerce\WaitList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\WaitList\Manager\WaitListManagerInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListElementInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListInterface;

interface WaitListFactoryInterface
{
    /**
     * @return WaitListManagerInterface
     */
    public function createManager();

    /**
     * @param WaitListInterface $waitList
     * @param array             $options
     *
     * @return View
     */
    public function createWaitListView(WaitListInterface $waitList, array $options = []);

    /**
     * @param WaitListElementInterface $element
     * @param array                    $options
     *
     * @return View
     */
    public function createElementView(WaitListElementInterface $element, array $options = []);
}