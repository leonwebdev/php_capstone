<?php

ob_start();

$title = "Profile";

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
    // die;
    die('<h1>There is no profile</h1>');
}

view('profile', compact('title'));