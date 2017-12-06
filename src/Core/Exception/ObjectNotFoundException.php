<?php

namespace PE\Component\ECommerce\Core\Exception;

class ObjectNotFoundException extends \RuntimeException implements ExceptionInterface
{
    /**
     * @param string $class      Object class which used to find
     * @param string $identifier Identifier which used to find
     */
    public function __construct($class, $identifier)
    {
        parent::__construct(sprintf(
            'Object of class %s with identifier %s not found',
            (string) $class,
            (string) $identifier
        ), 404);
    }
}