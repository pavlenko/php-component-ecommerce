<?php

namespace PE\Component\ECommerce\Core\Repository;

use PE\Component\Query\Query;

interface RepositoryInterface
{
    /**
     * Return the Entity class name.
     *
     * @return string
     */
    public function getClass();

    /**
     * Get single object by identifier
     *
     * @param string $identifier
     *
     * @return object|null
     */
    public function findOneByID($identifier);

    /**
     * Get multiple objects by identifiers
     *
     * @param string[] $identifiers
     *
     * @return object[]
     */
    public function findAllByID(array $identifiers);

    /**
     * Get single object by custom query
     *
     * @param Query $query
     *
     * @return object|null
     */
    public function findOneBy(Query $query);

    /**
     * Get multiple objects by custom query
     *
     * @param Query $query
     *
     * @return object[]
     */
    public function findAllBy(Query $query);

    /**
     * Get single object by identifier
     *
     * @param string $identifier
     *
     * @return object
     *
     * @throws \RuntimeException If object not found
     */
    public function get($identifier);

    /**
     * Create an empty class instance.
     *
     * @return object
     */
    public function create();

    /**
     * Save an Entity.
     *
     * @param object $object The object to save
     * @param bool   $flush  Flush after saving the object?
     */
    public function save($object, $flush = true);

    /**
     * Delete an Entity.
     *
     * @param object $object The object to delete
     * @param bool   $flush  Flush after deleting the object?
     */
    public function delete($object, $flush = true);
}