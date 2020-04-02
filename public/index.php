<?php

include __DIR__ . '/../App/autoload.php';

use \App\FrontController;

try {

$run = new FrontController($_SERVER['REQUEST_URI']);

$run();

} catch (\App\DbExeception $error) {

    $index = new \App\Controllers\Index();
    $index->error($error->getMessage());

} catch (\App\NotFound $error) {

    $index = new \App\Controllers\Index();
    $log = new App\Loger();
    $log->log(\Psr\Log\LogLevel::INFO, 'Not found' ,[]);
    $index->notFound();

}