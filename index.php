<?php

include __DIR__ . '/autoload.php';

use App\Models\Article;

$db = new App\Db();

$article = new Article;

$view = new \App\View();
$view->articles = $article->findLast(3);

$view->display(__DIR__ . '/templates/index.php');

foreach ($view as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}