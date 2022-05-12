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

    /**
     * delete a comment record by comment id
     *
     * @param   int|string     $id  comment id
     *
     * @return  string    return a string relating to result:
     *
     * if delete success : Record has been deleted
     *
     * if delete fail : Record still exists
     *
     * if comment id not found : Record Not Found
     */
    public function delete(int|string $id): string
    {
        $query = "UPDATE {$this->table}
                    SET
                    deleted = 1
                    WHERE
                    id = :id";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $check = $this->isDelete($id);

        $message = ($check === 'Deleted') ? 'Record has been deleted'
        : (
            ($check === 'Existed') ? 'Record still exists'
            : 'Record Not Found'
        );

        return $message;
    }

    /**
     * Check if a comment record is deleted
     *
     * @param   int|string  $id  comment id
     *
     * @return  string    return a string relating to result:
     *
     * if delete success : Deleted
     *
     * if delete fail : Existed.
     *
     * if user id not found : No Record Found.
     */
    public function isDelete(int|string $id): string
    {
        $query = "SELECT deleted FROM {$this->table}
                  WHERE {$this->key} = :id";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        $message = ($result === false) ? 'No Record Found'
        : (
            ($result['deleted'] === 1) ? 'Deleted'
            : 'Existed'
        );

        return $message;
    }

    /**
     * get Comment Count By User Id
     *
     * @param string $id User Id
     * @return string|integer Comment Count
     */
    public function getCommentCountByUserId(string $id = ''): string|int
    {
        $query = "  SELECT COUNT({$this->table}.id) AS count
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND userid = :id
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['count'];
    }
}