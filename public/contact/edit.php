<?php

require_once __DIR__ . '/../../config/twigLoader.php';
require_once __DIR__ . "/../../src/service/UserService.php";
require_once __DIR__ . "/../../src/service/ContactService.php";
require_once __DIR__ . "/../../src/service/AddressService.php";

session_start();

if (isset($_GET['id'])) {
    $userService = new UserService();
    $contactService = new ContactService();
    $addressService = new AddressService();
    $user = $userService->getUserById($_SESSION['userid']);
    $contact = $contactService->getContactById($_GET['id']);
    $addresses = $addressService->getAddressesByContact($_GET['id']);

    echo $twig->render('Contact/create.html.twig',
        [
            'action' => 'Edit',
            'id' => $_GET['id'],
            'formAction' => 'http://localhost/LEBONCOIN/src/action/contact/edit.php',
            'user' => $user,
            'contact' => $contact,
            "addresses" => $addresses,
            'host' => $_SERVER['HTTP_HOST']
        ]
    );
}
