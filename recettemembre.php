<?php  

$idmembre= $_SESSION["idmembre"];

echo "Recettes du membre.";

echo"<p><a href='membre.php?lien=insrecettemembre'><input type='button' name='ins' value='Nouvelle recette'></input></a>";
include("connect.php");
	/*Debut:: Mise a jour des donnes       */
		
		//Pour modifier une recette
		if (isset($_POST["update"]))
		{
			//1--Recuperation des donnees a mettre a jour
			$idrecettemaj=$_POST["id_recette"];
			
			$nommaj=$_POST["nom"];
			$ingredientmaj=$_POST["ingredient"];
			$prepamaj=$_POST["listeprepa"];
			$nbmaj=$_POST["nb"];
			$coutmaj=$_POST["cout"];
			$datemaj=$_POST["dateprepa"];
			$photomaj=$_POST["photo"];
			$idmembremaj=$_POST["idmembre"];
			
			//2--Requete de mise a jours
			$reqmiseajour=mysqli_query($connect,"update recette set nom='$nommaj',ingredient='$ingredientmaj',preparation='$prepamaj',nombrepersonne='$nbmaj',
			cout='$coutmaj',dateinscrite='$datemaj',photo='$photomaj',idmembre='$idmembremaj' where idrecette='$idrecettemaj'") or die ("Erreur de mise a jour");
		
			//3--Analyse et affichage des resultats de la requete
			$nbremaj=mysqli_affected_rows($connect);
			if($nbremaj>0)
			{
				echo "<br>Mise a jour de la recette" . $nommaj . " reussi";
			}
			else 
			{
				echo "<br>Aucune mise a jour";
			}
		}
	
		
	
	/*Debut:: Mise a jour des donnes       */

	if(isset($_GET["oper"]))
	{
		$oper=$_GET["oper"];
		
		
		//Selon la requete a effectuer
		switch($oper)
		{
			case "Maj":
				$idrecette=$_GET["idrecette"];
			break;
			
			case "Sup":
				$supidrecette=$_GET["idrecette"];
				
				//Je vais chercher le nom de la recette
			$reqlisterecette2=mysqli_query($connect,"select * from recette") or die ("Erreur de selection 2");
					while($reqresultat2=mysqli_fetch_row($reqlisterecette2))
					{
						$listerecette2=$reqresultat2[1];
					}
					
					//Requete de suppression
				$reqsupclient=mysqli_query($connect,"delete from recette where idrecette='$supidrecette'") or die ("Erreur de suppression");
					
					$nbresup=mysqli_affected_rows($connect);
					if($nbresup > 0)
					{
						echo "<br>Suppression de " . $listerecette2 . " reussi!";
					}
					
					else
					{
						echo "<br>Echec de suppression";
					}
			break;
			
			case "Ins":
				$insidrecette=$_GET["idrecette"];
				
			break;
		}
	
	}

	else 
	{
		$idrecette='';
	}
//Liste de clients
//1--Connexion deja etablie
//2--
echo "<form method='post'>";

//echo"<a href='admin.php?lien=insrecette'><input type='button' name='ins' value='Nouvelle recette'></input></a>";

//echo"<tr><td><a href='admin.php?lien=insrecette'><input type='button' name='ins' value='Nouvelle recette'></input></a></td></tr>";

echo"<div style='margin:30px'></div>";

$reqlisterecette=mysqli_query($connect,"select * from recette where idmembre='$idmembre' ") or die ("Erreur de selection");



echo "<table border=5> <th>Id recette</th> <th>Nom</th> <th>Ingredients</th> <th>Preparation </th><th>Nombre de personne</th>

<th>Cout</th><th>Date</th> <th>Photo</th><th>Id membre</th> <th>Maj</th><th>Sup</th>";
	while($reqresultat=mysqli_fetch_row($reqlisterecette))
	{
		$listeidrecette=$reqresultat[0];
		$listenom=$reqresultat[1];
		$listeingredient=$reqresultat[2];
		$listepreparation=$reqresultat[3];
		$listenbpersonne=$reqresultat[4];
		$listedate=$reqresultat[6];	
		$listecout=$reqresultat[5];
		$listephoto=$reqresultat[7];
		$listeidmembre=$reqresultat[8];
		
		if($listeidrecette==$idrecette)
		{
			echo "<tr>
			
	
			<td><input name='id_recette' value='$listeidrecette'></td>
			<td><input name='nom' value='$listenom'></td>
			<td><input name='ingredient' value='$listeingredient'></td>
			<td><input name='listeprepa' value='$listepreparation'></td>
			<td><input name='nb' value='$listenbpersonne'></td>
			<td><input name='cout' value='$listecout' ></td>
			<td><input name='dateprepa' value='$listedate'></td>
			<td><input name='photo' value='$listephoto'></td>
			<td><input name='idmembre' value='$listeidmembre'></td>
			
			<td><input type='submit' name='update' value='Maj'></td>
			
				</tr>";
		}
		
		else
		{
		
		echo "<tr> <td>$listeidrecette</td> <td>$listenom</td> <td>$listeingredient</td> <td>$listepreparation</td>
	
	<td>$listenbpersonne</td><td>$listecout $</td> <td>$listedate</td> <td><img src='photo/bouffe/$listephoto' style='height:100px;width:100px'></img></td>  <td>$listeidmembre</td> 
	<td><a href='membre.php?lien=recettemembre&idrecette=$listeidrecette&oper=Maj'> Maj </a></td>
	<td><a href='membre.php?lien=recettemembre&idrecette=$listeidrecette&oper=Sup'> Sup </a></td> 
 	

	</tr>";	
	
		}	
	}
		
echo "</table>";
echo"</form>";
	
?>