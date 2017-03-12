<?php


// echo "<br/>Salut, j'espère vraiment que ça marche cette fois !! ".$_GET['choix'];
							
							include "../connexionBD.php";
							
							
								//Obejt
							
							$req = "Select idPatrimoine, libPatrimoine From PATRIMOINE";
							$resultat = $bd->query($req);
								
							echo"<p><tr><td>Objet du pret   </td>";	
							echo"<td><select name='patrimoine'/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['idPatrimoine'].">".$ligne['libPatrimoine']."</option>";
							}
							echo "</select>";
							echo"</td></tr></p>";
							
								// Date Debut
							$req = "Select refEntite, libEntite From ENTITE";
							$resultat = $bd->query($req);
								
							echo"<p><tr><td>Date Debut   </td>";	
							echo "<input type='date' name='debut'>";
							
							echo "</select>";
							echo"</td></tr></p>";
							
							
								// Date Fin
							$req = "Select refCategorie, libCategorie From CATEGORIE";
							$resultat = $bd->query($req);
							
							echo"<p><tr><td>Date Fin   </td>";
							echo "<input type='date' name='fin'>";			
							echo"</td></tr></p>";
							
							
								// Demandeur
							$req = "Select * From DEMANDEUR";
							$resultat = $bd->query($req);
								
							echo"<p><tr><td>Demandeur  </td>";	
							echo"<td><select name='demandeur'/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['idDemandeur'].">".$ligne['nomDemandeur']."</option>";
							}
							echo "</select>";
							echo"</td><br/><td><i> * Si le demandeur n'est pas dans la liste, précisez son nom dans le détail</i></td></tr></p>";
							
							
							// Ne pas oublier de prendre en compte l'id session ou le demandeur
							
							
?>			
