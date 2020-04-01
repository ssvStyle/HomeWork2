<?php

namespace App\Controllers;

use App\Controller;
use \App\Models\Article;

class Index extends Controller
{

    public function handle()
    {
        $this->allnews();
    }

    public function allnews()
    {
        $article = new Article;
        $this->view->articles = $article->findLast(3);
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

    public function article()
    {
        $this->view->newsObj = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }

    public function error($errorMessage)
    {
        $this->view->error = $errorMessage;
        $this->view->display(__DIR__ . '/../../templates/error.php');
    }

    public function notFound()
    {
        $this->view->display(__DIR__ . '/../../templates/notFound.php');
    }

}