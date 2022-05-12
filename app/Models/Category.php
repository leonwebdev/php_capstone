<?php

namespace App\Models;

use \App\Models\DatabaseQuery;

/**
 * Category -extend from DatabaseQuery
 */
class Category extends DatabaseQuery
{
    protected $table = 'categories';

    /**
     * get Category Title By this Post Id
     *
     * @param string $id
     *   post id
     *
     * @return string
     *   category title
     */
    public function getCategoryTitleByPostId(string $id = ''): string
    {
        $query = "  SELECT *
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND id = :id
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['title'];
    }
}