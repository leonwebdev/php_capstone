<?php

ob_start();

include __DIR__ . '/inc/header.inc.php';

?>
<!-- HEADER --------------------------------- -->

<div class="main_wrapper">

    <h1><?= esc($title) ?></h1>

    <form method="post" action="process_login.php" novalidate>
        <p>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?= esc($_POST['email'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['email'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" name="password" value="">
            <span class="form_validate_error"><?= esc($errors['password'][0] ?? '') ?></span>
        </p>

        <p><button type="submit" style="margin-left: 180px;">Submit</button></p>
    </form>
</div>

<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/inc/footer.inc.php'; ?>