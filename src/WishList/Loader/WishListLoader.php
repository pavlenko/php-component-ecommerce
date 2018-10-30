<?php

namespace PE\Component\ECommerce\WishList\Loader;

use PE\Component\ECommerce\Customer\Loader\CustomerLoaderInterface;
use PE\Component\ECommerce\WishList\Repository\WishListRepositoryInterface;

class WishListLoader implements WishListLoaderInterface
{
    /**
     * @var WishListRepositoryInterface
     */
    protected $wishListRepository;

    /**
     * @var CustomerLoaderInterface
     */
    private $customerLoader;

    /**
     * @param WishListRepositoryInterface $wishListRepository
     * @param CustomerLoaderInterface     $customerLoader
     */
    public function __construct(
        WishListRepositoryInterface $wishListRepository,
        CustomerLoaderInterface $customerLoader
    ) {
        $this->wishListRepository = $wishListRepository;
        $this->customerLoader     = $customerLoader;
    }

    /**
     * @inheritDoc
     */
    public function loadWishList()
    {
        return $this->wishListRepository->findWishListByCustomer($this->customerLoader->loadCustomer());
    }
}