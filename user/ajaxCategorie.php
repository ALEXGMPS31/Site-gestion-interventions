<?php


// echo "<br/>Salut, j'espère vraiment que ça marche cette fois !! ".$_GET['choix'];
							
													include "../connexionBD.php";
							
							$entite = $_GET["entite"];
							
							//$reqS1 = "SELECT refEntite, libEntite FROM ENTITE WHERE refEntite ='".$entite."'";
							// $resultatS1 = $bd->query($reqS1);
							
							$req = "Select refEntite, libEntite From ENTITE";
							$resultat = $bd->query($req);

							// Liste Type
							echo"<p><tr><td>Type   </td>";	
							echo"<td><select id='entite' name='entite'  onChange= ".chr(34)."ajaxCategorie()".chr(34)."/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							//echo "<option value='' selected='selected'></option>";
						/*	While ($ligneS1 = $resultatS1->fetch())
							{
								echo "<option value=".$ligneS1['refEntite']." selected=\"selected\">".$ligneS1['libEntite']."</option>";
							}*/
						
							While ($ligne = $resultat->fetch())
							{
								
								If ($ligne['refEntite'] == $entite) { // Ta comparaison à toi de la choisir
         							echo ' <option value="'.$ligne['refEntite'].'" selected=\"selected\">'.$ligne['libEntite'].'</option>  ';  // Tu ajoute donc selected="selected" si ta comparaison est vrai (ou fausse)
								}
								else {
									echo "<option value=".$ligne['refEntite'].">".$ligne['libEntite']."</option>";
								}
							}
						
							echo "</select>";
							echo"</td></tr></p>";
							
							
							
							
							// Liste Categorie
							$req = "Select DISTINCT CATEGORIE.refCategorie, CATEGORIE.libCategorie From IMMOBILIER, ENTITE, CATEGORIE WHERE CATEGORIE.refCategorie = IMMOBILIER.refCategorie  AND IMMOBILIER.refEntite = ENTITE.refEntite AND ENTITE.refEntite ='".$entite."' OR  CATEGORIE.refCategorie = 'autre'";
							$resultat = $bd->query($req);
							
							echo"<p><tr><td>Categorie   </td>";
							echo"<td><select id='categorie' name='categorie' onChange=".chr(34)."ajaxPatrimoine()".chr(34)."/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							echo "<option value='' selected='selected'></option>";
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refCategorie'].">".$ligne['libCategorie']."</option>";
							}
							echo "</select>";					
							echo"</td></tr></p><p><font size='2pt'><i>Si votre sélection n'est pas dans la liste, veuillez la nommer dans le détail.</i></font>";
							
							
							
														
							
								 // Ici mettre le nom associé à l'id de la variable de session !!!!!!!
							
							
?>			
