<?php

require_once __DIR__ . '/../../config/twigLoader.php';
require_once __DIR__ . "/../../src/service/UserService.php";
require_once __DIR__ . "/../../src/service/ContactService.php";
require_once __DIR__ . "/../../src/service/AddressService.php";

session_start();

if (isset($_GET['id'])) {
    $userService = new UserService();
    $addressService = new AddressService();
    $address = $addressService->getAddressById($_GET['id']);
    $user = $userService->getUserById($_SESSION['userid']);

    echo $twig->render('Address/edit.html.twig',
        [
            'id' => $_GET['id'],
            'formAction' => 'http://localhost/LEBONCOIN/src/action/address/edit.php',
            'user' => $user,
            'address' => $address,
            'host' => $_SERVER['HTTP_HOST']
        ]
    );
}
