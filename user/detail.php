<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Detail</Title>
		<link rel="stylesheet" type="text/css" href='cssPublique.css'>
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">			
			<header>
				<?php include "logoUser.php"; ?>
				<h1>Suivi de demande</h1>		
			</header>	
				<?php include "menuPublique.php"; ?>
			<section>
				
				<br/><br/>
				
				<form method = 'GET' action = 'modifierDemande.php'>
				<p>
				<?php	
					include "../connexionBD.php";
					
					$Fin = "SELECT MAX(numero) AS numero FROM DEMANDE";
					$valFin = $bd->query($Fin) or die(print_r($bd->errorInfo(), true));
					while ($line = $valFin->fetch()){
						$dernier = $line['numero'];
					}
					
					$flecheGB = 2;
					$flecheG = $_GET['numDemande']-1;
					$flecheD = $_GET['numDemande']+1;
					echo"<tr><td><a href='detail.php?numDemande=".$flecheGB."' title='Debut'><img src='../img/flecheGB.png'></a></td>";	
					echo"<td><a href='detail.php?numDemande=".$flecheG."' title='Précédente'><img src='../img/flecheG.png'></a></td>";	
					echo"<td><a href='detail.php?numDemande=".$flecheD."' title='Suivante'><img src='../img/flecheD.png'></a></td>";	
					echo"<td><a href='detail.php?numDemande=".$dernier."' title='Fin'><img src='../img/flecheDB.png'></a></td></tr>";	
				
				echo "</p> <fieldset> ";
				
		// Affichage de la Demande
		
				// requete pour récup les valeurs
				
				$req = "SELECT numero, libPatrimoine, dateDemande, nomDemandeur, dateRealisation, libelle, detail, observation  FROM DEMANDE, DEMANDEUR, ETAT, PATRIMOINE WHERE ETAT.refEtat = DEMANDE.refEtat AND refPatrimoine = idPatrimoine AND DEMANDE.IDDEMANDEUR = DEMANDEUR.idDemandeur AND idUtilisateur = ".$_SESSION['id']." AND numero = ".$_GET['numDemande'].";";
								//On envoie une requete à la BD pour sélectionner toutes les données souhaitées
								
						include "../connexionBD.php";
						
						
						$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
						
						
						
					while ($line = $result->fetch())
						{
							$date_explosee = explode("-", $line['dateDemande']);

							$jour = $date_explosee[2];
							$mois = $date_explosee[1];
							$annee = $date_explosee[0];
							$dateFr = $jour."/".$mois."/".$annee;
							
							echo "<legend> Demande n° ".$line['numero']." </legend>";
							echo "<p><table class='presentation'>";
							echo "<tr><td>Patrimoine</td><td>".$line['libPatrimoine']."</td></tr>";
							echo "<tr><td>Date Demande</td><td>".$dateFr."</td></tr>";
							// INTEGRER LE CHAMP "DEMANDEUR" QUAND ON AURA IMPLANTé LA GESTION DU PRET !!!!!
							
							
							If($line['nomDemandeur'] != "Vous êtes le demandeur")
							{
								echo "<tr><td>Demandeur</td><td>".$line['nomDemandeur']."</td></tr>";
							}
							
							If($line['dateRealisation'] != Null) {
								$date_IntervUsa = explode("-", $line['dateRealisation']);

								$jour = $date_IntervUsa[2];
								$mois = $date_IntervUsa[1];
								$annee = $date_IntervUsa[0];
								$dateFrInterv = $jour."/".$mois."/".$annee;
								echo "<tr><td>Date de la réalisation</td><td>".$dateFrInterv."</td></tr>"; // A Afficher only if etat = Terminé !! -> AJAX !!!! 
							}
							
							Else {
								echo "<tr><td>Date de la réalisation</td><td>".$line['dateRealisation']."</td></tr>";
							}
							echo "<tr><td>Etat</td><td>".$line['libelle']."</td></tr>";
							echo "</table></p>";
							
							echo " --- ";
							echo "<p><fieldset>
									<legend text-align='center'>Detail</legend>
									<p>".$line['detail']."
								</fieldset></p>";
								
							echo " ---- ";
							echo "<p><fieldset>
									<legend text-align='center'>Observations</legend>
									<p>".$line['observation']."</p>
								</fieldset></p>";
								
						}
				
						
						
					/*	while ($line = $result->fetch())
						{
							
							echo "<table class='presentation'><th>Patrimoine</th><th>Date Demande</th><th>Demandeur</th><th>Date de Réalisation</th><th>Etat</th>";
							echo "<tr><td>".$line['libPatrimoine']."</td>";
							echo "<td>".$line['dateDemande']."</td>";
							echo "<td>".$line['nomDemandeur']."</td>";    // NE PAS PR2SENTER ça SOUS UN TABLEAU MAIS EN COLONNE !!!!! 
							echo "<td>".$line['dateRealisation']."</td>";	
							echo "<td>".$line['libelle']."</td>";		
							echo "<tr></table>";
						}
				
					*/
				
				
				
				
		// Modification de la demande via classe		
		
				//Importation de la classe "DEMANDE.php"
			/*	 
				 $numDemande = $_GET['numDemande'];
				// $nomClub = "";   ??????
				 
				include "../classes/DEMANDE.php";
				// Instanciation du Club
				$demande = New DEMANDE();
				
				
				$demande->construct($codeClub, $nomClub);
				$demande->retrieve();
			*/	
			
				?>
				
	<!--			<p>Nom :</p>
				<input type="text" name="nom" value="<?php // echo $demande -> get_nom(); ?>">
				
				<input type="hidden" name="code" value="<?php // echo $demande -> get_code(); ?>">
				
				<p><input type='submit' value='Modifier'/></p>
				
			</form> 
			
			
	-->		
			
<!--				<fieldset>				
					<legend> Demande n°2543 </legend>
					<form method="POST" action="envoiDemande.php">
						<table class='form'>
							
							<tr>
							<td>Patrimoine</td><td>Jardin publique</td>
							</tr>
							<tr><td>Date de la demande</td>
							<td>
							<?php

						//	echo date("d/m/20y");

							?>
							</td>
							</tr>
							<tr>
							<td>Etat</td><td>Terminé</td>
							</tr>
							
							</table>
							<br/>
							<br/>
							<fieldset>
							<legend text-align='center'>Details</legend>
							<textarea name="detail" id="detail" rows="5" cols="50">L'herbe est trop haute</textarea>  
							</fieldset>
							
							<br/>
							<p> - </p>
							<br/>
							
							<fieldset>
							<legend text-align='center'>Observations</legend>
							<p>L'employé en a également profité pour ramasser les papiers</p>
							</fieldset>
							
							<p><input type='submit' value='Modifier'/></p>
							<p><i>La demande n'est modifiable que si la demande est dans l'état "En Attente"</i></p>

					</form>
				</fieldset>
				</p>
			
			</section> */
-->
			<footer>	
			
					
			Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>		
		</div>		
	</body>	
</html>