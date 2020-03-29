<?php

namespace App;
/**
 * Class View
 * @package App
 *
 * @property Array $data
 */
class View implements \Countable, \ArrayAccess
{
    protected $data = [];

    use RandomProperty;

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function count()
    {
        return count($this->data);
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return$this->data[$offset] ?? nul;
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
       unset($this->data[$offset]);
    }
}