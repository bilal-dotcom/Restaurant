

<form method="post">

<?php 
 $memberprenom = $_SESSION["prenom"];

echo "<h3>Bienvenue  " .$memberprenom . "  </h3>";
    
?>

<table>
	<tr><td>Utilisateur</td><td><input type="text" name="log" value=""></td></tr>
	<tr><td>Mot de passe actuel</td><td><input type="password" name="oldpasswd" value=""></td></tr>
	<tr><td>Nouveau mot de passe</td><td><input type="password" name="newpasswd" value=""></td></tr>
</table>

<input type="submit" name="change" value="Changer ">

<?php

include("connect.php");

	if (isset($_POST["change"]))
	{  

		$logg=$_POST["log"];
		$ancienpass=$_POST["oldpasswd"];
		
		
		if ($logg=='')
		{
			echo "Veuillez entrer un nouveau login";
		}
	
	 //	Stocker le mdp du membre dans la variable $passwordbda	
	 $resultat = mysqli_query($connect,"SELECT * FROM membre WHERE prenom= '$memberprenom';");
	
	 $ligne = mysqli_fetch_row($resultat);	
	 $passwordbda= $ligne[7];
		
	   if($passwordbda== $ancienpass)
	   {
	     $newpass=$_POST["newpasswd"];
		
		 $select=mysqli_query($connect,"Update membre set password='$newpass',login='$logg' where prenom='$memberprenom'")
		 or die ("Erreur de modification");

	
	
		 $nbre= mysqli_affected_rows($connect);
			if ($nbre>0)
			{
				//Les meme mdp doivent pas etre entrees
					if($newpass==$passwordbda)
				{
					echo"Le nouveau mot de passe doit etre différent de l'ancien";
				}
					else
				{
					echo "La modification du mot de passe de " .$memberprenom . " a été éffectué";
				}
			}
			else
			{
			   echo "Echec de mise a jour.";
			}
			
		
	   }
	   
	   
	   
	   else
	   {
		   echo "Entrez le bon mot de passe";
	   }
	}
?>

</form>