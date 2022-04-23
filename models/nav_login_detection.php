<?php if ($title == 'Register' || $title == 'Home' || $title == 'Mine' || $title == 'Timeline' || $title == 'Newsletter' || $title == 'Community' || $title == 'Not Found') : ?>
    <span><a href="#" class="plain_a">Login</a></span>
    <span><a href="register.php" class="plain_a">Register</a></span>
<?php else : ?>
    <span><a href="register.php" class="plain_a">Logout</a></span>
    <span><a href="#" class="plain_a"><?= ucwords(str_replace('_', ' ', e($results['first_name']))) ?></a></span>
<?php endif; ?>