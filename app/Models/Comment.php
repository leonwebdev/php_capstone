<?php

namespace App\Models;

use \App\Models\DatabaseQuery;

/**
 * Comment -extend from DatabaseQuery
 */
class Comment extends DatabaseQuery
{
    protected $table = 'comments';

    public function getCommentByPostid(string $post_id = ''): mixed
    {
        $query = "  SELECT *
                    FROM {$this->table}
                    WHERE deleted = 0
                        AND
                        postid = :postid
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':postid', $post_id);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}