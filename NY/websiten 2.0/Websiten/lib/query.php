<?php
// =>
// Query
// =>

// => The simple Query
$query    = 'SELECT * FROM reservations';
$result = mysqli_query($link,$query);

// => The result
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

?>