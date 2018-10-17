<?php

namespace PE\Component\ECommerce\WishList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Loader\CustomerLoader;
use PE\Component\ECommerce\Product\Entity\Product;
use PE\Component\ECommerce\Product\Factory\ProductFactoryExtensionInterface;
use PE\Component\ECommerce\WishList\Repository\WishListRepositoryInterface;

class ProductFactoryExtension implements ProductFactoryExtensionInterface
{
    /**
     * @var WishListRepositoryInterface
     */
    private $wishListRepository;

    /**
     * @var CustomerLoader
     */
    private $customerLoader;

    /**
     * @param WishListRepositoryInterface $wishListRepository
     * @param CustomerLoader     $customerLoader
     */
    public function __construct(WishListRepositoryInterface $wishListRepository, CustomerLoader $customerLoader)
    {
        $this->wishListRepository = $wishListRepository;
        $this->customerLoader     = $customerLoader;
    }

    /**
     * @inheritDoc
     */
    public function buildProductView(View $view, Product $product, array $options)
    {
        $customer = $this->customerLoader->load();
        $wishList = $this->wishListRepository->findWishListByCustomer($customer);

        $ids = [];
        if ($wishList) {
            $ids = array_map(function (Product $product) {
                return $product->getId();
            }, $wishList->getProducts());
        }

        $view->vars = array_replace($view->vars, [
            'in_wish_list' => in_array($product->getId(), $ids, false),
        ]);
    }
}