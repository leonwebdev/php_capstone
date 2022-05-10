<?php

namespace App\Lib;

use \App\Lib\Interfaces\ILogger;

class FileLogger implements ILogger
{
    /**
     * file handle
     *
     * @var mixed
     */
    protected static $fh;

    /**
     * construct function
     *
     * @param mixed $fh
     *   file handle
     *
     * @return void
     *   void
     */
    public function __construct($fh)
    {
        self::$fh = $fh;
    }

    /**
     * write an event into log file
     *
     * @param string $event
     *   event string to write
     *
     * @return void
     *   void
     */
    public function write($event): void
    {
        fputs(self::$fh, $event . "\n");

        fclose(self::$fh);
    }
}