<?php

namespace App\Controllers;

use App\Controller;
use App\NotFound;

class Article extends Controller
{

    public function handle()
    {
        throw new NotFound($_GET['id']);
    }

    public function show()
    {
        $this->view->newsObj = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }

}