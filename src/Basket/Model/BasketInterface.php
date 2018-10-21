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
     * @return BasketElementInterface[]
     */
    public function getElements();

    /**
     * @param BasketElementInterface $element
     *
     * @return self
     */
    public function addElement(BasketElementInterface $element);

    /**
     * @param BasketElementInterface $element
     *
     * @return self
     */
    public function removeElement(BasketElementInterface $element);
}