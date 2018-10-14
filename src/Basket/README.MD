### Usage

```php
<?php

use PE\Component\ECommerce\Core\ECommerce;
use PE\Component\ECommerce\Basket\Loader\BasketLoader;
use PE\Component\ECommerce\Basket\Repository\BasketRepositoryInterface;
use PE\Component\ECommerce\Basket\BasketPlugin;
use PE\Component\SimpleDI\Container;
use PE\Component\SimpleDI\ServiceProviderInterface;

// Initialize anywhere core E-Commerce object
$ec = new ECommerce();

// Add basket plugin
$ec->register(new BasketPlugin());

// Add required implementations via custom plugin
class ConcreteBasketPlugin implements ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(Container $c)
    {
        $c->set(BasketRepositoryInterface::class, $c->service(function () {
            return new ConcreteBasketRepository();
        }));

        $c->set(BasketLoader::class, $c->service(function () {
            return new ConcreteBasketLoader();
        }));
    }
}

$ec->register(new ConcreteBasketPlugin());
```

### TODO
- remove container usage and add full usage to readme
- maybe create root object for each plugin for retrieve specific parts (factories, repositories, controllers) 