<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Traitement - Gestionnaire</Title>
		<link rel="stylesheet" type="text/css" href='impression.css'/>
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
			<fieldset>	
						
						
						<?php 
						
						$numero = $_POST['numero'];
											
						$req = "SELECT numero, libPatrimoine, dateDemande, nomDemandeur, dateRealisation, libelle, detail, observation, nom, nbOuvriers, dureeMainOeuvre  FROM DEMANDE, DEMANDEUR, ETAT, PATRIMOINE, UTILISATEUR WHERE ETAT.refEtat = DEMANDE.refEtat AND refPatrimoine = idPatrimoine AND DEMANDE.IDDEMANDEUR = DEMANDEUR.idDemandeur AND DEMANDE.idUtilisateur = UTILISATEUR.idUtilisateur AND numero = ".$numero.";";
								//On envoie une requete à la BD pour sélectionner toutes les données souhaitées
								
								// Ajouter une fonction qui ne sélectionne que l'année en cours  ?? 
								
						include "../connexionBD.php";
						
						
						$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
						
						while ($line = $result->fetch())
						{
							echo "<input type='hidden' id='numDemande' name='numDemande' value=".$line['numero']."/>";
							
						
							echo "<legend> Demande n° ".$line['numero']." </legend>";
							echo "<p><table class='presentation'>
									<th>Id</th>
									<th>Demandeur</th>
									<th>dateDemande</th>
									<th>Patrimoine</th>
									<th>Etat</th>";
								
							echo "<tr><td>".$line['numero']."</td>";
							
							If ($line['nomDemandeur'] == "Vous êtes le demandeur"){
								echo "<td>".$line['nom']."</td>";
							}
							
							Else {
								echo"<td>".$line['nomDemandeur']."</td>";
							}
							
							$date_explosee = explode("-", $line['dateDemande']);

							$jour = $date_explosee[2];
							$mois = $date_explosee[1];
							$annee = $date_explosee[0];
						
							$dateFr = $jour."/".$mois."/".$annee;
							echo"<td>".$dateFr."</td>";
							echo"<td>".$line['libPatrimoine']."</td>";
							echo"<td>".$line['libelle']."</td></table></p>";							
						
			
							echo "<br/><p><fieldset id='objet'><legend>Detail</legend><textarea name='detail' id='detail' rows='5' cols='143'>".$line['detail']."</textarea></fieldset></p>";
							
							echo " - - - " ;
							
							echo "<br/><p><fieldset id='objet'><legend>Observations</legend><textarea name='observation' id='observation' rows='5' cols='143'>".$line['observation']."</textarea></fieldset></p>";

						}
				
					
						echo "	<p> - - - </p>";
				
						echo "	<p><fieldset><legend>Données de l'intervention</legend></p>";
						
						// Nb Ouvriers
						If ($line['nbOuvriers'] != null) {
							echo "		<p>Nombre d'ouvriers <input type='text' id='nbOuvriers' name='nbOuvriers' value=".$line['nbOuvriers']." /></p>";
						}
						
						Else {
							echo "		<p>Nombre d'ouvriers <input type='text' id='nbOuvriers' name='nbOuvriers' /></p>";
						}
						
						// Nb Heures
						If ($line['dureeMainOeuvre'] != null)
							echo "		<p>Nombre d'heures passées  <input type='text' name='nbHeures'  value =".$line['dureeMainOeuvre']." /></p>";
						
						Else {
							echo "		<p>Nombre d'heures passées  <input type='text' name='nbHeures' placeholder=' Saisissez un nombre entier' 	/></p>";
						}
							
						// Date Interv
						If ($line['dateRealisation'] != null){
							echo "<p>Date de l'intervention <input type='date' name='dateInterv'  value = ".$line['dateRealisation']." /></p>";
						}
						
						Else {
							echo "<p>Date de l'intervention <input type='date' name='dateInterv' /></p>";
						}
						echo "<br/>";
						
						?>
			</form>
			</section>
					
		</div>		
	</body>	
</html>