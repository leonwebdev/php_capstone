<?php

include __DIR__ . '/inc/header.inc.php';

?>
<!-- HEADER --------------------------------- -->
<div class="main_wrapper">
    <h1>Your <?= esc($title) ?></h1>

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

    <div class="flex-container" style="width:max-content;">
        <div style="padding: 1.5em;"><img src="./images/rose.jpg" alt="profile img"></div>
        <div style="flex-basis: max-content; padding-left: 1em;">
            <h2>Your Information</h2>
            <p><strong>First Name</strong>: <?= esc($results['first_name']) ?></p>
            <p><strong>Last Name</strong>: <?= esc($results['last_name']) ?></p>
            <p><strong>Phone</strong>: <?= esc($results['phone']) ?></p>
            <p><strong>Email</strong>: <?= esc($results['email']) ?></p>
            <h2>Mailing Address</h2>
            <p><strong>Street</strong>: <?= esc($results['street']) ?></p>
            <p><strong>City</strong>: <?= esc($results['city']) ?></p>
            <p><strong>Postal Code</strong>: <?= esc($results['postal_code']) ?></p>
            <p><strong>Province</strong>: <?= esc($results['province']) ?></p>
            <p><strong>Country</strong>: <?= esc($results['country']) ?></p>
        </div>
    </div>
</div>
<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/inc/footer.inc.php'; ?>