<?php

/**
 * Load view with data
 *
 * @param string $view_name
 * @param array $data
 * @return void
 */
function view(string $view_name, array $data = []): void
{
    try {
        extract($data);
        // title and content now visible in this scope
        $path = __DIR__ . '/../views/' . $view_name . '.view.php';
        if (!file_exists($path)) {
            throw new Exception('View ' . $path . ' not found.');
        }
        require($path);
    } catch (Exception $e) {
        echo $e->getMessage();
        die;
    }
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    die;
}

function dc()
{
    if (defined('ENV') && ENV !== 'production') {
        if (func_num_args()) {
            $out = func_get_args();
        } else {
            $out = $GLOBALS;
        }
        $json = json_encode($out);
        echo "<script>console.log($json)</script>";
    }
}

/**
 * [consolelog var_dump variable within <pre> tag]
 *
 * @param   [type]  $var  [$var ]
 *
 * @return  [type]        [return void]
 */
function consolelog($var): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


/**
 * [check if insert email is unique in database]
 *
 * @param   string  $email  [user input email]
 *
 * @return  bool            [return true if email is unique, return false if email has existed]
 */
function isEmailUnique(string $email): bool
{
    // query from database if there is an email similar with the input email
    global $dbh;

    $query = "
            SELECT
                email

            FROM
                users

            WHERE
                email LIKE :email
    ";

    $stmt = $dbh->prepare($query);

    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    $stmt->execute();

    $results = $stmt->fetch();

    // dd($results);

    if ($results) {
        return false;
    } else {
        return true;
    }
}