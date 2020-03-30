<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{

    public function handle()
    {
        $newsObj = \App\Models\Article::findById($_GET['id']);
        include __DIR__ . '/../../templates/article.php';
    }

}