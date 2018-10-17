<?php

namespace PE\Component\ECommerce\WishList\Controller;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Loader\CustomerLoader;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use PE\Component\ECommerce\WishList\Factory\WishListFactory;
use PE\Component\ECommerce\WishList\Repository\WishListRepositoryInterface;

class WishListController
{
    /**
     * @var WishListFactory
     */
    private $wishListFactory;

    /**
     * @var WishListRepositoryInterface
     */
    private $wishListRepository;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var CustomerLoader
     */
    private $customerLoader;

    /**
     * @param WishListFactory    $wishListFactory
     * @param WishListRepositoryInterface $wishListRepository
     * @param ProductRepositoryInterface  $productRepository
     * @param CustomerLoader     $customerLoader
     */
    public function __construct(
        WishListFactory $wishListFactory,
        WishListRepositoryInterface $wishListRepository,
        ProductRepositoryInterface $productRepository,
        CustomerLoader $customerLoader
    ) {
        $this->wishListFactory    = $wishListFactory;
        $this->wishListRepository = $wishListRepository;
        $this->productRepository  = $productRepository;
        $this->customerLoader     = $customerLoader;
    }

    /**
     * @return View
     */
    public function getWishList()
    {
        $customer = $this->customerLoader->load();
        $wishList = $this->wishListRepository->findWishListByCustomer($customer);

        if (!$wishList) {
            $wishList = $this->wishListRepository->create();
            $wishList->setCustomer($customer);
        }

        return $this->wishListFactory->createView($wishList);
    }

    /**
     * @param $productID
     */
    public function addProduct($productID)
    {
        $product  = $this->productRepository->get($productID);
        $customer = $this->customerLoader->load();
        $wishList = $this->wishListRepository->findWishListByCustomer($customer);

        if (!$wishList) {
            $wishList = $this->wishListRepository->create();
            $wishList->setCustomer($customer);
        }

        $this->wishListRepository->save($wishList->addProduct($product));
    }

    /**
     * @param $productID
     */
    public function removeProduct($productID)
    {
        $product  = $this->productRepository->get($productID);
        $customer = $this->customerLoader->load();
        $wishList = $this->wishListRepository->findWishListByCustomer($customer);

        if ($wishList) {
            $this->wishListRepository->save($wishList->removeProduct($product));
        }
    }
}