<?php

require_once 'Contact.php';

class Address
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $address;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * Address constructor.
     * @param int $id
     * @param string $address
     */
    public function __construct(int $id, string $address)
    {
        $this->id = $id;
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Address
     */
    public function setId(int $id): Address
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Address
     */
    public function setAddress(string $address): Address
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Address
     */
    public function setContact(Contact $contact): Address
    {
        $this->contact = $contact;
        return $this;
    }
}