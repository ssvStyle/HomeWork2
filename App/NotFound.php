<?php

namespace App;


use Throwable;

class NotFound extends \Exception
{

    public function __construct($uri, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = 'Not found: '.$uri;
    }


}