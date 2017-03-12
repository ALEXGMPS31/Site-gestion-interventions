<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Bilans de vos demandes</Title>
		<link rel="stylesheet" type="text/css" href='cssPublique.css'>
		
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">			
			<header>
			<?php include "logoUser.php"; ?>
				<h1>Bilan de vos demandes</h1>		
			</header>	
			
			<?php include "menuPublique.php"; ?>
		
			<section>
				<br/>
				<br/><br/>
				<fieldset>
					<legend>Liste de vos demandes</legend>
						
						
					<table class='presentation'>
						<th>Numero</th>
						<th>Patrimoine</th>
						<th>dateDemande</th>
						<th>Etat</th>
						<th>Detail</th>
						<p>
						<?php 
						
						$req = "SELECT numero, libPatrimoine, dateDemande, libelle FROM DEMANDE, ETAT, PATRIMOINE WHERE ETAT.refEtat = DEMANDE.refEtat AND refPatrimoine = idPatrimoine AND idUtilisateur = ".$_SESSION['id']." ORDER BY ETAT.refEtat, dateDemande DESC, numero DESC;";
								//On envoie une requete à la BD pour sélectionner toutes les données souhaitées
							
						include "../connexionBD.php";
						
						
						$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
						
						while ($line = $result->fetch())
						{
						
						// Explosion de la date
						
							$date_explosee = explode("-", $line['dateDemande']);

							$jour = $date_explosee[2];
							$mois = $date_explosee[1];
							$annee = $date_explosee[0];
						
							$dateFr = $jour."/".$mois."/".$annee;
							echo "<tr><td>".$line['numero']."</td>";
							echo"<td>".$line['libPatrimoine']."</td>";
							echo"<td>".$dateFr."</td>";
							echo"<td>".$line['libelle']."</td>";
							echo"<td><a href='detail.php?numDemande=".$line['numero']."' title='Details'><img src='../img/loupeMini.png'></a></td>";							
						}
						
						?>
					
					</table></p>
				</fieldset>
			</section>
			
			<footer>	
			
					
			Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>		
		</div>		
	</body>	
</html>