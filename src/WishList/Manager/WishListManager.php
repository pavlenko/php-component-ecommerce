<?php

namespace PE\Component\ECommerce\WishList\Manager;

use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use PE\Component\ECommerce\WishList\Model\WishListElementInterface;
use PE\Component\ECommerce\WishList\Model\WishListInterface;
use PE\Component\ECommerce\WishList\Repository\WishListElementRepositoryInterface;
use PE\Component\ECommerce\WishList\Repository\WishListRepositoryInterface;

class WishListManager implements WishListManagerInterface
{
    /**
     * @var WishListRepositoryInterface
     */
    private $wishListRepository;

    /**
     * @var WishListElementRepositoryInterface
     */
    private $wishListElementRepository;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var WishListElementInterface[]
     */
    private $toCreate = [];

    /**
     * @var WishListElementInterface[]
     */
    private $toRemove = [];

    /**
     * @inheritDoc
     */
    public function addElement(WishListInterface $wishList, $productID)
    {
        if ($product = $this->productRepository->findProductByID($productID)) {
            $element = $this->wishListElementRepository->createElement();
            $element->setProduct($product);

            $wishList->addElement($this->toCreate[] = $element);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeElement(WishListInterface $wishList, $elementID)
    {
        foreach ($wishList->getElements() as $element) {
            if ($element->getID() == $elementID) {
                $wishList->removeElement($this->toRemove[] = $element);
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function saveWishList(WishListInterface $wishList)
    {
        foreach ($this->toCreate as $element) {
            $this->wishListElementRepository->removeElement($element);
        }

        foreach ($this->toRemove as $element) {
            $this->wishListElementRepository->updateElement($element);
        }

        $this->wishListRepository->updateWishList($wishList);

        $this->toCreate = $this->toRemove = [];

        return $this;
    }
}