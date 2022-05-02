<?php

require __DIR__ . '/credentials.php';

// $DB_DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);