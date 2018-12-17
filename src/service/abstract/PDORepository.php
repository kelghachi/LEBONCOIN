<?php
require_once __DIR__ . '/../PDOInterface.php';
require_once __DIR__ . '/../Logger.php';

abstract class PDORepository implements PDOInterface
{
    const USERNAME = "root";
    const PASSWORD = "";
    const HOST = "localhost";
    const DB = "leboncoin";

    /**
     * @var string
     */
    protected $entityClassName;

    /** @var Logger */
    protected $logger;

    /**
     * PDORepository constructor.
     * @param string $entityClassName
     */
    public function __construct(string $entityClassName)
    {
        $this->entityClassName = $entityClassName;
        $this->logger = new Logger();
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        $username = self::USERNAME;
        $password = self::PASSWORD;
        $host = self::HOST;
        $db = self::DB;
        $connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        return $connection;
    }

    /**
     * @param array $args
     * @return array
     */
    public function getAll(array $args = []): array
    {
        try {
            $connection = $this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM " . $this->entityClassName);
            $stmt->execute($args);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }
        return $result ?? [];
    }

    /**
     * @param array $args
     * @param int $id
     * @return mixed
     */
    public function getEntityById(int $id, array $args = [])
    {
        try {
            $connection = $this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM " . $this->entityClassName . " WHERE id = " . $id);
            $stmt->execute($args);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }

        return $result ?? false;
    }

    /**
     * @param array $columns
     * @param array $values
     * @param array $args
     * @return string
     */
    public function persist(array $columns, array $values, array $args = []): string
    {
        try {
            $connection = $this->getConnection();
            $stmt = $connection->prepare('INSERT INTO ' . $this->entityClassName . '(' . implode(',',
                    $columns) . ')' . 'VALUES' . '(' . implode(',', $values) . ')');
            $stmt->execute($args);
            $lastInsertedId = $connection->lastInsertId();
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }
        return $lastInsertedId ?? '';
    }

    /**
     * @param int $id
     * @param array $values
     * @param array $args
     * @return PDOStatement
     */
    public function update(int $id, array $values, array $args): PDOStatement
    {
        try {
            $connection = $this->getConnection();
            $stmt = $connection->prepare('UPDATE ' . $this->entityClassName . ' SET ' . implode(',',
                    $values) . ' WHERE id = ' . $id);
            $stmt->execute($args);
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }
        return $stmt ?? null;
    }
}