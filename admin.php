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


<?php

	//Si la session n'est pas demarrer 
	if(!isset ($_SESSION))
	{
	session_start();
	}
	
	//Si la session est detruite, retourner a la page d'accueil
	if (!$_SESSION["login"] and !$_SESSION["password"])
	{
		echo "<script> window.location.href='index.php';</script>";
	}
	
?>


<center>
	
<header>

	<img src="photo/montreal.jpg"></img>

	<nav>
		<ol>
			<li><a href="admin.php?lien=membreadmin"> Membre </a></li>
			<li><a href="admin.php?lien=recetteadmin"> Recettes </a></li>
			<li><a href="admin.php?lien=decoadmin"> Deconnexion </a></li>
		</ol>
	</nav>

</header>




<div>
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
		
			case "membreadmin":
				include("membreadmin.php");
			break;
			case "recetteadmin":
				include("recetteadmin.php");
			break;
			case "decoadmin":
				include("decoadmin.php");
			break;
			case "insrecette":
				include("insrecette.php");
			break;
		}
	
	}

?>

</div>

	<?php
		include("footer.php");
	?>

</body>
</center>
</html>