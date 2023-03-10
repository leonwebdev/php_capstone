<?php

ob_start();

include __DIR__ . '/inc/header.inc.php';

// dd($errors);

?>
<!-- HEADER --------------------------------- -->

<div class="main_wrapper">

    <h1><?= esc($title) ?></h1>

    <form method="post" novalidate>

        <input type="hidden" name="id" value="<?= esc($_POST['id'] ?? '') ?>">

        <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="<?= esc($_POST['first_name'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['first_name'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="<?= esc($_POST['last_name'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['last_name'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="street">Street</label>
            <input type="text" name="street" value="<?= esc($_POST['street'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['street'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="city">City</label>
            <input type="text" name="city" value="<?= esc($_POST['city'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['city'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" value="<?= esc($_POST['postal_code'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['postal_code'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="province">Province</label>
            <input type="text" name="province" value="<?= esc($_POST['province'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['province'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="country">Country</label>
            <input type="text" name="country" value="<?= esc($_POST['country'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['country'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="<?= esc($_POST['phone'] ?? '') ?>">
            <span class="form_validate_error"><?= esc($errors['phone'][0] ?? '') ?></span>
        </p>

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

        <p>
            <label for="password_confirm">Input password again</label>
            <input type="password" name="password_confirm" value="">
            <span class="form_validate_error"><?= esc($errors['password_confirm'][0] ?? '') ?></span>
        </p>

        <p>
            <label for="subscribe_to_newsletter">Subscribe to newsletter</label>
            <input type="checkbox" name="subscribe_to_newsletter" value="<?= esc($_POST['subscribe_to_newsletter'] ?? 1) ?>">
        </p>

        <p><button type="submit" style="margin-left: 180px;">Submit</button></p>

    </form>
</div>

<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/inc/footer.inc.php'; ?>