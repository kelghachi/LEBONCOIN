<?php

require_once __DIR__ . '/abstract/PDORepository.php';
require_once __DIR__ . '/../entity/User.php';

/**
 * Class UserService
 */
class UserService extends PDORepository
{

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        parent::__construct(User::class);
    }

    /**
     * @param string $login
     * @param string $password
     * @return null|User
     */
    public function getUserByLoginAndPassword(string $login, string $password)
    {
        try {
            $connection = $this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM " . $this->entityClassName .
                " WHERE login = :login and password = :password");
            $stmt->execute(['login' => $login, 'password' => $password]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if (false !== $result) {
                $user = $this->mapUser($result);
            }
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }

        return $user ?? null;
    }

    /**
     * @param int $id
     * @return User
     */
    public function getUserById(int $id): User
    {
        $user = $this->getEntityById($id);
        return (false !== $user) ? $this->mapUser($user) : null;
    }

    public function getAll(array $args = []): array
    {
        return parent::getAll($args);
    }

    /**
     * @param stdClass $userObject
     * @return User
     */
    private function mapUser(stdClass $userObject)
    {
        try {
            $user = new User();
            $user->setLogin($userObject->login)
                ->setId($userObject->id)
                ->setFirstName($userObject->firstName)
                ->setLastName($userObject->lastName);
        } catch (Exception $exception) {
            $this->logger->log($exception->getMessage(), Logger::$ERROR);
        }

        return $user ?? null;
    }
}