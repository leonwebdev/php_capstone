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

<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/../includes/footer.inc.php'; ?>