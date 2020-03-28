<?php

include __DIR__ . '/autoload.php';

$db = new App\Db();

$article =new \App\Models\Article();

$article->title = 'Новая запись';
$article->content = 'Опять что-то новенькое)))';


$article->insert();

var_dump($article);die;

$news = new \App\Models\Article();
$data = $news->findLast(3);

include __DIR__ . '/templates/index.php';