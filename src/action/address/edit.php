<?php

require_once __DIR__ . "/../../service/AddressService.php";
require_once __DIR__ . "/../../service/Logger.php";

if (isset($_POST['id']) && isset($_POST['address'])) {
    $id = $_POST['id'];
    $address = $_POST['address'];

    $addressService = new AddressService();
    $values = ['address = :address'];
    $args = ['address' => strtoupper($address)];

    $result = $addressService->update($_POST['id'], $values, $args);
    header('Location: http://localhost/LEBONCOIN');
    exit();
}
$logger = new Logger();
$logger->log('Modification of address impossible : no id or address sent', 'INFO');
header('Location: ' . $_SERVER['HTTP_REFERER']);
