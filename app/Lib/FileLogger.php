<?php

namespace App\Lib;

use \App\Lib\Interfaces\ILogger;

class FileLogger implements ILogger
{
    protected static $fh;

    public function __construct($fh)
    {
        self::$fh = $fh;
    }

    public function write($event): void
    {
        fputs(self::$fh, $event . "\n");

        fclose(self::$fh);
    }
}