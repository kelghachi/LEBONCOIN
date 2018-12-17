<?php

require_once __DIR__ . "/../../service/UserService.php";
require_once __DIR__ . "/../../service/ContactService.php";
require_once __DIR__ . "/../../service/Logger.php";
require_once __DIR__ . '/../../../config/twigLoader.php';

session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $userService = new UserService();
    $logger = new Logger();
    $user = $userService->getUserByLoginAndPassword($login, $password);
    if (is_null($user)) {
        $logger->log('Login : login or password incorrect', 'ERROR');
        header('Location: http://localhost/LEBONCOIN');
        exit();
    }
    $_SESSION['userid'] = $user->getId();
    header('Location: http://localhost/LEBONCOIN/public/contact/list.php');
    exit();
}
header('Location: http://localhost/LEBONCOIN');
exit();

