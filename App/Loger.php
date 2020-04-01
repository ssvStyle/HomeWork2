<?php
/**
 * Created by PhpStorm.
 * User: ssv
 * Date: 01.04.20
 * Time: 17:08
 */

namespace App;


class Loger
{

    protected $whereFile, $whereLine, $errorMessage, $date;

    public function __construct($whereFile, $whereLine, $errorMessage)
    {
        $this->whereFile = $whereFile;
        $this->whereLine = $whereLine;
        $this->errorMessage = $errorMessage;
        $this->date = date("Y-m-d H:i:s");
    }


    public function add(){
        $logFile = __DIR__ . '/../public/log';

        $newLogLine = $this->date . '-|-' . $this->whereFile . '-|-' . $this->whereLine . '-|-' . $this->errorMessage . '-|-' . PHP_EOL;

        file_put_contents($logFile, $newLogLine, FILE_APPEND);
    }

}