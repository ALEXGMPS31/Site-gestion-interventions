
			<?php
			$num = $_GET['num'];
			
			include "../connexionBD.php";
			
			$query = $bd->prepare("SELECT numero, libPatrimoine, dateDemande, detail, observation, nom, nbOuvriers  FROM DEMANDE, DEMANDEUR, ETAT, PATRIMOINE, UTILISATEUR WHERE ETAT.refEtat = DEMANDE.refEtat AND refPatrimoine = idPatrimoine AND DEMANDE.IDDEMANDEUR = DEMANDEUR.idDemandeur AND DEMANDE.idUtilisateur = UTILISATEUR.idUtilisateur AND numero =".$num.";"); 
			
			
							
			$query->execute();
			$liste = $query->fetchAll(PDO::FETCH_CLASS, 'stdClass');
			
					
				header("Content-type: application/vnd.ms-excel");
				header("Content-disposition: attachment; filename=demande ".$num.".csv");
				
				// à elle seule, la line suivante suffit à envoyer le résultat du script dans une feuille Excel
				
				
				// la line suivante est facultative, elle sert à donner un nom au fichier Excel
			/*	header("Content-Disposition: attachment; filename=E:\repertoire_destination\nom_fichier.xls");
				require_once("conf_int.php"); */
				
				// La suite est une simple requête php-mysql. On interroge la table utilisée dans l'exemple précédent. 
				
								
				// notez la présence du caractère arobase (@) , en cas d'erreur, 
				// il empêche PHP d'écrire un message d'erreur sur le navigateur
				
				
					 
				
				
			/*	$req="SELECT numero, libPatrimoine, dateDemande, nomDemandeur, dateRealisation, libelle, detail, observation, nom, nbOuvriers, dureeMainOeuvre  FROM DEMANDE, DEMANDEUR, ETAT, PATRIMOINE, UTILISATEUR WHERE ETAT.refEtat = DEMANDE.refEtat AND refPatrimoine = idPatrimoine AND DEMANDE.IDDEMANDEUR = DEMANDEUR.idDemandeur AND DEMANDE.idUtilisateur = UTILISATEUR.idUtilisateur AND numero = 32;"); 

				$result = $bd->query($req) or die(echo_r($bd->errorInfo(), true));
				
				$nb=$result->rowCount();
				
				// on vérifie le contenu de  la requête ;
				if($nb==0)
					{   // si elle est vide, on en informe l'utilisateur à l'aide d'un Javascript 
						echo "<script> alert('La requête n\'a pas abouti !')</script>";
					} 
*/
			   // construction du tableau HTML

				// lecture du contenu de la requête avec 2 boucles imbriquées; par line et par colonne
				// ICI LE NUMERO N'EST PAS UNE VARIABLE, IL FAUDRA LE MODIFIER
					
					foreach($liste as $demande) {
					// DATE /////////////////////////////
						$date_explosee = explode("-", $demande->dateDemande);

							$jour = $date_explosee[2];
							$mois = $date_explosee[1];
							$annee = $date_explosee[0];
						
							$date = $jour."/".$mois."/".$annee;
					/////////////////////////////////////		
						$excel =	'Intervention;'."\r\n"."\r\n".'
									Jour d\'impression ; '.$date. PHP_EOL . ';
									Numero ; '.$demande->numero . PHP_EOL . ';
									Demandeur ;' .$demande->nom . PHP_EOL . ';
									Lieu ;' . $demande->libPatrimoine . PHP_EOL .';
									Detail ;' . $demande->detail . PHP_EOL .';
									Observation ;' . $demande->observation . PHP_EOL .';
									Nombre d\'ouvriers ;' . $demande->nbOuvriers . PHP_EOL ;
									
						
						
						print utf8_decode($excel);
							 
					}
				
				// mysql_close();   !!!!!!!!!!!!!!!!!!!!!!!!!!!!
			/*	$nb=$liste->rowCount();
				// on informe l'utilisateur de la réussite 
				if ($nb>0) 
					{   
						echo "<script> alert('La table est bien mise à jour !')</script>";
					} */
			?>
