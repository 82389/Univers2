<?php
	require "session.php";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	//is het formulier verstuurd?
	if (isset($_POST['submit']))
		
	{
	//voeg de koppeling naar de database toe
	require 'config.php';
	
	//Lees het formulier uit
	$Studentennummer = $_POST['Studentennummer'];
	$Naam = $_POST['Naam'];
	$Achternaam = $_POST['Achternaam'];
	$Klas = $_POST['Klas'];
	$Tijd_van_komst = $_POST['tijd'];
	
	
	//maak de query
	$query = "UPDATE C3_Studenten_klas
			  SET Naam = '$Naam', Achternaam = '$Achternaam', Klas = '$Klas', Tijd_van_komst = '$Tijd_van_komst'
			  WHERE Studentennummer = '$Studentennummer'";
	
	//TEST: schrijf de query naar het sherm (TIJDELIJKE CODE)
	//echo $query . "<br/>";
	
	//als de opdracht goed wordt uitgevoerd:
	if(mysqli_query($mysqli, $query))
	{
		echo "<p>Reservering voor ouder avond van $Naam om $Tijd_van_komst is succesvol ingepland!</p>";
	}
	//anders
	else
	{
		echo "<p>FOUT bij reserveren voor ouderavond voor leerling met studentnummer: $Studentennummer.</p>";
		echo mysqli_error($mysqli); //LET OP: tijdelijk toevoegen
	}
}
	else
	{
	echo "<p>Geen gegevens ontvangen...</p>";	
	}
	echo "<p><a href='homeouders.php'>Terug</a></p>";
?>
</body>
</html>