<?php

namespace App\Models;

use \App\Models\DatabaseQuery;
use \PDO;

/**
 * Post -extend from DatabaseQuery
 */
class Post extends DatabaseQuery
{
    protected $table = 'posts';

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

    /**
     * get All Posts By CategoryId
     *
     * @param string $id
     *   category id
     *
     * @return mixed
     *   all posts
     */
    public function getAllByCategoryId(string $id = ''): mixed
    {
        $query = "  SELECT *
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND
                    categoryid = :categoryid
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':categoryid', $id);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * get All Posts By AuthorId
     *
     * @param string $id
     *   author id
     *
     * @return mixed
     *   all posts
     */
    public function getAllByAuthorId(string $id = ''): mixed
    {
        $query = "  SELECT *
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND
                    authorid = :authorid
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':authorid', $id);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * get All Posts By Search
     *
     * @param string $search
     *   string to search
     *
     * @return mixed
     *   All Posts By Search
     */
    public function getAllBySearch(string $search = ''): mixed
    {
        $query = "  SELECT DISTINCT {$this->table}.*

                    FROM {$this->table}
                    LEFT JOIN users ON {$this->table}.authorid = users.id
                    LEFT JOIN categories ON {$this->table}.categoryid = categories.id
                    LEFT JOIN comments ON {$this->table}.id = comments.postid

                    WHERE {$this->table}.deleted = 0
                    AND (
                    {$this->table}.title LIKE :search OR
                    {$this->table}.summary LIKE :search OR
                    users.first_name LIKE :search OR
                    users.last_name LIKE :search OR
                    categories.title LIKE :search OR
                    comments.content LIKE :search
                    )";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * get title by post id
     *
     * @param string $id post id
     * @return string the title of this post
     */
    public function getTitleById(string $id = ''): string
    {
        $query = "  SELECT title
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND
                    id = :id
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['title'];
    }

    /**
     * get Publish Date by post id
     *
     * @param string $id post id
     * @return string the Publish Date of this post
     */
    public function getPublishDateById(string $id = ''): string
    {
        $query = "  SELECT published_at
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND
                    id = :id
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['published_at'];
    }

    /**
     * get Post Count By Category Id
     *
     * @param string $id Category Id
     * @return string|integer Post Count
     */
    public function getPostCountByCategoryId(string $id = ''): string|int
    {
        $query = "  SELECT COUNT({$this->table}.id) AS count
                    FROM {$this->table}
                    WHERE categoryid = :id
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['count'];
    }
}
