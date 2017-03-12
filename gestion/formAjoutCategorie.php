<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Ajout - Categorie</Title>
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
		



			<form method = 'POST' action = 'ajoutCategorie.php'>
				
				<fieldset><legend>Saisissez la référence et le nom de la nouvelle Categorie</legend><br/>	
						
				<table>
				<p><i>Une abréviation du nom complet est conseillée en guise de référence</i></p>
				<tr>
					<th>Référence</th>
					<td><input type ='text' name = 'ref' value ='' /></td>
				</tr>
			
				<tr>
					<th>Nom</th>
					<td><input type ='text' name = 'lib' value ='' /></td>
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