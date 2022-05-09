<?php

namespace App\Models;

use \App\Models\DatabaseQuery;

/**
 * Post -extend from DatabaseQuery
 */
class Post extends DatabaseQuery
{
    protected $table = 'posts';

    /**
     * getDbh return the current PDO
     *
     * @return  PDO  return the current PDO
     */
    public function getDbh()
    {
        return self::$dbh;
    }

    /**
     * create a new post record
     *
     * @param   array  $array  input post info to insert into database
     *
     * @return  int            return last insert id
     */
    public function create(array $array): int
    {
        $query = "INSERT INTO {$this->table}
                  (
                      title,
                      authorid,
                      summary,
                      content,
                      image,
                      categoryid,
                      status,
                      allow_comment
                   )
                   VALUES
                   (
                      :title,
                      :authorid,
                      :summary,
                      :content,
                      :image,
                      :categoryid,
                      :status,
                      :allow_comment
                   )";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':title', $array['title']);
        $stmt->bindValue(':authorid', $array['authorid']);
        $stmt->bindValue(':summary', $array['summary']);
        $stmt->bindValue(':content', $array['content']);
        $stmt->bindValue(':image', $array['image']);
        $stmt->bindValue(':categoryid', $array['categoryid']);
        $stmt->bindValue(':status', $array['status']);
        $stmt->bindValue(':allow_comment', $array['allow_comment']);

        $stmt->execute();

        $id = self::$dbh->lastInsertId();

        return $id;
    }
}