<?php
	require "session.php";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Aanmeldtformulier</title>
<script src="jquery-3.3.1.min.js"></script>
</head>

<body>
<?php
	require 'config.php';														//voeg het bestand config.php toe
	 	
	echo "<h1>Welkom, " . $_SESSION['Studentennummer'] . "</h1>";
	$Studentnummer = $_SESSION['Studentennummer'];
	//Haal het user-id uit de url
	$query = "SELECT * FROM C3_Studenten_klas WHERE Studentennummer =  '$Studentnummer'"; 			//maak de query
	$resultaat = mysqli_query($mysqli, $query);	
		
	//Voer de query uit
	if (mysqli_num_rows($resultaat) == 0)										//Als het resultaat uit 0 rijen bestaat
	{
		echo "<p>Er is geen student met het studentnummer: $Studentnummer.</p>";
	}
	
	else 																		//als er wel rijen zijn gevonden
	{
		$rij = mysqli_fetch_array($resultaat);
?>

	<form name="AanmeldOuder" class="form" method="post" action="formulieraanmeldt_verwerk.php">
		<table width="200" border="0">
			<tr>														
				<td>Studentennummer:</td>
				<td><input type="number" name="Studentennummer" value="<?php echo $rij['Studentennummer'] ?>" readonly disabled></td>
			</tr>
			<tr>														
				<td>Voornaam:</td>
				<td><input type="text" name="Naam" value="<?php echo $rij['Naam'] ?>" readonly disabled></td>
			</tr>
			<tr>														
				<td>Achternaam:</td>
				<td><input type="text" name="Achternaam" value="<?php echo $rij['Achternaam'] ?>" readonly disabled></td>
			</tr>
			<tr>
				<td>Klas</td>
				<td><input type="text" name="Klas" value="<?php echo $rij['Klas'] ?>" readonly disabled></td>
			</tr>
			<tr>
			<td>Time</td><br>
			<?php
			$klas = $rij['Klas'];
			
		
			$result = $mysqli->query("SELECT DISTINCT`Tijd`, ID FROM `C3_Tijden`, `C3_Studenten_klas` WHERE C3_Studenten_klas.Klas = '$klas' AND C3_Studenten_klas.Klas = C3_Tijden.Klas AND C3_Tijden.Gekozen = ''");
			
			//query("SELECT ID, Tijd FROM C3_Tijden");
		
			//$tijdq = "SELECT `Tijd` FROM `C3_Tijden`, `C3_Studenten_klas` WHERE C3_Studenten_klas.$klas = C3_Tijden.$klas AND C3_Tijden.Gekozen = '';"
		
				//SELECT 'Tijd' FROM 'C3_Tijden', 'C3_Studenten_klas' WHERE C3_Studenten_klas.Klas = C3_Tijden.Klas AND C3_Tijden.Gekozen = '';
				//SELECT ID, Tijd FROM C3_Tijden
    			//$time = array('17:30','17:40', '17:50', '18:00','18:10','18:20','18:30','18:40','18:50','19:00');
	
    		?>
			<td>
    		<select name="tijd">
    			<option selected disabled>Kies je tijd.</option>
					
    		<?php
    			while ($row = $result->fetch_assoc())
				{
					unset($ID, $Tijd_van_komst);
					$ID = $row['ID'];
					$Tijd_van_komst = $row['Tijd'];
					echo "<option value='" . $Tijd_van_komst . "'>";  
					echo $Tijd_van_komst;
					echo "</option>";
				}
    		?>

    </select></td>
			</tr>
			<tr>
				<br/>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Reserveren"></td>
			</tr>
		</table>
	</form>

<?php
	}
	echo "<p><a href='homeouders.php?'>Terug</a> naar overzicht.</p>";
?>
</body>
</html>