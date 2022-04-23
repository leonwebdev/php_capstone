<?php

ob_start();

$title = "Register";

$errors = $errors ?? [];

if ('POST' === $_SERVER['REQUEST_METHOD']) {

    /* STEP 1 - VALIDATE ALL FIELDS
   ---------------------------------------------------- */

    require __DIR__ . './../models/validate.php';

    // consolelog($errors);
    // consolelog($_SESSION['register_form_errors']);


    /* STEP 2 -- IF NO ERRORS, INSERT THEN REDIRECT
    -------------------------------------------------------- */


    if (count($errors) == 0) {

        // Hash password -------------------------
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

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
        $stmt->bindValue(':password', $hash);
        $_POST['subscribe_to_newsletter'] = $_POST['subscribe_to_newsletter'] ?? 0;
        $stmt->bindValue(':subscribe_to_newsletter', $_POST['subscribe_to_newsletter']);

        $stmt->execute();

        $id = $dbh->lastInsertId();

        if ($id) {

            $_SESSION['user_id'] = $id;
            $_SESSION['flash']['success'] = 'Congrats! Register success!!!';

            $path = __DIR__ . './?p=profile';
            header("Location: $path");
            die;
        } else {
            die('<h1>There was a problem inserting the employee.</h1>');
        }
    }


    /* STEP 3 - IF THERE ARE ERRORS, DISPLAY FORM WITH ERRORS
    -------------------------------------------------------- */
}

view('register', compact('title', 'errors'));