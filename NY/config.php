<?php
	//Hente viktige filer
	include_once ('func.php'); // DB connection og diverse!?!?

	// Henter frem IP
	$ip		= $_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'].$_SERVER['REMOTE_ADDR'] : $_SERVER['REMOTE_ADDR'];
	
	// Setter norsk dato, uansett!!
	$dato = date('l j. F Y H:i:s');
	$dato = str_replace ( 'Monday', 'Mandag', $dato );
	$dato = str_replace ( 'Tuesday', 'Tirsdag', $dato );
	$dato = str_replace ( 'Wednesday', 'Onsdag', $dato );
	$dato = str_replace ( 'Thursday', 'Torsdag', $dato );
	$dato = str_replace ( 'Friday', 'Fredag', $dato );
	$dato = str_replace ( 'Saturday', 'Lørdag', $dato );
	$dato = str_replace ( 'Sunday', 'Søndag', $dato );
	$dato = str_replace ( 'January', 'Januar', $dato );
	$dato = str_replace ( 'February', 'Februar', $dato );
	$dato = str_replace ( 'March', 'Mars', $dato );
	$dato = str_replace ( 'April', 'April', $dato );
	$dato = str_replace ( 'May', 'Mai', $dato );
	$dato = str_replace ( 'June', 'Juni', $dato );
	$dato = str_replace ( 'July', 'Juli', $dato );
	$dato = str_replace ( 'August', 'August', $dato );
	$dato = str_replace ( 'September', 'September', $dato );
	$dato = str_replace ( 'October', 'Oktober', $dato );
	$dato = str_replace ( 'November', 'November', $dato );
	$dato = str_replace ( 'December', 'Desember', $dato );
	
	// Kan hente frem klokkeslett i time format
	$klokke = date('H:i:s');
	
	// Henter ID'en til innlogget brukere
	$id 	= $_SESSION["loggetinid"];
	
	// Setter en bestemmelse på $bruker, og viser brukernavn..
	$bruker = $_SESSION["loggetinnbruker"];
	
	// Viser klokke slett i timeformat
	$time 	= time();
?>