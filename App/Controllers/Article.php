<?php

namespace App\Controllers;

use App\Controller;

class IndexArticle extends Controller
{

    public function handle()
    {
        $this->view->newsObj = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }

}