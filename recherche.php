
<h3>Recherche pour impression </h3>
<div id="form">
   <form method="post">
   <input type="text" name="user_query" placeholder="Recherche d'utilisateur"/>
   <input type="submit" name = "recherche" value="recherche"/>
   </form>

</div>
<script type="text/javascript">
function imprimer(page) {
	window.open(page,"Impression","menubar=no, status=no, scrollbars=no, menubar=no, width=900, height=900");
}
</script>


<?php

include("connect.php");


$total=0;

if (isset($_POST['recherche']))
{
	$val = $_POST['user_query'];
	
	echo "<table><th> Idrecette</th>	<th>Nom </th>	<th>Ingredients </th>
	<th>Preparation </th>	<th>Nb de personne </th>	<th>Cout </th>
<th>Date </th><th> Photo</th> <th>Id membre</th>";
	$requete=mysqli_query($connect,"SELECT * FROM recette WHERE nom  LIKE '%$val%' ;") or die ("Erreur de requete");
	
	$nbre=mysqli_num_rows($requete);
	if($nbre >0)
	{
	
			while ($result=mysqli_fetch_row($requete))
		{	
	    $idrecette = $result[0];
		$nom = $result[1];
		$ingredient = $result[2];
		$prepa = $result[3];
		$nbpersonne = $result[4];
		$cout = $result[5];
		$date = $result[6];
		$photo = $result[7];
		$idmembre = $result[8];
		$total += $cout*$nbpersonne;
		
		echo "<tr><td>$idrecette</td><td>$nom</td><td>$ingredient</td><td>$prepa</td><td>$nbpersonne</td><td>$cout$</td>
				  <td>$date</td><td><img src='photo/bouffe/$photo'  style='height:100px;width:150px'></img></td><td>$idmembre</td>
			  </tr>";
				
		}
	
	
	
		
	echo "<tr><td colspan='5' align='right'>TOTAL: $total $</td></tr>";
				
	
		
		/****************  Section Ouvrir le fichier a imprimer dans une nouvelle fenetre *******************/
		echo" <tr> <td colspan='9' align='right'>
				<a href=\"javascript:imprimer('printrecherche.php?val=$val')\">Print</a></td> </tr></table>";
		/**************** FIn section Impression ****************/	
	}
	else
	{
		echo "Aucune recette trouv&eacute;!";
	}
}

?>