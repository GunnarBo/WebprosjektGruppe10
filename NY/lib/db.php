<?php
// =>
// Setup the DB connection
// =>

include("credentials.php");

// => Connect to the database
if (!$link = mysqli_connect($credentials['host'], $credentials['username'], $credentials['password'])) {
    echo 'Could not connect to mysql';
    exit;
}

// => Select database
if (!mysqli_select_db($link, $credentials['db_name'])) {
    echo 'Could not select database';
    exit;
}

?>