
			<?php
			$bilan = $_GET['bilan'];
			$dateExport = date("20y-m-d");
			
			include "../connexionBD.php";
			
			header("Content-type: application/vnd.ms-excel");
			header("Content-disposition: attachment; filename=Bilan_".$bilan."_".$dateExport.".csv");	
						
			$query = $bd->prepare("SELECT numero, libelle, libPatrimoine, detail, dateDemande,  nom, nbOuvriers, dureeMainOeuvre as Heures, dateRealisation  FROM DEMANDE, DEMANDEUR, ETAT, PATRIMOINE, UTILISATEUR WHERE ETAT.refEtat = DEMANDE.refEtat AND refPatrimoine = idPatrimoine AND DEMANDE.IDDEMANDEUR = DEMANDEUR.idDemandeur AND DEMANDE.idUtilisateur = UTILISATEUR.idUtilisateur ORDER BY ".$bilan." DESC;"); 
			
			
							
			$query->execute();
			$colones = 'Bilan trié par '.$bilan.';'."\r\n"."\r\n". PHP_EOL .'Numero ;Demandeur ;Lieu ;Date de la demande;Detail ;Nombre d\'ouvirers ;Nombre d\'heures passées ;Date de fin ;Etat d\'avancement ; d\'intervention ;' . PHP_EOL ;
			print utf8_decode($colones);
			
			$liste = $query->fetchAll(PDO::FETCH_CLASS, 'stdClass');
			
					
				
				

					
					
					foreach($liste as $demande) {
					// DATE /////////////////////////////
						$date_explosee = explode("-", $demande->dateDemande);

							$jour = $date_explosee[2];
							$mois = $date_explosee[1];
							$annee = $date_explosee[0];
						
							$date = $jour."/".$mois."/".$annee;
					/////////////////////////////////////	  

						
						
						$excel =	 $demande->numero . ';'
									.$demande->nom . ';'
									. $demande->libPatrimoine .';'
									. $date .';'
									. $demande->detail .';'
									. $demande->nbOuvriers .';'
									. $demande->Heures . ';'
									. $demande->dateRealisation . ';'
									. $demande->libelle . PHP_EOL ;
									
									
						
						
						
						print utf8_decode($excel);
							 
					}
				

			?>
