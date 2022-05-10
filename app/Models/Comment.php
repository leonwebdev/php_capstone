<?php

namespace App\Models;

use \App\Models\DatabaseQuery;

/**
 * Comment -extend from DatabaseQuery
 */
class Comment extends DatabaseQuery
{
    protected $table = 'comments';

    /**
     * get all Comments By this Postid
     *
     * @param string $post_id
     *   post id
     *
     * @return mixed
     *   All comments relating to this post
     */
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