<?php

include_once 'abstract/Person.php';
require_once 'User.php';

/**
 * Class Contact
 */
class Contact extends Person
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var iterable|Address[]
     */
    private $addresses;

    /**
     * @var User
     */
    private $user;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return iterable
     */
    public function getAddresses(): iterable
    {
        return $this->addresses;
    }

    /**
     * @param iterable $addresses
     * @return Contact
     */
    public function setAddresses(iterable $addresses): Contact
    {
        $this->addresses = $addresses;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Contact
     */
    public function setUser(User $user): Contact
    {
        $this->user = $user;
        return $this;
    }
}
