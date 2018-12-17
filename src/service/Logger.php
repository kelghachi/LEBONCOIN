<?php

/**
 * Class Logger
 */
class Logger
{
    static $ERROR = 'ERROR';
    static $INFO = 'INFO';

    private $logDir = '/../../var/logs/';

    /**
     * @param string $message
     * @param string $level
     */
    public function log(string $message, string $level)
    {
        $log = $level . ' : ' . $message;
        file_put_contents(
            __DIR__ . $this->logDir . 'log_' . date("j.n.Y") . '.log',
            $log, FILE_APPEND);
    }

    /**
     * @return string
     */
    public function getLogDir(): string
    {
        return $this->logDir;
    }

    /**
     * @param string $logDir
     * @return Logger
     */
    public function setLogDir(string $logDir): Logger
    {
        $this->logDir = $logDir;
        return $this;
    }
}