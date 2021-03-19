<!-- Methode de Javascript pour imprimer -->
<script>
	window.print();
</script>

<?php
$total=0;

//1) Recuperation du code a retrouver pour imprimer
	include("connect.php");
	$val=$_GET["val"];
	//2) connexion avec mysql deja etablie
	//3) Requete SQL
	$requete=mysqli_query($connect,"SELECT * FROM recette WHERE nom  LIKE '%$val%'");
	//Analyse et affichage des resultats
		$val=strtoupper($_GET["val"]);
		echo "<h3>Liste de recettes trouv&eacute; pour $val !</h3>";
		echo"<table>
		
		<tr><th> Idrecette</th>	<th>Nom </th>	<th>Ingredients </th>
	<th>Preparation </th>	<th>Nb de personne </th>	<th>Cout </th>
   <th> Photo</th> <th>Id membre</th></tr>";
		
			while ($result=mysqli_fetch_row($requete))
		{
			  $idrecette = $result[0];
		$nom = $result[1];
		$ingredient = $result[2];
		$prepa = $result[3];
		$nbpersonne = $result[4];
		$cout = $result[5];
		$photo = $result[7];
		$idmembre = $result[8];
		$total += $cout*$nbpersonne;
			
			//affichage des donnees dans un tableau
			echo"<tr><td>$idrecette</td><td>$nom</td><td>$ingredient</td><td>$prepa</td><td>$nbpersonne</td><td>$cout</td>
				     <td><img src='photo/bouffe/$photo'  style='height:100px;width:150px'></img></td><td>$idmembre</td>
			  </tr>";
		}
	echo "<tr><td colspan='5' align='right'>TOTAL: $total $</td></tr>";

?>

