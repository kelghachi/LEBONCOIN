<?php

require_once  __DIR__.'/../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../resources/templates');
//$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/../var/cache/twig',));
$twig = new Twig_Environment($loader);