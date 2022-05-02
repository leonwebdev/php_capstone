<?php

require __DIR__ . '/credentials.php';

/* Set Database Handle - $dbh -
-------------------------------------------------------------*/

// $DB_DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/* Set Log File Handle - $fh -
-------------------------------------------------------------*/

// the file we want to open
$file = __DIR__ . '/../logs/events.log';

if (file_exists($file)) {

    $fh = fopen($file, 'a+');
}

// Remember to close the $fh by fclose($fh)