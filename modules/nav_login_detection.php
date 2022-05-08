<?php if (empty($_SESSION['user_id'])) : ?>
<span><a href="./?p=login"
        class="plain_a util_nav_a <?= esc_attr(('Login' == $title) ? 'active-nav-item' : ''); ?>">Login</a></span>
<span><a href="./?p=register"
        class="plain_a util_nav_a <?= esc_attr(('Register' == $title) ? 'active-nav-item' : ''); ?>">Register</a></span>
<?php else : ?>
<span><a href="./?p=logout"
        class="plain_a util_nav_a <?= esc_attr(('Logout' == $title) ? 'active-nav-item' : ''); ?>">Logout</a></span>
<span><a href="./?p=profile"
        class="plain_a util_nav_a <?= esc_attr(('Profile' == $title) ? 'active-nav-item' : ''); ?>">Profile</a></span>
<?php endif; ?>