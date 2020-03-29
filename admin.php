<?php

include __DIR__ . '/autoload.php';

$allNews = App\Models\Article::findAll();

if (isset($_GET['edit'])){
    $article = App\Models\Article::findById($_GET['edit']);
}


if (isset($_POST['add'])){
    $article = new App\Models\Article();
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
        if ($_POST['id'] !== '') {
            $article->id = $_POST['id'];
        }
$article->save();
header('Location: admin.php');
}

if (isset($_GET['delete'])){
    $article = new App\Models\Article();
    $article->delete($_GET['delete']);
    header('Location: admin.php');
}


include __DIR__ . '/templates/admin.php';

//var_dump($article);