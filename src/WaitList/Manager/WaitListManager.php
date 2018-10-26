<?php

namespace PE\Component\ECommerce\WaitList\Manager;

use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListElementInterface;
use PE\Component\ECommerce\WaitList\Model\WaitListInterface;
use PE\Component\ECommerce\WaitList\Repository\WaitListElementRepositoryInterface;
use PE\Component\ECommerce\WaitList\Repository\WaitListRepositoryInterface;

class WaitListManager implements WaitListManagerInterface
{
    /**
     * @var WaitListRepositoryInterface
     */
    private $waitListRepository;

    /**
     * @var WaitListElementRepositoryInterface
     */
    private $waitListElementRepository;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var WaitListElementInterface[]
     */
    private $toCreate = [];

    /**
     * @var WaitListElementInterface[]
     */
    private $toRemove = [];

    /**
     * @inheritDoc
     */
    public function addElement(WaitListInterface $waitList, $productID)
    {
        if ($product = $this->productRepository->findProductByID($productID)) {
            $element = $this->waitListElementRepository->createElement();
            $element->setProduct($product);

            $waitList->addElement($this->toCreate[] = $element);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeElement(WaitListInterface $waitList, $elementID)
    {
        foreach ($waitList->getElements() as $element) {
            if ($element->getID() == $elementID) {
                $waitList->removeElement($this->toRemove[] = $element);
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function saveWaitList(WaitListInterface $waitList)
    {
        foreach ($this->toCreate as $element) {
            $this->waitListElementRepository->removeElement($element);
        }

        foreach ($this->toRemove as $element) {
            $this->waitListElementRepository->updateElement($element);
        }

        $this->waitListRepository->updateWaitList($waitList);

        $this->toCreate = $this->toRemove = [];

        return $this;
    }
}