<?php

namespace PE\Component\ECommerce\WaitList\Loader;

use PE\Component\ECommerce\Customer\Loader\CustomerLoaderInterface;
use PE\Component\ECommerce\WaitList\Repository\WaitListRepositoryInterface;

class WaitListLoader implements WaitListLoaderInterface
{
    /**
     * @var WaitListRepositoryInterface
     */
    protected $waitListRepository;

    /**
     * @var CustomerLoaderInterface
     */
    private $customerLoader;

    /**
     * @param WaitListRepositoryInterface $waitListRepository
     * @param CustomerLoaderInterface     $customerLoader
     */
    public function __construct(
        WaitListRepositoryInterface $waitListRepository,
        CustomerLoaderInterface $customerLoader
    ) {
        $this->waitListRepository = $waitListRepository;
        $this->customerLoader     = $customerLoader;
    }

    /**
     * @inheritDoc
     */
    public function loadWaitList()
    {
        $customer = $this->customerLoader->loadCustomer();
        return $this->waitListRepository->findWaitListByCustomer($this->customerLoader->loadCustomer());
    }
}