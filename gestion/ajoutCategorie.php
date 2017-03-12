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
			
				<?php
				
					//Importation des classes
				include "../classes/CATEGORIE.php";
				 
				 
				 
				//////// Creation du Patrimoine ////////
				
				// On ne met pas l'id car auto incrémenté
				$refCategorie = $_POST['ref'];
				$libCategorie = $_POST['lib'];
				
				 
				$newCategorie = New CATEGORIE();
				$newCategorie->construct($refCategorie, $libCategorie);
				$newCategorie->create();
				

				?>
			
				<h2> - Catégorie Ajouté avec succès - </h2>
				<hr><hr><br/>
				
				
				
			</section>
			
			<footer>			
				Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>
