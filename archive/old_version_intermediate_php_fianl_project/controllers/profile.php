<?php

ob_start();

$title = "Profile";

// Get flash message
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);

if ($_SESSION['user_id']) {
    // Query profile
    $query = "SELECT
                first_name,
                last_name,
                street,
                city,
                postal_code,
                province,
                country,
                phone,
                email

                FROM

                users

                WHERE

                id = :id
                ";

    $stmt = $dbh->prepare($query);

    $stmt->bindValue(':id', $_SESSION['user_id']);

    $stmt->execute();

    $results = $stmt->fetch();

    // echo '<pre>';
    // echo print_r($_POST) . '<br>';
    // echo print_r($_GET) . '<br>';
    // echo print_r($_REQUEST) . '<br>';
    // echo print_r($_GET['id']) . '<br>';
    // echo print_r($results) . '<br>';
    // echo '</pre>';
} else {

    $_SESSION['flash']['error'] = 'Sorry, you must login to view this page.';
    header('Location:/index.php?p=login');
    die;
}

view('profile', compact('title', 'results', 'flash'));
