<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Modifier une demande </title>
		<link rel="stylesheet" type="text/css" href="cssGestion.css">
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">
			<header>
				<?php include "logoGestion.php"; ?>
				<h1>Traiter une demande</h1>		
			</header>
				<?php include "menuGestion.php"; ?>
			<section>
			<br/>
				<h2> - Demande mise à jour - </h2>
				<hr><hr><br/>
				
				<?php
				
					//Importation de la classe "demande.php"
				 include "../classes/DEMANDE.php";
				 
				// Attributs
				
				// On ne saisit pas numéro car il est auto incrémenté
				
				
				// Insertion de la demande
			//	$id =$_SESSION['id'];
			//	$dateDemande = date("d/m/20y");
			//	$patrimoine = $_POST['patrimoine'];
				$detail = $_POST['detail'];
				$observation = $_POST['observation'];
				$demande = $_POST['numDemande'];
				$ouvriers = $_POST['nbOuvriers'];
				$nbHeures = $_POST['nbHeures'];
				$dateInterv = $_POST['dateInterv'];
				$etat = $_POST['etat'];
				
				
				
				
				 
				$nouvDemande = New demande();
				$nouvDemande->construct($demande, $etat , null, null, null, null, $detail, $observation, $ouvriers, $nbHeures, $dateInterv ); // Le '0' correspond à refEtat -> Par défaut une new demande est tjr à l'étant "En Attente"
				$nouvDemande->update();	
				
				
				
				echo "<p><i>Modification de la demande effectué avec succès, vous allez être redirigé</i></p>";
				header( "refresh:1;url=traiter.php?numDemande=".$demande);
				
				
				?>
				
			</section>
			
			<footer>			
				Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>
