<?php

include __DIR__ . '/../App/autoload.php';


$uri = $_SERVER['REQUEST_URI'];//получаем uri

$parts = explode('/', $uri);//разбиваем по слешу

$parts = array_diff($parts, ['']);

if (preg_match_all('~[?]\w*[=]\w*~', end($parts))){
    array_pop($parts);
}//обрезаем get запрос если он есть

function uriArrTooClassName($parts)
{
    $name = '';

    foreach ($parts as $value){
            $name = $name . ucfirst($value);
    }
    return $name;
}

function fileClassAndMethodCheck($className, $methodName)
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
        $ctrl = new \App\Controllers\Index();
        $ctrl();
    }

}

$action = end($parts);

if (count($parts)>1){
    array_pop($parts);
}

$controllerWithoutAction = uriArrTooClassName($parts);

fileClassAndMethodCheck($controllerWithoutAction, $action);