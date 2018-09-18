<?php
	require "session.php";
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Overzicht ouders</title>
</head>

<body>
<?php
	require 'config.php';														//voeg het bestand config.php toe
	 	
	echo "<h1>Welkom, " . $_SESSION['Studentennummer'] . "</h1>";
	$Studentnummer = $_SESSION['Studentennummer'];
	
	//Haal het user-id uit de url
	$query = "SELECT * FROM C3_Studenten_klas WHERE Studentennummer =  '$Studentnummer'";
	
	//voer de opdracht uit
	//zet het resultaat in een variabele
	$result = mysqli_query($mysqli, $query);
	
	
	//(even testen.......)
	//var_dump($result);
	
	//start de tabel
	echo "<table border='1'>";
	
	//rijen uitlezen
	while ($row = mysqli_fetch_array($result))
	{
	//gegevens van rij tonen
		echo "<tr><td>Studentennummer:</td>";
		echo 	"<td>" . $row['Studentennummer'] . "</td></tr>";
		echo "<tr><td>Naam:</td>";
		echo 	"<td>" . $row['Naam'] . "</td></tr>";
		echo "<tr><td>Tussenvoegsel:</td>";
		echo 	"<td>" . $row['Tussenvoegsel'] . "</td></tr>";
		echo "<tr><td>Achternaam:</td>";
		echo 	"<td>" . $row['Achternaam'] . "</td></tr>";
		echo "<tr><td>Leeftijd:</td>";
		echo 	"<td>" . $row['Leeftijd'] . "</td></tr>";
		echo "<tr><td>Klas:</td>";
		echo 	"<td>" . $row['Klas'] . "</td></tr>";
		echo "<tr><td>Geslacht:</td>";
		echo 	"<td>" . $row['Geslacht'] . "</td></tr>";
		echo "<tr><td>Tijd_van_komst:</td>";
		echo 	"<td>" . $row['Tijd_van_komst'] . "</td></tr>";
		echo "<tr><td>Komt:</td>";
		echo 	"<td>" . $row['Komt'] . "</td></tr>";
	}
	
	echo "</table>";
		
	echo "<p>Nog geen tijd ingeplant?<a href='formulieraanmeldt.php?'> Klik hier!</a></p>";
	
?>
</body>
</html>