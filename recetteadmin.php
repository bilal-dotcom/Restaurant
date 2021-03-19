<?php
//Liste des recettes
//1)connexion deja etablie
/*  
Debut:::Mise a jour et Suppression MULTIPLE
*/

include("connect.php");

if(isset($_POST[' ']))
{
	$check=$_POST['check'];
	$idrecettehidden=$_POST['idrecettehidden'];
	$nbrerowid=count($idrecettehidden);
	$nbrecheck=count($check);
	
	$idrecette=$_POST['idrecette'];
	$nom=$_POST['nom'];
	$ingredient=$_POST['ingredient']; 
	$prepa=$_POST['prepa'];
	$nb=$_POST['nbpersone']; 
	$cout=$_POST['cout'];
	$date=$_POST['date']; 
	$photo=$_POST['photo'];
	$idmembre=$_POST['idmembre']; 
	
	//Le bouton de mise a jour et de suppression
	$recette=$_POST['recette'];
	switch($recette)
	{ 
		case"Update";
			if(!empty($check))
			{
				for($j=0;$j<$nbrerowid;$j++)
				{
					for($i=0;$i<$nbrecheck;$i++)
					{
						if($check[$i]==$idrecettehidden[$j])
						{
							/*$reqmiseajour="update clients set idclient=(substr('$nom[$j]',1,3).substr('$prenom[$j]',1,1)),
							prenom='$prenom[$j]',nom='$nom[$j]',tel='$telephone[$j]',
							login='$login[$j]',password='$password[$j]' where idclient='$check[$i]'";
							
							*/ 
							$reqmiseajour="update recette set idrecette='$idrecette[$j]',nom='$nom[$j]',ingredient='$ingredient[$j]',
							preparation='$prepa[$j]',nombrepersonne='$nb[$j]',cout='$cout[$j]',dateinscrite='$date[$j]',
							photo='$photo[$j]',idmembre='$idmembre[$j]' where idrecette='$check[$i]'";
							$miseajour=mysqli_query($connect,$reqmiseajour) or die("Erreur de requete Update!");
						}
					}
					
				}
				$nbremaj=mysqli_affected_rows($connect);
				if($nbremaj >0)
				{ 
					echo"Mise a jour OK!";
				}
			}
		
		break;
		case"Delete";
			if(!empty($check))
			{
				for($j=0;$j<$nbrerowid;$j++)
				{
					for($i=0;$i<$nbrecheck;$i++)
					{
						if($check[$i]==$idrecettehidden[$j])
						{
							$requetes="delete from recette where idrecette='$check[$i]'";
							$suppression=mysqli_query($connect,$requetes) or die("Erreur de requete Delete!");
						}
					}
				}
				$nbresup=mysqli_affected_rows($connect);
				if($nbresup >0)
				{ 
					echo"Supression OK!";
				}
			}
		
		break;
	}
}

//Affichage et selection depuis la base

echo "<form method='post'>";

echo"<a href='admin.php?lien=insrecette'><input type='button' name='ins' value='Nouvelle recette'></input></a>";

$reqlisteclient=mysqli_query($connect,"select * from recette ") or die("Erreur de requete!");

echo "<h3> Liste des recettes </h3>";


			echo"	<input type='submit' name='recette' value='Update'>
					<input type='submit' name='recette' value='Delete'>		";
					
echo "<table border='1'>
		<th></th>	<th> Idrecette</th>	<th>Nom </th>	<th>Ingredients </th>
	<th>Preparation </th>	<th>Nb de personne </th>	<th>Cout </th>
<th>Date </th><th> Photo</th> <th>Id membre</th>";
while($reqresultat=mysqli_fetch_row($reqlisteclient))
{
	$listeidrecette=trim($reqresultat[0]);
	$listenom=trim($reqresultat[1]);
	$listeingredient=trim($reqresultat[2]);
	$listeprepa=trim($reqresultat[3]);
	$listepersonne=trim($reqresultat[4]);
	$listecout=trim($reqresultat[5]);
	$listedatenaissance=trim($reqresultat[6]);
	$listephoto=trim($reqresultat[7]);
	$listeidmembre=trim($reqresultat[8]);
	echo"<tr>
			<td><input type='checkbox' name='check[]' value='$listeidrecette'></td>
			<td><input type='text' name='idrecette[]' value='$listeidrecette'> 
			<input type='hidden' name='idrecettehidden[]' value='$listeidrecette'> </td>
	
			<td><input type='text' name='nom[]' value='$listenom'> </td>
			<td><input type='text' name='ingredient[]' value='$listeingredient'> </td>
			<td><input type='text' name='prepa[]' value='$listeprepa'> </td>
			<td><input type='text' name='nbpersone[]' value='$listepersonne'> </td>
			<td><input type='text' name='cout[]' value='$listecout'> </td>
			<td><input type='text' name='date[]' value='$listedatenaissance'> </td>
			<td><input type='text' name='photo[]' value='$listephoto' > </td>	
			<td><input type='text' name='idmembre[]' value='$listeidmembre ' > </td>	

		</tr>";
}
echo "</table></form>";
	
?>