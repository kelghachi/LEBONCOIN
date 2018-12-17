<?php

require_once __DIR__ . "/../../service/ContactService.php";
require_once __DIR__ . "/../../service/Logger.php";

if (isset($_POST['id']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])) {
    $firstName = ucfirst($_POST['firstName']);
    $lastName = ucfirst($_POST['lastName']);
    $email = strtolower($_POST['email']);

    $contactService = new ContactService();
    $values = ['firstName = :firstName', 'lastName = :lastName', 'email = :email'];
    $args = ['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email];

    $result = $contactService->update($_POST['id'], $values, $args);
    header('Location: http://localhost/LEBONCOIN');
    exit();
}
$logger = new Logger();
$logger->log('Edit Contact : No data to edit', 'ERROR');
header('Location: ' . $_SERVER['HTTP_REFERER']);
