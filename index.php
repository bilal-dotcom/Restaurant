<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bonnebouffe</title>
	<link rel="stylesheet" type="text/css" href="style/index.css">

</head>
<body>

<center>

<!-- header -->
	<header >

		<img src="photo/montreal.jpg"></img>

	<!-- Navbar -->
		<nav >
			<!-- Section menu-->
				<ol>
					<li><a href="index.php?lien=accueil"> Accueil </a></li>
					<li><a href="index.php?lien=login"> Login </a></li>
					<li><a href="index.php?lien=recette"> Recettes </a></li>
					<li><a href="index.php?lien=contact"> Contacts </a></li>
					<li><a href="index.php?lien=reference"> References</a></li>
				</ol>
		</nav>
	<!-- End Navbar -->

</header>

<!-- end header -->



		<!-- Section details-->
		
	<?php

		//Recuperation du lien cliquer
		if (isset ($_REQUEST["lien"]))
		{
			$lien=$_REQUEST["lien"];

			
		//Selon le lien cliquer
				//Selon le lien cliquer
			switch ($lien)
			{
			
				case "accueil":
					include("accueil.php");
				break;
				case "login":
					include("login.php");
				break;
				case "recette":
					include("recette.php");
				break;
				case "contact":
					include("contact.php");
				break;
				case "reference":
					include("reference.php");
				break;
				case "nonmembre":
					include("nonmembre.php");
				break;
			}
		
		}
		
		else
		{
			include("accueil.php");	
		}


	?>

	<?php
		include("footer.php");
	?>

</body>

	</center>
</html>




