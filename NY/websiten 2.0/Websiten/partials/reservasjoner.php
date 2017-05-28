<?php // silence is golden ;) ?>
<?php include_once("lib/db.php"); ?>
<?php include_once("lib/query.php"); ?>

<?php if($_SESSION["user_id"]) { ?>

<div id="order" class="selectFood">
    <?php
        // => Loop the result

        while ($row = mysqli_fetch_assoc($result)) {
            $data = array(
                'bookingDate'   => $row['bookingdate'],
                'persons'       => $row['persons'],
                'email'         => $row['email'],
                'phone'         => $row['phone'],
                'resturant'     => $row['resturant'],
            );

            echo '<div class="reservation">';
                echo "<div> <b>Reservasjon:</b> {$data['bookingDate']} </div>";
                echo "<div> <b>Personer:</b> {$data['persons']} </div>";
                echo "<div> <b>Epost:</b> {$data['email']} </div>";
                echo "<div> <b>Telefon:</b> {$data['phone']} </div>";
                echo "<div> <b>Resturant:</b> {$data['resturant']} </div>";
            echo '</div>';
        }
    ?>
    </ul>
</div>

<style>
    .reservation {
        background-color: #27253b;
        color: white;
        font: 14px tahoma;
        line-height: 1.3em;
        width: 400px;
        padding: 20px;
        margin: 0px 20px 20px 0px;
    }
</style>

<? } ?>
