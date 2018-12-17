<?php

require_once __DIR__ . '/../../config/twigLoader.php';
require_once __DIR__ . "/../../src/service/UserService.php";

session_start();

$userService = new UserService();
$user = $userService->getUserById($_SESSION['userid']);

echo $twig->render('Contact/create.html.twig',
    [
        'action' => 'Add',
        'id' => $_SESSION['userid'],
        'formAction' => 'http://' . $_SERVER['HTTP_HOST'] . '/LEBONCOIN/src/action/contact/create.php',
        'host' => $_SERVER['HTTP_HOST'],
        'user' => $user,
    ]
);