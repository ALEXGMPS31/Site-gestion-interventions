<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Modifier mot de passe</Title>
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
				include "../classes/UTILISATEUR.php";
				 
				
				// On ne met pas l'id car auto incrémenté
				$nom = $_POST['nom'];
				$mdp = $_POST['mdp'];
				
				 
				$newUser = New UTILISATEUR();
				$newUser->construct(null, null, $nom, $mdp);
				$newUser->update();
				

				?>
			
				<h2> - Mot de passe modifié avec succès - </h2>
				<hr><hr><br/>
				
				
				
			</section>
			
			<footer>			
				Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>
