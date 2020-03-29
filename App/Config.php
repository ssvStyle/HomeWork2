<?php

namespace App;

class Config
{
    public $settings = null;
    private static $_instance = null;


    private function __construct() {
        $this->settings = include __DIR__ . '/../config.php';
        // приватный конструктор ограничивает реализацию getInstance ()
    }

    protected function __clone() {
// ограничивает клонирование объекта
    }

    static public function getInstance() {
        if(is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function import() {
// ...
    }

    public function get() {
// ...
    }

}