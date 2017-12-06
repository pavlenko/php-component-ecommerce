<?php

namespace PE\Component\ECommerce\Category\Controller;

//TODO think of how to implement
use PE\Component\Query\Query;

class CategoryController
{
    /**
     * This mode used when products shows for each category in hierarchy (category used as filter)
     */
    const MODE_FILTER = 0;

    /**
     * This mode used when products shows only on final category, on mediate category shows its child categories
     */
    const MODE_HIERARCHY = 1;

    private $mode;

    public function getProducts($categoryID = null, $sort = null, $limit = null, $offset = null)
    {
        $category = $categoryID ? $this->categoryRepository->get($categoryID) : null;

        if ($this->mode === static::MODE_HIERARCHY) {
            //TODO get child categories
        } else {
            //TODO get child products
            //TODO validate pagination (out of range)
        }

        $query = Query::create()
            ->limit($limit)
            ->offset($offset);

        $products = $this->productRepository->findAllBy($query);

        //TODO filter by category, properties
        //TODO add ProductCategory entity
        //TODO use category in filter mode (show products at each level) and in hierarchy mode (show products only in final category)
        return $this->catalogFactory->buildView();
    }
}