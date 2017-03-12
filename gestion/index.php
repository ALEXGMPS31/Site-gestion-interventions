<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Accueil - Gestionnaire</Title>
		<link rel="stylesheet" type="text/css" href='cssGestion.css'>
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">		
			
			<header>
			<?php include "logoGestion.php"; ?>
				<h1>Demandes d'intervention</h1>		
			</header>	
			
		<?php include "menuGestion.php"; ?>
		
			<section>
				<br/>
				<br/><br/>
				<fieldset>
				<legend>Liste des demandes</legend>		
						
						
					<table class='presentation'>
						<th>Id</th>
						<th>Demandeur</th>
						<th>dateDemande</th>
						<th>Patrimoine</th>
						<th>Etat</th>
						
						<?php 
						
						$req = "SELECT numero, libPatrimoine, dateDemande, libelle, nomDemandeur, nom, DEMANDE.idUtilisateur FROM DEMANDE, DEMANDEUR, UTILISATEUR, ETAT, PATRIMOINE WHERE ETAT.refEtat = DEMANDE.refEtat AND refPatrimoine = idPatrimoine AND DEMANDEUR.idDemandeur = DEMANDE.IDDEMANDEUR AND UTILISATEUR.idUtilisateur = DEMANDE.idUtilisateur ORDER BY ETAT.refEtat, dateDemande DESC;;";
								//On envoie une requete à la BD pour sélectionner toutes les données souhaitées
								
								// Ajouter une fonction qui ne sélectionne que l'année en cours  ?? 
								
						include "../connexionBD.php";
						
						
						$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
						
						while ($line = $result->fetch())
						{
							echo "<tr><td>".$line['numero']."</td>";
							
							If ($line['nomDemandeur'] == "Vous êtes le demandeur"){
								echo "<td>".$line['nom']."</td>";
							}
							
							Else {
								echo"<td>".$line['nomDemandeur']."</td>";
							}
							
							$date_demande = explode("-", $line['dateDemande']);

								$jour = $date_demande[2];
								$mois = $date_demande[1];
								$annee = $date_demande[0];
								$dateDemande = $jour."/".$mois."/".$annee;
							
							echo "<td>".$dateDemande."</td>";
							echo "<td>".$line['libPatrimoine']."</td>";
							echo "<td>".$line['libelle']."</td>";
							echo "<td><a href='traiter.php?numDemande=".$line['numero']."' title='Details'><img src='../img/fleche.png'></a></td>";							
						}
						
						?>
					
					</table>
				</fieldset>
			</section>
			
			<footer>	
			
					
			Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>		
		</div>		
	</body>	
</html>