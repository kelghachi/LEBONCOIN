<?php

require_once __DIR__ . '/../Validator.php';

$validator = new Validator();
$result = $validator->validateEmail($_SERVER["REQUEST_METHOD"], $_GET['email']);

echo json_encode($result);