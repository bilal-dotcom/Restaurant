<?php
//Si la session n'est pas demarrer 
	if(!isset ($_SESSION))
	{
	session_start();
	}
?>

<div class="login">

	
	<img src="photo/login.svg"></img>


<div>

	<?php

	function test_input($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
		
	}


	print<<<eof

		<h3> Branchez-vous membre! </h3>
		<form method='post' class='login'>
			<table>
				<tr><td>Utilisateur</td><td><input type="text" name="loginmembre"> </input></td></tr>
				<tr><td>Mot de passe</td><td><input type="password" name="passwordmembre"> </input></td></tr>
				<tr><td><input type="submit" name="entrermembre" value="Entrez "> </input></td>
				<tr><td><a href="index.php?lien=nonmembre">Non membre</a></td></tr>
			</table>
		</form>

		<h3> Branchez-vous admin! </h3>
		<form method='post' class='login'>
			<table>
				<tr><td>Utilisateur</td><td><input type="text" name="loginadmin"> </input></td></tr>
				<tr><td>Mot de passe</td><td><input type="password" name="passwordadmin"> </input></td></tr>
				<tr><td><input type="submit" name="entreradmin"  value="Entrez "> </input></td></tr>
				
			</table>
		</form>
		
	eof;

	//Recuperation des donnees transmises pour ADMIN

		if (isset($_POST["entreradmin"]))
		{
			$loginadmin=test_input($_POST["loginadmin"]);
			$passwordadmin=$_POST["passwordadmin"];
			
			//2--Connexion a la base
			include("connect.php");
			
			//3--Requete sql
			$reqadmin=mysqli_query($connect,"select * from admin where login='$loginadmin' and password='$passwordadmin'");
			
			//4-Analyse et affichage des resultats
			$nbreadmin=mysqli_num_rows($reqadmin);
		
			//Recuperation des donnees par colonnes
			$ligne = mysqli_fetch_row($reqadmin);
			
			if ($nbreadmin ==1)
			{
				//Recuperation des donnnes dans $_SESSION
				//Redirection vers la page index admin.php
			
				$_SESSION["login"]=$ligne[0];
				$_SESSION["password"]=$ligne[1];
				
				echo '<script>window.location.href="admin.php?lien=membreadmin";</script>';
				
			
			}
			else
			{
				echo "Nom d'utilisateur ou mot de passe de l'administrateur incorrecte";
			}
			
		}
		
	//Fin section ADMIN

	//Recuperation des donnees transmises pour MEMBRE

		elseif (isset($_POST["entrermembre"]))
		{
			$loginmembre=test_input($_POST["loginmembre"]);
			$passwordmembre=$_POST["passwordmembre"];
			
			//2--Connexion a la base
			include("connect.php");
			
			//3--Requete sql
			$reqmembre=mysqli_query($connect,"select * from membre where login='$loginmembre' and password='$passwordmembre'");
			
			//4-Analyse et affichage des resultats
			$nbremembre=mysqli_num_rows($reqmembre);
		
			//Recuperation des donnees par colonnes
			$ligne = mysqli_fetch_row($reqmembre);
			
			if ($nbremembre ==1)
			{
				//Recuperation des donnnes dans $_SESSION
				//Redirection vers la page  membre.php
			
				$_SESSION["idmembre"]=$ligne[0];
				$_SESSION["login"]=$ligne[6];
				$_SESSION["password"]=$ligne[7];
				$_SESSION["nom"]=$ligne[2];
				$_SESSION["prenom"]=$ligne[1];
				
				echo '<script>window.location.href="membre.php?lien=membremembre";</script>';
		
			}
			else
			{
				echo "Nom d'utilisateur ou mot de passe du membre incorrecte";
			}
			
		}
		
	//Fin section MEMBRE

	?>

	</div>

</div>


