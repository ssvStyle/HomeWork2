<?php

include __DIR__ . '/autoload.php';

$db = new App\Db();

$article = \App\Models\Article::findById(4);

//$article->title = 'В Германии нашли уникальный бивень мамонта';
//$article->content = 'Необычность находки в том, что практически полностью сохранившиеся бивни мамонта такой длины – большая редкость. На юге Германии вблизи баварского города Регенсбург археологи обнаружили бивень мамонта длиной почти 2,5 метра. Об этом накануне сообщило земельное ведомство по охране памятников.';



//$article->update();die;


$news = new \App\Models\Article();
$data = $news->findLast(3);

include __DIR__ . '/templates/index.php';