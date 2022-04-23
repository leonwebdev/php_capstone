<?php

ob_start();

include __DIR__ . '/inc/header.inc.php';

?>
<!-- HEADER --------------------------------- -->

<div class="main_wrapper">

    <h1><?= esc($title) ?></h1>

    <?php if (!empty($flash['success'])) : ?>
    <div class="flash success">
        <?= esc($flash['success']) ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($flash['error'])) : ?>
    <div class="flash error">
        <?= esc($flash['error']) ?>
    </div>
    <?php endif; ?>

    <form method="post" novalidate>
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