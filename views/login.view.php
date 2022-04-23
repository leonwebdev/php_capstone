<?php

ob_start();

include __DIR__ . '/inc/header.inc.php';

?>
<!-- HEADER --------------------------------- -->

<div class="main_wrapper">

    <h1><?= esc($title) ?></h1>

    <form method="post" action="process_login.php" novalidate>
        <p>Email: <input type="text" name="email" value="<?= e($post['email'] ?? '') ?>" />
            <?= e($errors['email'] ?? '') ?></p>
        <p>Password: <input type="password" name="password" /></p>
        <p><input type="submit" /></p>
    </form>
</div>

<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/inc/footer.inc.php'; ?>