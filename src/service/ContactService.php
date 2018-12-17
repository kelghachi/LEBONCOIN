<?php

require_once __DIR__ . '/abstract/PDORepository.php';

/**
 * Class ContactService
 */
class ContactService extends PDORepository
{

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        parent::__construct(Contact::class);
    }

    /**
     * @param User $user
     * @return array
     */
    public function getContactsByUser(User $user): array
    {
        $result = false;
        try {
            $connection = $this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM " . $this->entityClassName .
                " WHERE user_id = :id");
            $stmt->execute(['id' => $user->getId()]);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }

        return (false !== $result) ? $result : [];
    }

    /**
     * @param array $columns
     * @param array $values
     * @param array $args
     * @return PDOStatement
     */
    public function create(array $columns, array $values, array $args): string
    {
        return $this->persist($columns, $values, $args);
    }

    /**
     * @param int $id
     * @param array $values
     * @param array $args
     * @return PDOStatement
     */
    public function update(int $id, array $values, array $args): PDOStatement
    {
        return parent::update($id, $values, $args);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getContactById(int $id)
    {
        return parent::getEntityById($id);
    }

    /**
     * @param string $text
     * @return bool
     */
    public function isPalindrome(string $text)
    {
        try {
            $result = strrev($text) === $text;
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }
        return $result ?? false;
    }
}
