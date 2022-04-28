<?php if (empty($_SESSION['user_id'])) : ?>
<span><a href="./?p=login" class="plain_a">Login</a></span>
<span><a href="./?p=register" class="plain_a">Register</a></span>
<?php else : ?>
<span><a href="./?p=logout" class="plain_a">Logout</a></span>
<span><a href="./?p=profile" class="plain_a">Profile</a></span>
<?php endif; ?>