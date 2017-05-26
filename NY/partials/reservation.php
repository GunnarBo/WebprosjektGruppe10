<?php // silence is golden ;) ?>
<?php include_once("lib/db.php"); ?>


<?php

include("credentials.php");

$message = "";
$class = "";

try {
    // => Connect to the database
    if (!$link = mysqli_connect($credentials['host'], $credentials['username'], $credentials['password'], $credentials['db_name'])) {
        echo 'Could not connect to mysql';
        exit;
    }

    // => Data To Post
    $dataToPost = array(
        'bookingDate'   => $_POST['bookingDate'],
        'persons'       => $_POST['persons'],
        'email'         => $_POST['email'],
        'phone'         => $_POST['phone'],
        'resturant'     => $_POST['resturant'],
    );

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(empty($_POST['bookingDate']) || empty($_POST['persons']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['resturant'])) {
            $message = "Vennligst fyll ut alle felter.";
            $class = "error";
        } else {
            // => SQL Query
            $sql = "INSERT INTO reservations "."(bookingdate,persons, email, phone, resturant) ". "VALUES('{$dataToPost['bookingDate']}','{$dataToPost['persons']}','{$dataToPost['email']}','{$dataToPost['phone']}', '{$dataToPost['resturant']}')";

            // => Insert query to database
            $retval = mysqli_query( $link, $sql );

            // => Check if everyting is ok!
            if(! $retval ) {
                die('Could not enter data: ' . mysql_error());
            }
            
            // => Success!
            $message = "Takk for din bestilling. Du blir sendt til hovedsiden om 10 sekunder!";
            $class = "success";
            echo "<script>setTimeout(function() { location='/' },10000);</script>";
        }
    }

}



catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>

<div id="order" class="selectFood">
    <form id="orderForm" method="POST">
        <div class="input-field">
            <label for="date">Velg dato:</label>
            <input id="bookingDate" type="date" name="bookingDate" value="<?= date('d.m.Y');?>" />
        </div>
        <div class="input-field">
            <label for="persons">Antalll personer</label>
            <select id="persons" name="persons">
            <?php
                for ($persons = 1; $persons <= 10; $persons++) {
                    echo "<option name='persons' value='{$persons}'>{$persons}</option>";
                }
            ?>
            </select>
        </div>
        <div class="input-field">
            <label for="email">Epost</label>
            <input type="email" id="email" name="email" placeholder="Epost Adresse">
        </div>
        <div class="input-field">
            <label for="phone">Tlf:</label>
            <input id="phone" type="input" maxlength="8" name="phone" value="" />
        </div>
        <div class="input-field">
            <label for="resturant">Velg resturant:</label>
            <select id="resturant" name="resturant">
                <option name="resturant" value='INAGES MAT'>INAGES MAT</option>
                <option name="resturant" value='DØGNVILL'>DØGNVILL</option>
                <option name="resturant" value='LUCKY BIRD'>LUCKY BIRD</option>
                <option name="resturant" value='RISTORANTE FERRO'>RISTORANTE FERRO</option>
            </select>
        </div>
        <div class="input-field">
            <input type="submit" id="submit" name="bestill" value="Bestill">
        </div>
        <div class="<?= $class; ?>">
            <?= $message; ?>
        </div>
    </form>

</div>
