<?php

$title = "Register";

$errors = [];

if ('POST' == $_SERVER['REQUEST_METHOD']) {

    /* STEP 1 - VALIDATE ALL FIELDS
   ---------------------------------------------------- */

    require __DIR__ . '/../includes/validate.php';

    /* STEP 2 -- IF NO ERRORS, INSERT THEN REDIRECT
    -------------------------------------------------------- */


    if (count($errors) == 0) {

        $query = "INSERT INTO users
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

        $stmt = $dbh->prepare($query);

        $stmt->bindValue(':first_name', $_POST['first_name']);
        $stmt->bindValue(':last_name', $_POST['last_name']);
        $stmt->bindValue(':street', $_POST['street']);
        $stmt->bindValue(':city', $_POST['city']);
        $stmt->bindValue(':postal_code', $_POST['postal_code']);
        $stmt->bindValue(':province', $_POST['province']);
        $stmt->bindValue(':country', $_POST['country']);
        $stmt->bindValue(':phone', $_POST['phone']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':password', $_POST['password']);
        $_POST['subscribe_to_newsletter'] = $_POST['subscribe_to_newsletter'] ?? 0;
        $stmt->bindValue(':subscribe_to_newsletter', $_POST['subscribe_to_newsletter']);

        $stmt->execute();

        $id = $dbh->lastInsertId();

        if ($id) {
            header("Location: profile.php?id=$id");
            die;
        } else {
            die('<h1>There was a problem inserting the employee.</h1>');
        }
    }


    /* STEP 3 - IF THERE ARE ERRORS, DISPLAY FORM WITH ERRORS
    -------------------------------------------------------- */
}

view('register', compact('title'));
