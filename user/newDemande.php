<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Envoyer une demande </title>
		<link rel="stylesheet" type="text/css" href="cssPublique.css">
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">
			<header>
				<?php include "logoUser.php"; ?>
				<h1>Nouvelle demande</h1>		
			</header>
				<?php include "menuPublique.php"; ?>
			<section>
			<br/>
				<h2> - Demande Envoyée - </h2>
				<hr><hr><br/>
				
				<?php
				
					//Importation de la classe "demande.php"
				 include "../classes/DEMANDE.php";
				 
				// Attributs
				
				// On ne saisit pas numéro car il est auto incrémenté
				
				
				// Insertion de la demande
				$id =$_SESSION['id'];
				$dateDemande = date("20y-m-d");
				$patrimoine = $_POST['patrimoine'];
				$detail = $_POST['detail'];
				
				//$pj = $_FILES['pj']; // NE MARCHE PAS !!!!! 
				// move_uploaded_file($pj, $destination);
				 
				$nouvDemande = New demande();
				$nouvDemande->construct(null, '0', $id, "" , $patrimoine, $dateDemande, $detail, "", null, null, null /*, pj*/); // Le '0' correspond à refEtat -> Par défaut une new demande est tjr à l'étant "En Attente"
				$nouvDemande->create();	
				
				
				
				echo "<p><i>Envoi de la demande effectué avec succès, vous allez être redirigé</i></p>";
				

				header( "refresh:5;url=bilan.php" );
				

				// "" correspond au demandeur (qui demande à l'utilisateur de faire la requete)
				
				

				// Insertion de l'Intervention ou du Pret   
				//Si c'est un pret Alors:
			If($_POST['typeDemande'] == '1')
				{
					//header( "refresh:5;url=formPret.php" );         // VOIRE VIA AJAX !!!!
				}
				
				// SI ce n'est pas un pret alors:
				Else
				{
					
				}
	
				
				?>
				
			</section>
			
			<footer>			
				Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>
