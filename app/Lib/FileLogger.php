<?php

namespace App\Lib;

use \App\Lib\Interfaces\ILogger;

class FileLogger implements ILogger
{
    protected static $fh;
    protected $table = 'log';

    public function __construct($dbh)
    {
        self::$dbh = $dbh;
    }

    public function write($event): string|bool
    {
        $query = "INSERT INTO {$this->table}
                    (
                        event
                    )
                    VALUES
                    (
                        :event
                    )
                ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':event', $event);

        $stmt->execute();

        $id = self::$dbh->lastInsertId();

        return $id;
    }
}