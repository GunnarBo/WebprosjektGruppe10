<?php
  session_start();
  $page = $_GET['page'];
  $background = "homebg";
  switch($page) {
    case ('asia'):
      $path = 'partials/asia.php';
      $currentPage = 'asia';
      $background = 'asiabg';
    break;

    case ('tapas'):
      $path = 'partials/tapas.php';
      $currentPage = 'tapas';
      $background = 'tapasbg';
    break;

    case ('latin'):
      $path = 'partials/latin.php';
      $currentPage = 'latin';
      $background = 'latinbg';
    break;

    case ('street'):
      $path = 'partials/street.php';
      $currentPage = 'street';
      $background = 'streetbg';
    break;

    case ('italiensk'):
      $path = 'partials/italiensk.php';
      $currentPage = 'italiensk';
    break;

    case ('barer'):
      $currentPage = 'barer';
    break;

    case ('reservation'):
      $path = 'partials/reservation.php';
      $currentPage = 'Booking';
    break;

    case ('reservasjoner'):
      $path = 'partials/reservasjoner.php';
      $currentPage = 'Reservasjoner';
    break;

    case ('login'):
      $path = 'partials/login.php';
      $currentPage = 'Logg inn';
    break;

    case ('logout'):
      $_SESSION["user_id"] = "";
      $url1=$_SERVER['REQUEST_URI'];
      echo "<script>location='index.php'</script>";
      session_destroy();
    break;

    case ('resturanter'):
      $path = 'partials/resturanter.php';
      $currentPage = 'restauranter';
    break;

    case ('barer'):
      $path = 'partials/barer.php';
      $currentPage = 'barer';
    break;

    case ('omoss'):
      $path = 'partials/omoss.php';
      $currentPage = 'om oss';
    break;

    default:
      $path = 'partials/frontPage.php';
      $currentPage = 'Hjem';
      $background = "homebg";
    break;
  }
?>
<!DOCTYPE html>
<html lang="nb-no" class="<?= $background; ?>">
<head>
  <title>Mat | <?= $currentPage; ?></title>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/login.css" type="text/css" />
  <link rel="stylesheet" media="(max-width: 800px)" href="assets/css/mobile.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<div class="wrapper">
  <?php include('static/header.php');

  echo '<div id="currentPage">' . $currentPage . '</div>';

  include($path); ?>
</div>

<footer>
  <div class="container">
    <p>Meld deg på vårt nyhetsbrev</p>
    <form>
      <input type="email" id="email" name="email" placeholder="Epost Adresse">
      <input type="submit" id="submitnewsletter" name="Meld på" value="Meld på">
      <div class="message"></div>
    </form>
  </div>
</footer>

<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>

</body>
</html>
