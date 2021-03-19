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

<header>

	<img src="photo/montreal.jpg"></img>

	<nav>
		<ol>
			<li><a href="membre.php?lien=membremembre"> Membre </a></li>
			<li><a href="membre.php?lien=recettemembre"> Recettes du membre </a></li>
			<li><a href="membre.php?lien=recettetousmembres"> Recettes </a></li>
			<li><a href="membre.php?lien=search">Recherche</a></li>
			<li><a href="membre.php?lien=decomembre"> Deconnexion </a></li>
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
		
			case "membremembre":
				include("membremembre.php");
			break;
			case "recettemembre":
				include("recettemembre.php");
			break;
			case "recettetousmembres":
				include("recettetsmembres.php");
			break;
			case "search":
				include("recherche.php");
			break;
			case "decomembre":
				include("decomembre.php");
			break;
			case "insrecettemembre":
				include("insrecettemembre.php");
			break;
		}
	
	}

include("footer.php");

?>

</div>

</center>