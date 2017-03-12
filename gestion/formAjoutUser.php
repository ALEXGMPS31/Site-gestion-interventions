<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Ajout - Utilisateur</Title>
		<link rel="stylesheet" type="text/css" href='cssGestion.css'>
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">			
			<header>
				<?php include "logoGestion.php"; ?>
				<h1>Gestion des Interventions</h1>		
			</header>	
			
		<?php include "menuGestion.php"; ?>
		
			<section>
			<br/>
		



			<form method = 'POST' action = 'ajoutUser.php'>
				
				<fieldset><legend>Création d'un nouvel utilisateur</legend><br/>	
						
				<table>
				
				<tr>
					<th>Nom d'utilisateur</th>
					<td><input type ='text' name = 'nom' value ='' /></td>
				</tr>
			
				<tr>
					<th>Mot de passe</th>
					<td><input type ='password' name = 'mdp' value ='' /></td>
				</tr>
				
				<tr>
					<?php 
							include "../connexionBD.php";
							
							$req = "Select idGrade, libelle From GRADE  ORDER BY libelle DESC LIMIT 2";
							$resultat = $bd->query($req);
							
							// Liste Type
							echo"<th>Fonction</th>";	
							echo"<td><select id='grade' name='grade' />"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							echo "<option value='' selected='selected'></option>";
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['idGrade'].">".$ligne['libelle']."</option>";
							}
							
							echo "</select></td>";
					?>
				</tr>
				</table><br/>
				</fieldset>
				<br/>
				
				<p><input type='submit' value='Ajouter'/></p>
				
			</form>



		
			</section>
			
			<footer>			
Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>