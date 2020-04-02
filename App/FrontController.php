<?php
/**
 * Created by PhpStorm.
 * User: ssv
 * Date: 02.04.20
 * Time: 16:10
 */

namespace App;


class FrontController
{
    protected $parts;

    public function __construct($uri)
    {
        $parts = explode('/', $uri);//разбиваем по слешу
        $parts = array_diff($parts, ['']);//убираем пустые значение из массива
        $this->parts = $parts ?: ['index'];//пустая стартовая страница

        if (preg_match_all('~[?]\w*[=]\w*~', end($parts))) {
            array_pop($this->parts);
        }//обрезаем get запрос если он есть

    }

    public function __invoke()
    {
        $action = end($this->parts);

        if (count($this->parts) > 1) {
            array_pop($this->parts);
        }

        $controllerWithoutAction = $this->uriArrTooClassName($this->parts);
        $this->fileClassAndMethodCheck($controllerWithoutAction, $action);
    }

    protected function uriArrTooClassName()
    {
        $name = '';

        foreach ($this->parts as $value) {
            $name = $name . ucfirst($value);
        }
        return $name;
    }

    protected function fileClassAndMethodCheck($className, $methodName)
    {
        $controllerFile = __DIR__ . '/../App/Controllers/' . $className . '.php';
        $className = '\App\Controllers\\' . $className;

        if (file_exists($controllerFile) && class_exists($className)) {
            $ctrl = new $className();
            if (method_exists($ctrl, $methodName)) {
                $ctrl->action($methodName);
            } else {
                $ctrl();
            }
        } else {

            throw new \App\NotFound($className . '|' . $methodName);

        }

    }



}