<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= e($title); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/desktop.css" media="all and (min-width:768px)">
    <link rel="stylesheet" type="text/css" href="./styles/mobile.css" media="all and (max-width:767px)">
    <link rel="stylesheet" type="text/css" media="print" href="./styles/print.css">
    <link rel="icon" href="./images/favicon.png" type="image/png" />
    <link rel="apple-touch-icon" sizes="196x196" href="./images/favicon-196.png" />
    <link rel="apple-touch-icon" sizes="192x192" href="./images/favicon-192.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon-180.png" />
    <link rel="apple-touch-icon" sizes="128x128" href="./images/favicon-128.png" />
</head>

<body>

    <header>

        <div id="header_wrapper" class="main_wrapper">
            <a href="./" title="Gardener Home">
                <img src="./images/logo.svg" alt="logo" width="315" height="70">
            </a>
            <nav>

                <ul id="navlist">
                    <li><a class="<?= esc_attr(('Home' == $title) ? 'active-nav-item' : ''); ?>" href="./">Home</a></li>
                    <li><a class="<?= esc_attr(('Post' == $title) ? 'active-nav-item' : ''); ?>"
                            href="./?p=post">Post</a></li>
                    <li><a class="<?= esc_attr(('About' == $title) ? 'active-nav-item' : ''); ?>"
                            href="./?p=about">About Us</a></li>
                    <li><a class="<?= esc_attr(('Newsletter' == $title) ? 'active-nav-item' : ''); ?>"
                            href="./?p=newsletter">Newsletter</a></li>
                </ul>

            </nav>

            <!-- <div id="hamburger_icon">
                <div class="hamburger_icon_element"></div>
                <div class="hamburger_icon_element"></div>
                <div class="hamburger_icon_element"></div>
            </div> -->

            <div id="account_login">

                <?php require __DIR__ . '/../../modules/nav_login_detection.php'; ?>

            </div>

        </div>

    </header>