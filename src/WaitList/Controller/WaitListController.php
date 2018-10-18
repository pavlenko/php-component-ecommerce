<?php

namespace PE\Component\ECommerce\WaitList\Controller;

use PE\Component\ECommerce\Core\View\View;
use PE\Component\ECommerce\Customer\Loader\CustomerLoader;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use PE\Component\ECommerce\WaitList\Entity\WaitList;
use PE\Component\ECommerce\WaitList\Factory\WaitListFactory;
use PE\Component\ECommerce\WaitList\Repository\WaitListRepositoryInterface;

class WaitListController
{
    /**
     * @var WaitListFactory
     */
    private $waitListFactory;

    /**
     * @var CustomerLoader
     */
    private $customerLoader;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var WaitListRepositoryInterface
     */
    private $waitListRepository;

    /**
     * @param WaitListFactory    $waitListFactory
     * @param WaitListRepositoryInterface $waitListRepository
     * @param CustomerLoader     $customerLoader
     * @param ProductRepositoryInterface  $productRepository
     */
    public function __construct(
        WaitListFactory $waitListFactory,
        WaitListRepositoryInterface $waitListRepository,
        CustomerLoader $customerLoader,
        ProductRepositoryInterface $productRepository
    ) {
        $this->waitListFactory    = $waitListFactory;
        $this->waitListRepository = $waitListRepository;
        $this->customerLoader     = $customerLoader;
        $this->productRepository  = $productRepository;
    }

    /**
     * @return View
     */
    public function getWaitList()
    {
        $customer = $this->customerLoader->load();
        $wishList = $this->waitListRepository->findWaitListByCustomer($customer);

        if (!$wishList) {
            $wishList = $this->waitListRepository->create();
            $wishList->setCustomer($customer);
        }

        return $this->waitListFactory->createView($wishList);
    }

    /**
     * @param int $productID
     */
    public function addProduct($productID)
    {
        $customer = $this->customerLoader->load();
        $product  = $this->productRepository->get($productID);

        $waitList = $this->waitListRepository->findWaitListByCustomer($customer);

        if (!$waitList) {
            $waitList = new WaitList();
            $waitList->setCustomer($customer);
        }

        $this->waitListRepository->save($waitList->addProduct($product));
    }

    /**
     * @param int $productID
     */
    public function removeProduct($productID)
    {
        $customer = $this->customerLoader->load();
        $product  = $this->productRepository->get($productID);

        $waitList = $this->waitListRepository->findWaitListByCustomer($customer);

        if ($waitList) {
            $this->waitListRepository->save($waitList->removeProduct($product));
        }
    }
}