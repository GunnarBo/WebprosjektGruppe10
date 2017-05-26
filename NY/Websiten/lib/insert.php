<?php
// =>
// Insert
// =>

include("credentials.php");

try {
    // => Connect to the database
    if (!$link = mysqli_connect($credentials['host'], $credentials['username'], $credentials['password'], $credentials['db_name'])) {
        echo 'Could not connect to mysql';
        exit;
    }

    // => Data To Post
    $dataToPost = array(
        'bookingDate'   => $_GET['bookingDate'],
        'persons'       => $_GET['persons'],
        'email'         => $_GET['email'],
        'phone'         => $_GET['phone'],
        'selectedTable' => $_GET['selectedTable'],
    );

    if(empty($_GET['bookingDate']) || empty($_GET['persons']) || empty($_GET['email']) || empty($_GET['phone']) || empty($_GET['selectedTable'])) {
        die('Please fill out the form');
    }

    // => SQL Query
    $sql = "INSERT INTO reservations "."(bookingdate,persons, email, phone, selectedTable) ". "VALUES('{$dataToPost['bookingDate']}','{$dataToPost['persons']}','{$dataToPost['email']}','{$dataToPost['phone']}', '{$dataToPost['selectedTable']}')";

    // => Insert query to database
    $retval = mysqli_query( $link, $sql );

    // => Check if everyting is ok!
    if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
    }
    
    // => Success!
    echo "tada!";
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>