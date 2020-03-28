<?php

include __DIR__ . '/autoload.php';

$newsObj = App\Models\Article::findById($_GET['id']);

include __DIR__ . '/templates/article.php';