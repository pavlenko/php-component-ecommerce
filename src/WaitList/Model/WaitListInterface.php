<?php

namespace PE\Component\ECommerce\WaitList\Model;

use PE\Component\ECommerce\Customer\Model\CustomerAwareInterface;

interface WaitListInterface extends CustomerAwareInterface
{
    /**
     * @return string
     */
    public function getID();

    /**
     * @param string $id
     *
     * @return self
     */
    public function setID($id);

    /**
     * @return WaitListElementInterface[]
     */
    public function getElements();

    /**
     * @param WaitListElementInterface $element
     *
     * @return self
     */
    public function addElement(WaitListElementInterface $element);

    /**
     * @param WaitListElementInterface $element
     *
     * @return self
     */
    public function removeElement(WaitListElementInterface $element);
}