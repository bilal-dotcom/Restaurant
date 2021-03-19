
<?php

include("connect.php");

$idd=$_SESSION["idmembre"];

?>

	<h3> Inscription de nouvelles recettes! </h3>
	<form  enctype="multipart/form-data"  method="post">
		<table>
			<tr><td>Nom</td><td><input type='text' name='nomrecette'> </input></td></tr>
			<tr><td>Ingredients</td><td><input type='text' name='ingredient'> </input></td></tr>
			<tr><td>Preparation</td><td><input type='text' name='prepa'> </input></td></tr>
			<tr><td>Nombre de personne</td><td><input type="text" name="nb"> </input></td></tr>
			<tr><td>Cout</td><td><input type="text" name="cout"> </input></td></tr>
			<tr><td>Date</td><td><input type='date' name='date'> </input></td></tr>
	     	 <tr><td>Photo </td><td><input type="file" name="uploaded_file"></input></td></tr>
			<!--<tr><td>Id membre</td><td><input type='text' name='idmembre'> </input></td></tr>-->
			<tr><td><input type="submit" name="entrerrecette" value="Inscription recette"> </input></td>
		

		
			<?php
				
							
echo "Nouvelle recette de ". "$idd <br>" ;
  if(!empty($_FILES['uploaded_file']))
  {
	  
	   $photo=$_FILES['uploaded_file']['name'];
	  
   $path = "photo/bouffe/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded <br>";
    } else{
        echo "<br>There was an error uploading the file, please try again!";
    }
  }

				
				
				if (isset($_POST["entrerrecette"]))
				{
					$nom=($_POST['nomrecette']);					$ingredient=($_POST['ingredient']);
					$prepa=($_POST['prepa']);
					$nb=($_POST['nb']);
					$cout=($_POST['cout']);
					$date=($_POST['date']);
					//$photo=($_POST['uploaded_file']);
					//$idmembre=($_POST['idmembre']);
					
					if($nom=='')
					{
						echo"Veuillez entrer un nom pour la recette";
					}
					else if($ingredient=='')
					{
						echo"Veuillez entrer les ingredients";
					}
					else if($prepa=='')
					{
						echo"Veuillez entrer les preparations";
					}
					else if($nb=='')
					{
						echo"Veuillez entrer le nombre de personne";
					}
					else if($cout=='')
					{
						echo"Veuillez entrer le cout";
					}
					else if($date=='')
					{
						echo"Veuillez entrer la date";
					}
					else if($photo=='')
					{
						echo"Veuillez entrer la photo";
					}
					else{
						
					$insertion=mysqli_query($connect,"insert into recette (nom,ingredient,preparation,nombrepersonne,cout,dateinscrite,photo,idmembre)
					VALUES
					('$nom','$ingredient','$prepa','$nb','$cout','$date','$photo','$idd')") or die ("Probleme d'insertion");
		
		$nbre= mysqli_affected_rows($connect);
			if ($nbre>0)
			{
				
				echo "<br>L'insertion de  $nom  a été éffectué";
				
			}
			else
			{
				echo "<br>Probleme d'insertion";
			}
					}
				}
				
			?>
			
			
		</table>

</form>

</div>