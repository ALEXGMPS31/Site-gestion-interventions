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
			
				<?php
				
					//Importation des classes
				include "../classes/UTILISATEUR.php";
				include "../connexionBD.php";
				 
				$nom = $_POST['nom'];
				$mdp = $_POST['mdp'];
				$grade = $_POST['grade'];
				
				
				$newUser = New UTILISATEUR(); // Création de l'objet
				$newUser->construct(null, $grade, $nom, $mdp);
				//////////////////// Vérification nom user déjà existant /////////////////
				
				$req='SELECT nom FROM UTILISATEUR WHERE nom="'.$nom.'"';
				$req=$bd->query($req);										
				$nb=$req->rowCount();
				
				if($nb==0) {
					$newUser->create(); // Création de l'utilisateur
					echo "<h2> - Utilisateur Ajouté avec succès - </h2>";
				}
				else {
					echo "<script>alert(\"Ce nom d'utilisateur est déjà pris, veuiller en choisir un autre\")</script>"; // nom déjà existant, redirection
					header( "refresh:0.5;url=formAjoutUser.php" );
				}
				
				
				
				
				
				///////////////////////////////////////////////////////////////////////
				// On ne met pas l'id car auto incrémenté
				
				
				 
				
				
				
				

				?>
			
				
				<hr><hr><br/>
				
				
				
			</section>
			
			<footer>			
				Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>
