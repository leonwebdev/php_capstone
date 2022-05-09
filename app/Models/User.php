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
     * @return  int            return last insert id
     */
    public function create(array $array): int
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
     * @param   int    $id     user id
     *
     * @return  array          return last updated user info
     */
    public function update(array $array, int $id): array
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
     * @param   int     $id  user id
     *
     * @return  string    return a string relating to result:
     *
     * if delete success : Record No. id has been deleted.
     *
     * if delete fail : Record No. id still exists.
     *
     * if user id not found : Record No. id Not Found.
     */
    public function delete(int $id): string
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

        $message = ($check === 'Deleted') ? 'Record No.' . $id . ' has been deleted.'
            : (
                ($check === 'Existed') ? 'Record No.' . $id . ' still exists.'
                : 'Record No.' . $id . ' Not Found.'
            );

        return $message;
    }

    /**
     * Check if a user record is deleted
     *
     * @param   int     $id  user id
     *
     * @return  string    return a string relating to result:
     *
     * if delete success : Deleted
     *
     * if delete fail : Existed.
     *
     * if user id not found : No Record Found.
     */
    public function isDelete($id): string
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
     *   array contains user info
     */
    public function getOneByEmail(string $field, string $email): array
    {
        $query = "  SELECT *
                    FROM {$this->table}
                    WHERE {$field} = :email
                    AND deleted = 0";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function getUserNameByIdRelatingToComment(string $id = ''): mixed
    {
        $query = "  SELECT *
                    FROM {$this->table}
                    WHERE id = :id
                    AND deleted = 0";

        $stmt = self::$dbh->prepare($query);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch();

        return $result['first_name'] . ' ' .  $result['last_name'];
    }
}