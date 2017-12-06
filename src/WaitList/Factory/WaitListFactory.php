<?php

namespace PE\Component\ECommerce\WaitList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Factory\CustomerFactory;
use PE\Component\ECommerce\Product\Entity\Product;
use PE\Component\ECommerce\Product\Factory\ProductFactory;
use PE\Component\ECommerce\WaitList\Entity\WaitList;

class WaitListFactory
{
    /**
     * @var CustomerFactory
     */
    private $customerFactory;

    /**
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * @param CustomerFactory $customerFactory
     * @param ProductFactory  $productFactory
     */
    public function __construct(CustomerFactory $customerFactory, ProductFactory $productFactory)
    {
        $this->customerFactory = $customerFactory;
        $this->productFactory  = $productFactory;
    }

    /**
     * @param WaitList $wishList
     * @param array    $options
     *
     * @return View
     */
    public function createView(WaitList $wishList, array $options = [])
    {
        $view = new View([
            'customer' => $this->customerFactory->createView($wishList->getCustomer()),
            'products' => array_map(function (Product $product) {
                return $this->productFactory->createView($product);
            }, $wishList->getProducts()),
        ]);

        return $view;
    }
}