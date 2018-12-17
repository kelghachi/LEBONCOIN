<?php
//import files
require_once __DIR__ . "/../../entity/Contact.php";
require_once __DIR__ . "/../../service/ContactService.php";
require_once __DIR__ . "/../../service/AddressService.php";
require_once __DIR__ . "/../../service/Logger.php";

if (isset($_POST['id']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])) {
    $firstName = ucfirst($_POST['firstName']);
    $lastName = ucfirst($_POST['lastName']);
    $email = strtolower($_POST['email']);

    $contactService = new ContactService();
    $logger = new Logger();

    if ($contactService->isPalindrome($lastName)) {
        $logger->log('Create Contact : LastName is a palindrome', 'INFO');
        header('Location: http://localhost/LEBONCOIN/public/contact/create.php');
        exit();
    }
    $columns = ['firstName', 'lastName', 'email', 'user_id'];
    $values = [':firstName', ':lastName', ':email', ':user'];
    $args = ['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'user' => $userId];

    $contactId = $contactService->create($columns, $values, $args);
    if (isset($_POST['addresses']) && !empty($contactId)) {
        $columns = ['address', 'contact_id'];
        $values = [':address', ':contact'];
        $addressService = new AddressService();
        $addressService->createAll($contactId, $_POST['addresses'], $columns, $values);
    }
    header('Location: http://localhost/LEBONCOIN');

}