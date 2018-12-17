<?php

require_once __DIR__ . '/../../config/twigLoader.php';
require_once __DIR__ . "/../../src/service/UserService.php";
require_once __DIR__ . "/../../src/service/ContactService.php";
session_start();

if (isset($_SESSION['userid'])) {
    $userService = new UserService();
    $contactService = new ContactService();
    $user = $userService->getUserById($_SESSION['userid']);
    $user->setContacts($contactService->getContactsByUser($user));
    echo $twig->render("Contact/list.html.twig",
        [
            'user' => $user,
            'host' => $_SERVER['HTTP_HOST']
        ]);
    exit();
}
header('Location: http://localhost/LEBONCOIN');
