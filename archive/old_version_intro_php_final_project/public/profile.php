<?php

include __DIR__ . '/../includes/connect.php';
include __DIR__ . '/../includes/functions.php';

$title = "Profile";

if (empty($_REQUEST['id'])) die('<h1>There is no profile</h1>');

if (intval($_REQUEST['id']) != $_REQUEST['id']) die('<h1>User id must be an integer</h1>');

if ($_GET['id']) {
    // Query profile
    $query = "SELECT
                    first_name, 
                    last_name,
                    street,
                    city,
                    postal_code,
                    province,
                    country,
                    phone,
                    email
                   
                FROM
                   
                    users

                WHERE
                   
                    id = :id
                   ";

    $stmt = $dbh->prepare($query);

    $stmt->bindValue(':id', $_REQUEST['id']);

    $stmt->execute();

    $results = $stmt->fetch();

    // echo '<pre>';
    // echo print_r($_POST) . '<br>';
    // echo print_r($_GET) . '<br>';
    // echo print_r($_REQUEST) . '<br>';
    // echo print_r($_GET['id']) . '<br>';
    // echo print_r($results) . '<br>';
    // echo '</pre>';
} else {
    // die;
    die('<h1>There is no profile</h1>');
}

include __DIR__ . '/../includes/header.inc.php';

?>
<!-- HEADER --------------------------------- -->
<div class="main_wrapper">
    <h1>Your <?= e($title) ?></h1>
    <div class="flex-container" style="width:max-content;margin: 0 auto;">
        <div style="padding: 1.5em;"><img src="./images/rose.jpg" alt="profile img"></div>
        <div style="flex-basis: max-content; padding-left: 1em;">
            <h2>Your Information</h2>
            <p><strong>First Name</strong>: <?= e($results['first_name']) ?></p>
            <p><strong>Last Name</strong>: <?= e($results['last_name']) ?></p>
            <p><strong>Phone</strong>: <?= e($results['phone']) ?></p>
            <p><strong>Email</strong>: <?= e($results['email']) ?></p>
            <h2>Mailing Address</h2>
            <p><strong>Street</strong>: <?= e($results['street']) ?></p>
            <p><strong>City</strong>: <?= e($results['city']) ?></p>
            <p><strong>Postal Code</strong>: <?= e($results['postal_code']) ?></p>
            <p><strong>Province</strong>: <?= e($results['province']) ?></p>
            <p><strong>Country</strong>: <?= e($results['country']) ?></p>
        </div>
    </div>
</div>
<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/../includes/footer.inc.php'; ?>