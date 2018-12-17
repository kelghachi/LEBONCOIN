<?php

require_once __DIR__ . '/abstract/PDORepository.php';

/**
 * Class AddressService
 */
class AddressService extends PDORepository
{

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        parent::__construct(Address::class);
    }

    /**
     * @param int $contactId
     * @return array
     */
    public function getAddressesByContact(int $contactId): array
    {
        $result = false;
        try {
            $connection = $this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM " . $this->entityClassName .
                " WHERE contact_id = :id");
            $stmt->execute(['id' => $contactId]);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }
        return (false !== $result) ? $result : [];
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getAddressById(int $id)
    {
        return $this->getEntityById($id);
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
     * @param int $contactId
     * @param array $addresses
     * @param array $values
     * @param array $columns
     * @return array
     */
    public function createAll(int $contactId, array $addresses, array $columns, array $values): array
    {
        try {
            foreach ($addresses as $key => $address) {
                $args = [':address' => strtoupper($address), ':contact' => $contactId];
                $results[] = $this->create($columns, $values, $args);
            }
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }

        return $results ?? [];
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
}
