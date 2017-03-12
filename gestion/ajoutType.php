<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Ajout - Type</Title>
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
				include "../classes/ENTITE.php";
				 
				 
				 
				//////// Creation du Patrimoine ////////
				
				// On ne met pas l'id car auto incrémenté
				$refType = $_POST['ref'];
				$libType = $_POST['lib'];
				
				 
				$newType = New ENTITE();
				$newType->construct($refType, $libType);
				$newType->create();
				

				?>
			
				<h2> - Type Ajouté avec succès - </h2>
				<hr><hr><br/>
				
				
				
			</section>
			
			<footer>			
				Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>
