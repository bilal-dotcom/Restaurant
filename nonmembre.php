
<div class="newmembre">

	<img src="photo/new_membre.svg"></img>


	<div>

<?php

include("connect.php");

function test_input($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	
}


//Genere les options pour jour, mois, annee
//Deux arguments: $a est pour le debut et $b pour la fin
function JourMoisAnnee($a,$b)
{
	for($i=$a;$i<=$b;$i++)
	{
		echo "<option value='$i'>$i</option>";
	}
}

?>

	<h3> Inscription de nouveaux membres! </h3>
	<form method="post">
		<table>
			<tr><td>Nom</td><td><input type='text' name='nomnewmembre'> </input></td></tr>
			<tr><td>Prénom</td><td><input type='text' name='prenomnewmembre'> </input></td></tr>
			<tr><td>Téléphone</td><td><input type='text' name='telmembre'> </input></td></tr>
			<tr><td>Adresse</td><td><input type='text' name='adressemembre'> </input></td></tr>
			<tr>
				<td>Date de naissance</td>
				<td>
					<select name="jour">
						<option value="">JJ</option>

						<?php
						    JourMoisAnnee(1,31)
						?>
					</select>

					<select name="mois">
						<option value="">MM</option>
						<?php
						    JourMoisAnnee(1,12)
						?>
					</select>
					
					<select name="annee">
						<option value="">AAAA</option>
						<?php
						    JourMoisAnnee(1980,2100)
						?>
					</select>
				</td>
			</tr>
			<tr><td>Utilisateur</td><td><input type="text" name="loginmembre"> </input></td></tr>
			<tr><td>Mot de passe</td><td><input type="password" name="passwordmembre"> </input></td></tr>
			<tr><td><input type="submit" name="entrermembre" value="Inscription"> </input></td>
			
			<?php
				
				if (isset($_POST["entrermembre"]))
				{
					$nom=($_POST['nomnewmembre']);
					$prenom=($_POST['prenomnewmembre']);
					$tel=($_POST['telmembre']);
					$address=($_POST['adressemembre']);
					$journaissance=($_POST['jour']);
					$moisnaissance=($_POST['mois']);
					$anneenaissance=($_POST['annee']);
					$datenaissance=$anneenaissance.'-'.$moisnaissance.'-'.$journaissance;
					$login=($_POST['loginmembre']);
					$passwd=($_POST['passwordmembre']);
					
					$code=substr($nom,0,3).substr($prenom,0,2).$anneenaissance;
					
					if($nom=='')
					{
						echo"Veuillez entrer un nom";
					}
					else if($prenom=='')
					{
						echo"Veuillez entrer un prénom";
					}
					else if($tel=='')
					{
						echo"Veuillez entrer un téléphone";
					}
					else if($address=='')
					{
						echo"Veuillez entrer une addresse";
					}
					else if($datenaissance=='')
					{
						echo"Veuillez entrer une date de naissance";
					}
					else if($login=='')
					{
						echo"Veuillez entrer un nom d'utilisateur";
					}
					else if($passwd=='')
					{
						echo"Veuillez entrer un mot de passe";
					}
					
					else{
						
					$insertion=mysqli_query($connect,"insert into membre VALUES
					('$code','$prenom','$nom','$tel','$address','$datenaissance','$login','$passwd')") or die ("Erreur d'insertion");
		
		$nbre= mysqli_affected_rows($connect);
			if ($nbre>0)
			{
				
				echo "L'insertion de $nom  a été effectué";
				
			}
			else
			{
				echo "Erreur d'insertion. Veuillez réessayer";
			
			}
					}
				}
				
			?>
			
		</table>

</form>

</div>

</div>

