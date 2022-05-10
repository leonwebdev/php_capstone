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

    /**
     * get all Comments By this User-id
     *
     * @param string $user_id
     *   user id
     *
     * @return mixed
     *   All comments relating to this user
     */
    public function getCommentsByUserid(string $user_id = ''): mixed
    {
        $query = "  SELECT *
                    FROM {$this->table}
                    WHERE deleted = 0
                        AND
                        userid = :userid
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':userid', $user_id);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Insert a new comment into database
     *
     * @param string $postid post id to insert a new comment
     * @param string $userid user id who want to insert a new comment
     * @param string $content the comment content
     * @return string last insert id
     */
    public function create(string $postid = '', string $userid = '', string $content = ''): string
    {
        $query = "INSERT INTO {$this->table}
                    (
                        postid,
                        userid,
                        content
                    )
                    VALUES
                    (
                        :postid,
                        :userid,
                        :content
                    )
        ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':postid', $postid);
        $stmt->bindValue(':userid', $userid);
        $stmt->bindValue(':content', $content);

        $stmt->execute();

        $id = self::$dbh->lastInsertId();

        return $id;
    }
}