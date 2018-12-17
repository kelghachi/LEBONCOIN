<?php

require_once 'config/twigLoader.php';
session_start();

if (isset($_SESSION['userid'])) {
    header('Location: http://localhost/LEBONCOIN/public/contact/list.php');
    exit();
}

echo $twig->render("index.html.twig", ['host' => $_SERVER['HTTP_HOST']]);