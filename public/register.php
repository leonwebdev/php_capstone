<?php

include __DIR__ . '/../includes/connect.php';
include __DIR__ . '/../includes/functions.php';

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

include __DIR__ . '/../includes/header.inc.php';

?>
<!-- HEADER --------------------------------- -->

<div class="main_wrapper">

    <h1><?= e($title) ?></h1>

    <form action="register.php" method="post" novalidate>

        <input type="hidden" name="id" value="<?= e($_POST['id'] ?? '') ?>">

        <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="<?= e($_POST['first_name'] ?? '') ?>">
            <span class="error"><?= $errors['first_name'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="<?= e($_POST['last_name'] ?? '') ?>">
            <span class="error"><?= $errors['last_name'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="street">Street</label>
            <input type="text" name="street" value="<?= e($_POST['street'] ?? '') ?>">
            <span class="error"><?= $errors['street'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="city">City</label>
            <input type="text" name="city" value="<?= e($_POST['city'] ?? '') ?>">
            <span class="error"><?= $errors['city'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" value="<?= e($_POST['postal_code'] ?? '') ?>">
            <span class="error"><?= $errors['postal_code'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="province">Province</label>
            <input type="text" name="province" value="<?= e($_POST['province'] ?? '') ?>">
            <span class="error"><?= $errors['province'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="country">Country</label>
            <input type="text" name="country" value="<?= e($_POST['country'] ?? '') ?>">
            <span class="error"><?= $errors['country'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="<?= e($_POST['phone'] ?? '') ?>">
            <span class="error"><?= $errors['phone'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?= e($_POST['email'] ?? '') ?>">
            <span class="error"><?= $errors['email'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" name="password" value="<?= e($_POST['password'] ?? '') ?>">
            <span class="error"><?= $errors['password'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="password_confirm">Input password again</label>
            <input type="password" name="password_confirm" value="<?= e($_POST['password_confirm'] ?? '') ?>">
            <span class="error"><?= $errors['password_confirm'][0] ?? '' ?></span>
        </p>

        <p>
            <label for="subscribe_to_newsletter">Subscribe to newsletter</label>
            <input type="checkbox" name="subscribe_to_newsletter" value="<?= e($_POST['subscribe_to_newsletter'] ?? 1) ?>">
            <span class="error"><?= $errors['subscribe_to_newsletter'][0] ?? '' ?></span>
        </p>

        <p><button type="submit" style="margin-left: 180px;">Submit</button></p>

    </form>
</div>

<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/../includes/footer.inc.php'; ?>