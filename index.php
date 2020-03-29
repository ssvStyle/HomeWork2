<?php

include __DIR__ . '/autoload.php';

$db = new App\Db();

$article = new \App\Models\Article;

$news = new \App\Models\Article();

$view = new \App\View();
$view->articles = $news->findLast(3);

$view->display(__DIR__ . '/templates/index.php');