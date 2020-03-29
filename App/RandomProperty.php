<?php
/**
 * Created by PhpStorm.
 * User: ssv
 * Date: 29.03.20
 * Time: 16:25
 */

namespace App;


trait RandomProperty
{

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return $this->data[$name];
    }

}