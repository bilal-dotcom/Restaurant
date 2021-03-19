<?php  

$idmembre= $_SESSION["idmembre"];

echo "Recettes de tous les membres.";

	
	//***********  AVANCE ET RECUL **************//
if(isset($_GET["flech"]))
{
	$flech=$_GET["flech"];
	$avancerecul=$_GET["avancerecul"];
	$nbreliste=$_GET["nbreliste"];
	switch($flech)
	{
		case"avant":
			if($avancerecul >=0 and($avancerecul<($nbreliste -3)))
			{
				$avancerecul=$avancerecul+3;
			}
			elseif($avancerecul<($nbreliste -3))
			{
				$avancerecul=$nbreliste;
			}
		break;
		
		case"recul":
			if($avancerecul<=2)
			{
				$avancerecul=0;
			}
			else
			{
				$avancerecul=$avancerecul-3;
			}
		break;
	}
}
else
{
	$avancerecul=0;
}
	


include("connect.php");


echo"<div style='margin:30px'></div>";

$reqlisterecette=mysqli_query($connect,"select * from recette order by idrecette limit $avancerecul,4") or die ("Erreur de selection");

$reqlisterecette2=mysqli_query($connect,"select * from recette ") or die("Erreur de requete!");
$nbreliste=mysqli_num_rows($reqlisterecette2);


echo "<table border=5> <th>Id recette</th> <th>Nom</th> <th>Ingredients</th> <th>Preparation </th><th>Nombre de personne</th>

<th>Cout</th><th>Date</th> <th>Photo</th><th>Id membre</th> ";

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
		
	
		
	 echo "<tr> <td>$listeidrecette</td> <td>$listenom</td> <td>$listeingredient</td> <td>$listepreparation</td>
				<td>$listenbpersonne</td><td>$listecout $</td> <td>$listedate</td> <td><img src='photo/bouffe/$listephoto' style='height:100px;width:100px'></img></td>  <td>$listeidmembre</td> 
			</tr>";	
			
	}
	
	
	echo "<tr>
		      <td colspan='4'><a href='membre.php?lien=recettetousmembres&avancerecul=$avancerecul&nbreliste=$nbreliste&flech=recul'> <--</a> </td>
			  <td colspan='5'style='text-align:right;'> <a href='membre.php?lien=recettetousmembres&avancerecul=$avancerecul&nbreliste=$nbreliste&flech=avant'>  --></a> </td> 
		  </tr>";
		
echo "</table>";
	
	
?>