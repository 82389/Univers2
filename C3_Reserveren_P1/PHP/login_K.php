
<?php
session_start();
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Inloggen Ouders</title>
	</head>

	<body>
		<?php
		if (isset($_POST['InlogOud']))
		{
			//config.php
			require 'config.php';
			//gegevns lezen
			$GebrNaamOud = $_POST['GebrNaamOud'];
			$WWOud = $_POST['WWOud'];
			//query voor ophalen
			$opg = "SELECT * FROM C3_Studenten_klas
			WHERE Studentennummer = '$GebrNaamOud'
			AND Wachtwoord = '$WWOud'";
			//opg uitvoeren en result vangen
			$result = mysqli_query($mysqli, $opg);
			//controlle result
			if (mysqli_num_rows($result) > 0)
			{
				//user uit result
				$user = mysqli_fetch_array($result);
				//zet in een session
				$_SESSION['Studentennummer'] = $user['Studentennummer'];
				
				echo "<p>Hallo $GebrNaamOud, u bent ingelogd!</p>";
				
				echo "<p>Ga verder naar <a href='homeouders.php'>overzichtspagina!</a></p>";
				
			}
			//result leeg
			else
			{
				echo "<p>Studentennummer en/of wachtwoord zijn onjuist.</p>";
				echo "<p><a href='login_K.php'>Probeer opnieuw</a></p>";
			}
		}
		else
		{
			
		?>
		<h1>Inloggen</h1>
		<form method="post" action="login_K.php">
			<table border="0">
				<tr>
					<td>Studentennummer:</td>
					<td><input type="number" name="GebrNaamOud"></td>
				</tr>
				<tr>
					<td>Wachtwoord:</td>
					<td><input type="password" name="WWOud"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="InlogOud" value="Log in"></td>
				</tr>
			</table>
		</form>
		<?php
		}
		?>
	</body>
</html>