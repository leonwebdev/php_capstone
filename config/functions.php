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
 * consolelog var_dump variable within <pre> tag
 *
 * @param   mixed  $var
 *
 * @return   void  return void
 */
function consolelog($var): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


/**
 * check if insert email is unique in database
 *
 * @param   string  $email  user input email
 *
 * @return  bool            return true if email is unique, return false if email has existed
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

use \App\Lib\Interfaces\ILogger;

/**
 * log an event into database or log-file
 *
 * @param ILogger $logger
 *   the object which event will be written in
 * @param string $event
 *   the event string will be written in
 *
 * @return void
 *   return void
 */
function logEvent(ILogger $logger, string $event = ''): void
{
    if (empty($event)) {

        $event = date('Y-m-d H:i:s') . ' void event';
    }

    $logger->write($event);
}

/**
 * create the string to insert into log-file
 *
 * @param array $server_info
 *   $_SERVER by this request
 * @param string $http_respond_code
 *   the http respond code
 *
 * @return string
 *   the final concatnate string
 */
function createLogEvent(array $server_info, string $http_respond_code): string
{

    $required_info = [
        'REQUEST_METHOD', 'REQUEST_URI', 'HTTP_USER_AGENT'
    ];

    $event = '';
    $event .= date('Y-m-d H:i:s') . ' | ' . $http_respond_code;

    foreach ($required_info as $key) {

        $event .= ' | ' . $server_info[$key];
    }

    return $event;
}