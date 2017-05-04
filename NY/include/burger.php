<?
	if(isset($_POST['bestill'])){
		$navn				= addslashes($_POST['bestiller_navn']);
		$tlf				= addslashes($_POST['tlf_nr']);
		$epost				= addslashes($_POST['epost']);
		$gjester			= addslashes($_POST['gjester']);
		$dato_bestilt		= addslashes(date("d-m-Y", strtotime($_POST['dato'])));
		$klokken			= addslashes(date("H:i:s", strtotime($_POST['klokken'])));
		$mulig_valg			= array(1,2,3,4,5);

		if(empty($navn)){
			echo '<section class="info">Du har glemt å fylle ut navnet ditt.</section>';
		} elseif(empty($tlf)){
			echo '<section class="info">Du har glemt å fylle ut telefon nummeret ditt.</section>';
		} elseif(strlen($tlf) != 8){
			echo '<section class="fail">Telefon nummeret ser ikke ut til å stemme.</section>';
		} elseif(empty($epost)){
			echo '<section class="info">Du har glemt å fylle ut epost.</section>';
		} elseif(!in_array($gjester, $mulig_valg)){
			echo '<section class="fail">Du kan kun velge antall gjester ut i fra listen.';
		} elseif(empty($dato)){
			echo '<section class="info">Vi har nødt til å vite når du ønsker å bestille bord.</section>';
		} else {
			db_query("INSERT INTO `bord_bestilling` SET `navn`='$navn', `tlf`='$tlf', `epost`='$epost', `antall_personer`='$gjester', `bestillings_dato`='$dato_bestilt', `klokken`='$klokken', `dato_lagt_inn`='$dato', `aktiv`='ja'") or die('Error # 24 -> Bestilling' .mysqli_error());
			echo '<section class="success">Takk. Din bestilling er nå lagt inn.</section>';
			redirect('index.php?side=burger', 4);
		}
	}

	echo '
<section class="contentbox hamburger"></section>
	<section class="contentbox">
	HER KOMMER INFO OM RESTURANTEN
	</section>

	<section class="halfblock light-purple">
	<form action="" method="post">
		<table align="center" cellpadding="0">
			<tr>
				<td colspan="2">Bord bestilling</td>
			</tr>
			<tr>
				<td><input type="text" name="bestiller_navn" placeholder="Vennligst fyll ut navn"></td>
			</tr>
			<tr>
				<td><input type="text" name="tlf_nr" placeholder="Vennligst fyll ut telefonnummer"></td>
			</tr>
			<tr>
				<td><input type="email" name="epost" placeholder="Vennligst fyll ut e-post"></td>
			</tr>
			<tr>
				<td><select name="gjester">
						<option value="null">Velg fra listen</option>
						<option value="1">1 Gjest</option>
						<option value="2">2 Gjester</option>
						<option value="3">3 Gjester</option>
						<option value="4">4 Gjester</option>
						<option value="5">5 Gjester</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input id="date" type="date" name="dato"></td>
			</tr>
			<tr>
				<td><input type="time" type="time" name="klokken"></td>
			</tr>
			<tr align="center">
				<td colspan="2"><input type="submit" name="bestill" value="Bestill!"></td>
			</tr>
		</table>
	</form>
	</section>
	';
?>
