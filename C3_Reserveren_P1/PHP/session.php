<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>

	<body>
		<?php
		//start session
		session_start();
		
		//als gebruiker niet is ingelogd
		if (!isset($_SESSION['Studentennummer']))
		{
			//terug sturen
			header("location:../index.html");
		}
		
		?>
	</body>
</html>