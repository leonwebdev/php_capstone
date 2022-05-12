<?php

namespace App\Models;

use \App\Models\DatabaseQuery;

/**
 * User -extend from DatabaseQuery
 */
class User extends DatabaseQuery
{
    protected $table = 'users';

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
     * create a new user record
     *
     * @param   array  $array  input user info to insert into database
     *
     * @return  int|string            return last insert id
     */
    public function create(array $array): int|string
    {
        // Hash password -------------------------
        $hash = password_hash($array['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO {$this->table}
                  (
                      first_name,
                      last_name,
                      street,
                      city,
                      postal_code,
                      province,
                      country,
                      phone,
                      email,
                      password,
                      subscribe_to_newsletter
                   )
                   VALUES
                   (
                      :first_name,
                      :last_name,
                      :street,
                      :city,
                      :postal_code,
                      :province,
                      :country,
                      :phone,
                      :email,
                      :password,
                      :subscribe_to_newsletter
                   )";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':first_name', $array['first_name']);
        $stmt->bindValue(':last_name', $array['last_name']);
        $stmt->bindValue(':street', $array['street']);
        $stmt->bindValue(':city', $array['city']);
        $stmt->bindValue(':postal_code', $array['postal_code']);
        $stmt->bindValue(':province', $array['province']);
        $stmt->bindValue(':country', $array['country']);
        $stmt->bindValue(':phone', $array['phone']);
        $stmt->bindValue(':email', $array['email']);
        $stmt->bindValue(':password', $hash);
        $array['subscribe_to_newsletter'] = $array['subscribe_to_newsletter'] ?? 0;
        $stmt->bindValue(':subscribe_to_newsletter', $array['subscribe_to_newsletter']);

        $stmt->execute();

        $id = self::$dbh->lastInsertId();

        return $id;
    }

    /**
     * update a user's info by user id
     *
     * @param   array  $array  info will be updated
     * @param   int|string    $id     user id
     *
     * @return  array          return last updated user info
     */
    public function update(array $array, int|string $id): array
    {
        // Hash password -------------------------
        $hash = password_hash($array['password'], PASSWORD_DEFAULT);

        $query = "UPDATE {$this->table}
                    SET
                      first_name = :first_name,
                      last_name = :last_name,
                      street = :street,
                      city = :city,
                      postal_code = :postal_code,
                      province = :province,
                      country = :country,
                      phone = :phone,
                      email = :email,
                      password = :password,
                      subscribe_to_newsletter = :subscribe_to_newsletter
                    WHERE
                      id = :id
                      ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':first_name', $array['first_name']);
        $stmt->bindValue(':last_name', $array['last_name']);
        $stmt->bindValue(':street', $array['street']);
        $stmt->bindValue(':city', $array['city']);
        $stmt->bindValue(':postal_code', $array['postal_code']);
        $stmt->bindValue(':province', $array['province']);
        $stmt->bindValue(':country', $array['country']);
        $stmt->bindValue(':phone', $array['phone']);
        $stmt->bindValue(':email', $array['email']);
        $stmt->bindValue(':password', $hash);
        $array['subscribe_to_newsletter'] = $array['subscribe_to_newsletter'] ?? 0;
        $stmt->bindValue(':subscribe_to_newsletter', $array['subscribe_to_newsletter']);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $this->getOne($id);

        return $result;
    }

    /**
     * delete a user record by user id
     *
     * @param   int|string     $id  user id
     *
     * @return  string    return a string relating to result:
     *
     * if delete success : Record has been deleted
     *
     * if delete fail : Record still exists
     *
     * if user id not found : Record Not Found
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
     * Check if a user record is deleted
     *
     * @param   int|string     $id  user id
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
     * get One User Info by Email
     *
     * @param string $field
     *   field name
     * @param string $email
     *   the actual email to query
     *
     * @return array
     *   array contains user info, false if no record found
     */
    public function getOneByEmail(string $field, string $email): array|bool
    {
        $query = "  SELECT *
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND {$field} = :email
                    ";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * get User Name By Id Relating To this Comment
     *
     * @param string $id
     *   user_id of this comment
     *
     * @return mixed
     *   author first+last name
     */
    public function getUserNameByIdRelatingToComment(string $id = ''): mixed
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

        return $result['first_name'] . ' ' .  $result['last_name'];
    }

    /**
     * get User Name By Id Relating To this Post
     *
     * @param string $id
     *   author_id of this post
     *
     * @return mixed
     *   author first+last name
     */
    public function getUserNameByIdRelatingToPost(string $id = ''): mixed
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

        return $result['first_name'] . ' ' .  $result['last_name'];
    }

    /**
     * check if given user-id is Admin
     *
     * @param string $id user-id
     * @return boolean true for Admin, false for non-Admin
     */
    public function isAdmin(string $id = ''): bool
    {
        $query = "SELECT is_admin
                    FROM {$this->table}
                    WHERE deleted = 0
                    AND {$this->key} = :id";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        $message = (1 === $result['is_admin']) ? true : false;

        return $message;
    }
}