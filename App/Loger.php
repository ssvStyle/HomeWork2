<?php
/**
 * Created by PhpStorm.
 * User: ssv
 * Date: 01.04.20
 * Time: 17:08
 */

namespace App;


use Psr\Log\LoggerInterface;

class Loger implements LoggerInterface
{

    /*public function __construct($whereFile, $whereLine, $errorMessage)
    {
        $this->whereFile = $whereFile;
        $this->whereLine = $whereLine;
        $this->errorMessage = $errorMessage;
        $this->date = date("Y-m-d H:i:s");
    }


    public function add()
    {
        $logFile = __DIR__ . '/../public/log';

        $newLogLine = $this->date . '-|-' . $this->whereFile . '-|-' . $this->whereLine . '-|-' . $this->errorMessage . '-|-' . PHP_EOL;

        file_put_contents($logFile, $newLogLine, FILE_APPEND);
    }*/

    /**
     * System is unusable.
     *
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function emergency($message, array $context = array())
    {
        // TODO: Implement emergency() method.
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function alert($message, array $context = array())
    {

    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function critical($message, array $context = array())
    {
        // TODO: Implement critical() method.
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function error($message, array $context = array())
    {
        // TODO: Implement error() method.
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function warning($message, array $context = array())
    {
        // TODO: Implement warning() method.
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function notice($message, array $context = array())
    {
        // TODO: Implement notice() method.
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function info($message, array $context = array())
    {
        // TODO: Implement info() method.
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function debug($message, array $context = array())
    {
        // TODO: Implement debug() method.
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param mixed[] $context
     *
     * @return void
     *
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function log($level, $message, array $context = array())
    {
        $this->$level($message, $context);

        $logFile = __DIR__ . '/../public/log';

        $newLogLine = $level . '-|-'
                        . date("Y-m-d H:i:s") . '-|-'
                        . $message
                        . '-|-' . implode(',',$context)
                        . '-|-' . PHP_EOL;

        file_put_contents($logFile, $newLogLine, FILE_APPEND);


    }
}