<?php

namespace PE\Component\ECommerce\WaitList\Factory;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Loader\CustomerLoader;
use PE\Component\ECommerce\Product\Entity\Product;
use PE\Component\ECommerce\Product\Factory\ProductFactoryExtensionInterface;
use PE\Component\ECommerce\WaitList\Repository\WaitListRepositoryInterface;

class ProductFactoryExtension implements ProductFactoryExtensionInterface
{
    /**
     * @var WaitListRepositoryInterface
     */
    private $waitListRepository;

    /**
     * @var CustomerLoader
     */
    private $customerLoader;

    /**
     * @param WaitListRepositoryInterface $waitListRepository
     * @param CustomerLoader     $customerLoader
     */
    public function __construct(WaitListRepositoryInterface $waitListRepository, CustomerLoader $customerLoader)
    {
        $this->waitListRepository = $waitListRepository;
        $this->customerLoader     = $customerLoader;
    }

    /**
     * @inheritDoc
     */
    public function buildProductView(View $view, Product $product, array $options)
    {
        $customer = $this->customerLoader->load();
        $waitList = $this->waitListRepository->findByCustomer($customer);

        $ids = [];
        if ($waitList) {
            $ids = array_map(function (Product $product) {
                return $product->getId();
            }, $waitList->getProducts());
        }

        $view->vars = array_replace($view->vars, [
            'in_wait_list' => in_array($product->getId(), $ids, false),
        ]);
    }
}