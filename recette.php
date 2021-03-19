
<h2>Voici certaines recettes</h3>
<?php


include("connect.php");

echo "<form method='post'>";

$req3recette=mysqli_query($connect,"select * from recette limit 9,13") or die ("Erreur de selection");

echo "<table class='table-recette'> <th>Nom</th> <th>Ingrédients</th> <th>Cout</th> <th>Photo</th>";

	while($reqresultat=mysqli_fetch_row($req3recette))
	{
		$listenom=$reqresultat[1];
		$listeingred=$reqresultat[2];
		$listecout=$reqresultat[5];
		$listephoto=$reqresultat[7];	
	
		
	 echo "<tr> <td>$listenom</td> <td>$listeingred</td> <td>$listecout $</td> <td><img src='photo/bouffe/$listephoto' ></img></td></tr>";	
	
	
	}
		
echo "</table> </form>";
	
	
?>