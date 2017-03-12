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
			
				<?php
				
					//Importation des classes
				 include "../classes/PATRIMOINE.php";
				 include "../classes/IMMOBILIER.php";
				 
				 
				//////// Creation du Patrimoine ////////
				
				// On ne met pas l'id car auto incrémenté
				$libPatrimoine = $_POST['nom'];
				 
				$newPatrimoine = New PATRIMOINE();
				$newPatrimoine->construct(null, $libPatrimoine);
				$newPatrimoine->create();
				
				//////// Remplissage de Immobilier ////////
					// Récupération de la refPatrimoine::::::::::::::::::::
				include "../connexionBD.php";
					
					$Fin = "SELECT MAX(idPatrimoine) AS id FROM PATRIMOINE";
					$valFin = $bd->query($Fin) or die(print_r($bd->errorInfo(), true));
					while ($line = $valFin->fetch()){
						$dernier = $line['id'];
					}
					
					//:::::::::::::::::::
					
				$refEntite = $_POST['type'];
				$refCategorie = $_POST['categorie'];
				$adresse = $_POST['adresse'];
				
				 
				$newPatrimoine = New IMMOBILIER();
				$newPatrimoine->construct(/* null, $libPatrimoine, */ $dernier, $refEntite, $refCategorie, $adresse);
				$newPatrimoine->create();

				?>
			
				<h2> - Patrimoine Ajouté avec succès - </h2>
				<hr><hr><br/>
				
				
				
			</section>
			
			<footer>			
				Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>
