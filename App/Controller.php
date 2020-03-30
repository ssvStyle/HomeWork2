<?php

namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access() : bool
    {
        return true;
    }

    public function action($action){


        if ($this->access()){
            $action ? $this->$action() : $this->handle();
        } else {
            $this->forbidden();
        }
    }

    public function __invoke(){

        if ($this->access()){
            $this->handle();
        } else {
            $this->forbidden();
        }
    }

    protected function forbidden()
    {
        echo $this->view->display(__DIR__.'/../templates/forbidden.php');
    }

    abstract protected function handle();
}