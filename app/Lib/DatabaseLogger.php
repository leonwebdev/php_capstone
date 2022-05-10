<?php

namespace App\Lib;

use \App\Lib\Interfaces\ILogger;

class DatabaseLogger implements ILogger
{
    protected static $dbh;
    protected $table = 'log';

    /**
     * constructon function
     *
     * @param  mixed $dbh
     *   database handle
     *
     * @return void
     *   void
     */
    public function __construct($dbh)
    {
        self::$dbh = $dbh;
    }

    /**
     * Write an event into database
     *
     * @param  string $event
     *   event string to write
     *
     * @return string
     *   last insert id
     */
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

    /**
     * get Recent Ten Entries
     *
     * @return array
     *   Recent Ten Entries
     */
    public function getRecentTenEntries(): array
    {
        $query = "SELECT
                    event
                  FROM
                    {$this->table}
                  ORDER BY id DESC
                  LIMIT 10
                ";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}