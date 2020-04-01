<?php

include __DIR__ . '/../App/autoload.php';


$uri = $_SERVER['REQUEST_URI'];//получаем uri

$parts = explode('/', $uri);//разбиваем по слешу

$parts = array_diff($parts, ['']);

$parts = $parts ?: ['index'];




try {
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
            throw new \App\NotFound($className . '|' . $methodName);
        }

    }

    $action = end($parts);

    if (count($parts)>1){
        array_pop($parts);
    }

    $controllerWithoutAction = uriArrTooClassName($parts);

    fileClassAndMethodCheck($controllerWithoutAction, $action);

} catch (\App\DbExeception $error){

    $index = new \App\Controllers\Index();
    $index->error($error->getMessage());

} catch (\App\NotFound $error){

    $index = new \App\Controllers\Index();
    $log = new App\Loger($error->getFile(), $error->getLine(), $error->getMessage());
    $log->add();


    $index->notFound();

}




//$ex = new \App\DbExeception('Что-то сломалось');
//echo '<pre>';
//var_dump($ex->getMessage());
//echo  '</pre>';