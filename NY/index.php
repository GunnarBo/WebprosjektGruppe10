<?
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Vulkan mat</title> 
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javaScript" />
		/* Åpne hovedmenyen */
			function openNav() {
	    		document.getElementById("mySidenav").style.width = "100%";
			}

		/* Lukke hovedmenmyen */
			function closeNav() {
	    		document.getElementById("mySidenav").style.width = "0";
			}
	</script>

</head>
<body>
<?
	include_once ('config.php');
	include_once ('func.php');
?>
  <header class="">
    <figure class="logo">
    </figure>
    <aside class="icons">
      <span onclick="openNav()"><i class="fa fa-bars w3-large"></i></span>
    </aside>
  </header>

	<section id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="#">Hjem</a>
	  <a href="#">Serveringssteder</a>
	  <a href="#">Kart</a>
	  <a href="#">Kontakt</a>
	</section>

<main>
<?
	$side   = htmlentities(stripslashes($_GET['side'])); // henter frem side-visning
    $mappe  = "include/"; // mappene filene ligger i
    $deffil = "meny"; // hovedsiden du kommer til
    $ext    = ".php"; // filnavn

    if(empty($side)){ // hvis index.php?side er tom, sender deg til deffil
		include_once("$mappe$deffil$ext");
    } elseif(preg_match('/^[a-z\d]+\z/i', $side) && file_exists("$mappe$side$ext")){ // hvis siden stemmer med bestemmelsene
      	include_once("$mappe$side$ext");
    } elseif(!preg_match('/^[a-z\d]+\z/i', $side)){ // og hvis ikke filnavn er ikke gyldig
        echo '<section class="info">Siden '.$side.' er et ugyldig filnavn!</section>';
    } else { // eller siden finnes ikke i include mappen
        echo '<section class="info">Siden '.$side.' ble ikke funnet.</section>';
    }
?>

<section class="conversion-block">
	NYHETSBRE GÅR HER
</section>

</main>

</body>
</html>
