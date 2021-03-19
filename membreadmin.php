<h2>Liste des membres</h2>

<?php

include("connect.php");
	/*Debut:: Mise a jour des donnes       */
		
		if (isset($_POST["update"]))
		{
			//1--Recuperation des donnees a mettre a jour
			$idmembremaj=$_POST["id_client"];
			
			
			$nommaj=$_POST["nom"];
			$prenommaj=$_POST["prenom"];
			$telmaj=$_POST["tel"];
			$adressmaj=$_POST["listeaddresse"];
			$datemaj=$_POST["datenaissance"];
			
			//2--Requete de mise a jours
			$reqmiseajour=mysqli_query($connect,"update membre set prenom='$prenommaj',nom='$nommaj',telephone='$telmaj',adresse='$adressmaj',datedenaissance='$datemaj'
			where idmembre='$idmembremaj'") or die ("Erreur de update");
		
			//3--Analyse et affichage des resultats de la requete
			$nbremaj=mysqli_affected_rows($connect);
			if($nbremaj>0)
			{
				echo "Mise a jour ok!";
				
			}
			else 
			{
				echo "Aucune mise a jour";
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
				$idclient=$_GET["idclient"];
			break;
			
			case "Sup":
				$supidclient=$_GET["idclient"];
					//Requete de suppression
					$reqsupclient=mysqli_query($connect,"delete from membre where idmembre='$supidclient'") or die ("Erreur de suppression");
					
					$nbresup=mysqli_affected_rows($connect);
					if($nbresup > 0)
					{
						echo "Suppression de " . $supidclient . " reussi!";
					}
					
					else
					{
						echo "Echec de suppression";
					}
			break;
		}
	
	}

	else 
	{
		$idclient='';
	}
//Liste de clients
//1--Connexion deja etablie
//2--
echo "<form method='post'>";

$reqlisteclient=mysqli_query($connect,"select * from membre") or die ("Erreur de selection");

echo "<table border=1> <th>Id membre</th> <th>Prenom</th> <th>Nom</th> <th>Telephone</th><th>Addresse</th>

<th>Date de naissance</th> <th>Maj</th><th>Sup</th>";
	while($reqresultat=mysqli_fetch_row($reqlisteclient))
	{
		$listeidmembre=$reqresultat[0];
		$listeprenom=$reqresultat[1];
		$listenom=$reqresultat[2];
		$listetel=$reqresultat[3];
		$listeaddresse=$reqresultat[4];
		$listedate=$reqresultat[5];
		
		if($listeidmembre==$idclient)
		{
			echo "<tr>
			
			<td><input name='id_client' value='$listeidmembre'></td>
			<td><input name='prenom' value='$listeprenom'></td>
			<td><input name='nom' value='$listenom'></td>
			<td><input name='tel' value='$listetel'></td>
			<td><input name='listeaddresse' value='$listeaddresse'></td>
			<td><input name='datenaissance' value='$listedate'></td>
			<td><input type='submit' name='update' value='Maj'></td>
			
				</tr>";
		}
		
		else
		{
		
		echo "<tr> <td>$listeidmembre</td> <td>$listeprenom</td> <td>$listenom</td> <td>$listetel</td> <td>$listeaddresse</td>
	
	<td>$listedate</td> 
	<td><a href='admin.php?lien=membreadmin&idclient=$listeidmembre&oper=Maj'> Maj </a></td>
	<td><a href='admin.php?lien=membreadmin&idclient=$listeidmembre&oper&oper=Sup'> Sup </a></td> 

	</tr>";	
	
		}	
	}
		
echo "</table>";
echo"</form>";
	
?>