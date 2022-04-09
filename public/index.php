<?php

include __DIR__ . '/../includes/functions.php';

$title = "Home";

include __DIR__ . '/../includes/header.inc.php';

?>
<!-- HEADER --------------------------------- -->
<div class="main_wrapper">
    <h1><?= e($title) ?></h1>
    <div style="text-align: center; height: 500px; padding-top: 100px;">
        <h1>Click <a href="register.php" class="plain_a">Register</a> on the Top Right Corner</h1>
    </div>
</div>
<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/../includes/footer.inc.php'; ?>