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
     * @return  int|string  return last insert id
     */
    public function create(array $array): int|string
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
                    WHERE
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
                    WHERE deleted = 0
                    AND categoryid = :id
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['count'];
    }

    /**
     * get Post Count By User Id
     *
     * @param string $id User Id
     * @return string|integer Post Count
     */
    public function getPostCountByUserId(string $id = ''): string|int
    {
        $query = "  SELECT COUNT({$this->table}.id) AS count
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND authorid = :id
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['count'];
    }

    /**
     * get All Hidden And Draft Post-Ids
     *
     * @return mixed All Hidden And Draft Post-Ids
     */
    public function getAllHiddenAndDraftPostIds():mixed
    {
        $query = "  SELECT {$this->table}.id

                    FROM {$this->table}

                    WHERE {$this->table}.deleted = 0

                    AND (
                    {$this->table}.status = 'hidden' OR
                    {$this->table}.status = 'draft'
                    )";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach ($result as $key => $value) {
            $array[] = $value['id'];
        }

        return $array ?? [];
    }

    /**
     * get All Deleted Post-Ids
     *
     * @return mixed All Deleted Post-Ids
     */
    public function getAllDeletedPostIds(): mixed
    {
        $query = "  SELECT {$this->table}.id

                    FROM {$this->table}

                    WHERE {$this->table}.deleted = 1
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach ($result as $key => $value) {
            $array[] = $value['id'];
        }

        return $array ?? [];
    }

    /**
     * delete a post record by post id
     *
     * @param   int|string     $id  post id
     *
     * @return  string    return a string relating to result:
     *
     * if delete success : Record has been deleted
     *
     * if delete fail : Record still exists
     *
     * if post id not found : Record Not Found
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
     * Check if a post record is deleted
     *
     * @param   int|string  $id  post id
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
     * publish a post record by post id
     *
     * @param   int|string     $id  post id
     *
     * @return  string    return a string relating to result:
     *
     * if publish success : Record has been published
     *
     * if publish fail : Record still not published
     *
     * if post id not found : Record Not Found
     */
    public function publish(int|string $id): string
    {
        $query = "UPDATE {$this->table}
                    SET
                    status = 'post',
                    published_at = :time
                    WHERE
                    id = :id";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->bindValue(':time', date('Y-m-d H:i:s'));

        $stmt->execute();

        $check = $this->isPublish($id);

        $message = ($check === 'Published') ? 'Record has been published'
        : (
            ($check === 'UnPublished') ? 'Record still not published'
            : 'Record Not Found'
        );

        return $message;
    }

    /**
     * Check if a post record is Published
     *
     * @param   int|string  $id  post id
     *
     * @return  string    return a string relating to result:
     *
     * if Published success : Published
     *
     * if Published fail : UnPublished.
     *
     * if post id not found : No Record Found.
     */
    public function isPublish(int|string $id): string
    {
        $query = "SELECT status FROM {$this->table}
                  WHERE {$this->key} = :id";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        $message = ($result === false) ? 'No Record Found'
        : (
            ($result['status'] === 'post') ? 'Published'
            : 'UnPublished'
        );

        return $message;
    }

    /**
     * hide a post record by post id
     *
     * @param   int|string     $id  post id
     *
     * @return  string    return a string relating to result:
     *
     * if hide success : Record has been hidden
     *
     * if hide fail : Record still not hidden
     *
     * if post id not found : Record Not Found
     */
    public function hide(int|string $id): string
    {
        $query = "UPDATE {$this->table}
                    SET
                    status = 'hidden'
                    WHERE
                    id = :id";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $check = $this->isHide($id);

        $message = ($check === 'Hidden') ? 'Record has been hidden'
        : (
            ($check === 'UnHidden') ? 'Record still not hidden'
            : 'Record Not Found'
        );

        return $message;
    }

    /**
     * Check if a post record is Hidden
     *
     * @param   int|string  $id  post id
     *
     * @return  string    return a string relating to result:
     *
     * if Published success : Hidden
     *
     * if Published fail : UnHidden.
     *
     * if post id not found : No Record Found.
     */
    public function isHide(int|string $id): string
    {
        $query = "SELECT status FROM {$this->table}
                  WHERE {$this->key} = :id";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        $message = ($result === false) ? 'No Record Found'
        : (
            ($result['status'] === 'hidden') ? 'Hidden'
            : 'UnHidden'
        );

        return $message;
    }

    /**
     * update a post's info by post id
     *
     * @param   array  $array  info will be updated
     * @param   int|string    $id     post id
     *
     * @return  mixed  return last updated post info
     */
    public function update(array $array, int|string $id): mixed
    {
        $query = "UPDATE {$this->table}
                    SET
                      title = :title,
                      summary = :summary,
                      content = :content,
                      authorid = :authorid,
                      categoryid = :categoryid,
                      status = :status,
                      allow_comment = :allow_comment,
                      image = :image

                    WHERE
                      id = :id
                      ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':title', $array['title']);
        $stmt->bindValue(':summary', $array['summary']);
        $stmt->bindValue(':content', $array['content']);
        $stmt->bindValue(':authorid', $array['authorid']);
        $stmt->bindValue(':categoryid', $array['categoryid']);
        $stmt->bindValue(':status', $array['status']);
        $stmt->bindValue(':allow_comment', $array['allow_comment']);
        $stmt->bindValue(':image', $array['image']);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $this->getOne($id);

        return $result;
    }

    /**
     * get Min Posts Count By Category
     *
     * @return string|int Min Count
     */
    public function getMinPostsCountByCategory(): string|int
    {
        $query = "SELECT COUNT(id) AS Min
                    FROM {$this->table}
                    WHERE deleted = 0
                    GROUP BY categoryid
                    ORDER BY COUNT(id) ASC
                    LIMIT 1
        ";
        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['Min'];
    }

    /**
     * get Min Posts Count By User
     *
     * @return string|int Min Count
     */
    public function getMinPostsCountByUser(): string|int
    {
        $query = "SELECT COUNT(id) AS Min
                    FROM {$this->table}
                    WHERE deleted = 0
                    GROUP BY authorid
                    ORDER BY COUNT(id) ASC
                    LIMIT 1
        ";
        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['Min'];
    }

    /**
     * get Max Posts Count By Category
     *
     * @return string|int Max Count
     */
    public function getMaxPostsCountByCategory(): string|int
    {
        $query = "SELECT COUNT(id) AS Max
                    FROM {$this->table}
                    WHERE deleted = 0
                    GROUP BY categoryid
                    ORDER BY COUNT(id) DESC
                    LIMIT 1
        ";
        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['Max'];
    }

    /**
     * get Max Posts Count By User
     *
     * @return string|int Max Count
     */
    public function getMaxPostsCountByUser(): string|int
    {
        $query = "SELECT COUNT(id) AS Max
                    FROM {$this->table}
                    WHERE deleted = 0
                    GROUP BY authorid
                    ORDER BY COUNT(id) DESC
                    LIMIT 1
        ";
        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['Max'];
    }
}