<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Ajout</Title>
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
		



			<form method = 'POST' action = 'ajoutPatrimoine.php'>
				
				<fieldset><legend>Ajout Patrimoine</legend><br/>	
						
				<table>
			
				<tr>
					<th>Nom du patrimoine</th>
					<td><input type ='text' name = 'nom' value ='' /></td>
				</tr>
				<tr>
					
					
					<?php 
							include "../connexionBD.php";
							
							$req = "Select refEntite, libEntite From ENTITE ORDER BY libEntite ASC";
							$resultat = $bd->query($req);
							
							// Liste Type
							echo"<th>Type</th>";	
							echo"<td><select id='type' name='type' />"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							echo "<option value='' selected='selected'></option>";
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refEntite'].">".$ligne['libEntite']."</option>";
							}
							
							echo "</select></td>";
					?>
				</tr>
				
				<tr>
					<?php 
							include "../connexionBD.php";
							
							$req = "Select refCategorie, libCategorie From CATEGORIE ORDER BY libCategorie ASC;";
							$resultat = $bd->query($req);
							
							// Liste Type
							echo"<th>Categorie</th>";	
							echo"<td><select id='categorie' name='categorie' />"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							echo "<option value='' selected='selected'></option>";
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refCategorie'].">".$ligne['libCategorie']."</option>";
							}
							
							echo "</select></td>";
					?>
				</tr>
				<tr>
					<th>Adresse(optionel)</th>
					<td><input type ='text' name = 'adresse' value ='' /></td>
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