<?php

namespace PE\Component\ECommerce\Basket\Model;

use PE\Component\ECommerce\Core\Model\MetadataAwareInterface;

interface BasketInterface extends MetadataAwareInterface
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
     * @return PurchaseInterface[]
     */
    public function getElements();

    /**
     * @param PurchaseInterface $element
     *
     * @return self
     */
    public function addElement(PurchaseInterface $element);

    /**
     * @param PurchaseInterface $element
     *
     * @return self
     */
    public function removeElement(PurchaseInterface $element);
}