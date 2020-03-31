<?php

namespace App\Controllers;


use App\Controller;

class AdminPage extends Controller
{

    public function handle()
    {
        $this->page();
    }

    public function page()
    {
        $this->view->allNews = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/admin.php');
    }

    public function edit()
    {
        if (isset($_GET['id'])){
            $this->view->article = \App\Models\Article::findById($_GET['id']);
            $this->page();
        }
    }

    public function save()
    {
        if (isset($_POST['add'])){
            $article = new \App\Models\Article();
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];

            if ($_POST['id'] !== '') {
                $article->id = $_POST['id'];
            }
            $article->save();
            header('Location: /admin');
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $article = new \App\Models\Article();
            $article->delete($_GET['id']);
            header('Location: /admin');
        }
    }
}