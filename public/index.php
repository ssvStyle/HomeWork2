<?php

include __DIR__ . '/../App/autoload.php';


$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', $uri);
unset($parts[0]);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';
$action = isset($parts[2]) ? $parts[2] : '';

$class = '\App\Controllers\\' . $ctrl;
$ctrl = new $class();

$ctrl->action($action);

