<?php

namespace PE\Component\ECommerce\WaitList\Manager;

use PE\Component\ECommerce\Customer\Loader\CustomerLoaderInterface;
use PE\Component\ECommerce\Product\Repository\ProductRepositoryInterface;
use PE\Component\ECommerce\WaitList\Repository\WaitListElementRepositoryInterface;
use PE\Component\ECommerce\WaitList\Repository\WaitListRepositoryInterface;

class WaitListManager
{
    /**
     * @var CustomerLoaderInterface
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
     * @var WaitListElementRepositoryInterface
     */
    private $waitListElementRepository;

    /**
     * @param CustomerLoaderInterface            $customerLoader
     * @param ProductRepositoryInterface         $productRepository
     * @param WaitListRepositoryInterface        $waitListRepository
     * @param WaitListElementRepositoryInterface $waitListElementRepository
     */
    public function __construct(
        CustomerLoaderInterface $customerLoader,
        ProductRepositoryInterface $productRepository,
        WaitListRepositoryInterface $waitListRepository,
        WaitListElementRepositoryInterface $waitListElementRepository
    ) {
        $this->customerLoader            = $customerLoader;
        $this->productRepository         = $productRepository;
        $this->waitListRepository        = $waitListRepository;
        $this->waitListElementRepository = $waitListElementRepository;
    }

    /**
     * @param string $productID
     */
    public function addProduct($productID)
    {
        $customer = $this->customerLoader->loadCustomer();
        $product  = $this->productRepository->findProductByID($productID);

        if ($customer && $product) {
            $waitList = $this->waitListRepository->findByCustomer($customer);

            if (!$waitList) {
                $waitList = $this->waitListRepository->createWaitList($customer);
            }

            $waitList->addElement($this->waitListElementRepository->createWaitListElement($product));

            $this->waitListRepository->updateWaitList($waitList);
        }
    }

    /**
     * @param string $productID
     */
    public function removeProduct($productID)
    {
        $customer = $this->customerLoader->loadCustomer();
        $product  = $this->productRepository->findProductByID($productID);

        if ($customer && $product) {
            $waitList = $this->waitListRepository->findByCustomer($customer);

            if ($waitList) {
                $waitListElement = $this->waitListElementRepository->findByWaitListAndProduct($waitList, $product);

                if ($waitListElement) {
                    $this->waitListRepository->updateWaitList($waitList->removeElement($waitListElement));
                    $this->waitListElementRepository->removeWaitListElement($waitListElement);
                }
            }
        }
    }
}