<?php

namespace PE\Component\ECommerce\Core\Exception;

class ImplementationRequiredException extends \LogicException implements ExceptionInterface
{
    /**
     * @inheritDoc
     */
    public function __construct($requirement)
    {
        parent::__construct(sprintf('Implementation of %s is required', $requirement));
    }
}