<?php

// ----- SESSION START ------************
ob_start();

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    die('405 - Unsupported Request Method');
}

$query = "SELECT 
            *
            FROM 
            users 
            WHERE 
            email = :email
            ";

$stmt = $dbh->prepare($query);

$stmt->bindValue(':email', $_POST['email']);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($_POST['password'], $user['password'])) {

    $_SESSION['flash']['error'] = 'Sorry, no user found or wrong password, please try again.';
    header('Location:/index.php?p=login');
    die;
}

$_SESSION['flash']['success'] = 'Welcome!' . $user['first_name'] . $user['last_name'] . ', you are logged in!';
$_SESSION['user_id'] = $user['id'];
header('Location:/index.php?p=profile');
die;
