<?php

interface PDOInterface
{
    /**
     * Persist an entity
     *
     * @param array $columns
     * @param array $values
     * @param array $args
     * @return string
     */
    public function persist(array $columns, array $values, array $args = []): string;

    /**
     * Updates an entity
     *
     * @param int $id
     * @param array $values
     * @param array $args
     * @return PDOStatement
     */
    public function update(int $id, array $values, array $args): PDOStatement;

    /**
     * Create and return an PDO instance
     * @return PDO
     */
    public function getConnection(): PDO;

    /**
     * Return a list of entities
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Return an element by it's id
     *
     * @param int $id
     * @return mixed
     */
    public function getEntityById(int $id);
}