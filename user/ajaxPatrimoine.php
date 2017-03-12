<?php


// echo "<br/>Salut, j'espère vraiment que ça marche cette fois !! ".$_GET['choix'];
							
							include "../connexionBD.php";
							
							$entite = $_GET["entite"];
							$categorie= $_GET["categorie"];
							
							$req = "Select refEntite, libEntite From ENTITE";
							$resultat = $bd->query($req);

							// Liste Type
							echo"<p><tr><td>Type   </td>";	
							echo"<td><select id='entite' name='entite'  onChange= ".chr(34)."ajaxPatrimoine()".chr(34)."/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							
							////////////////////////////////////////////////////
							While ($ligne = $resultat->fetch())
							{
								
								If ($ligne['refEntite'] == $entite) { // Ta comparaison à toi de la choisir
         							echo ' <option value="'.$ligne['refEntite'].'" selected="selected">'.$ligne['libEntite'].'</option>  ';  // Tu ajoute donc selected="selected" si ta comparaison est vrai (ou fausse)
								}
								else {
									echo "<option value=".$ligne['refEntite'].">".$ligne['libEntite']."</option>";
								}
							}
							
							/*
							While ($ligneS1 = $resultatS1->fetch())
							{
								echo "<option value=".$ligneS1['refEntite']." selected=\"selected\">".$ligneS1['libEntite']."</option>";
							}
							
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refEntite'].">".$ligne['libEntite']."</option>";
							}
							*/
							echo "</select>";
							echo"</td></tr></p>";
							
							
							// Liste Categorie
							$req = "Select DISTINCT CATEGORIE.refCategorie, CATEGORIE.libCategorie From IMMOBILIER, ENTITE, CATEGORIE WHERE CATEGORIE.refCategorie = IMMOBILIER.refCategorie  AND IMMOBILIER.refEntite = ENTITE.refEntite AND ENTITE.refEntite ='".$entite."' OR  CATEGORIE.refCategorie = 'autre'";
							$resultat = $bd->query($req);
							
							//$reqS2 = "SELECT refCategorie, libCategorie FROM CATEGORIE WHERE refCategorie ='".$categorie."'";
							//$resultatS2 = $bd->query($reqS2);
							
							echo"<p><tr><td>Categorie   </td>";
							echo"<td><select id='categorie' name='categorie' onChange=".chr(34)."ajaxPatrimoine()".chr(34)."/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							
							While ($ligne = $resultat->fetch())
							{
								
								If ($ligne['refCategorie'] == $categorie) { // Ta comparaison à toi de la choisir
         							echo ' <option value="'.$ligne['refCategorie'].'" selected="selected">'.$ligne['libCategorie'].'</option>  ';  // Tu ajoutes donc selected="selected" si ta comparaison est vrai (ou fausse)
								}
								else {
									echo "<option value=".$ligne['refCategorie'].">".$ligne['libCategorie']."</option>";
								}
							}
							
							/*
							While ($ligneS2 = $resultatS2->fetch())
							{
								echo "<option value=".$ligneS2['refCategorie']." selected=\"selected\">".$ligneS2['libCategorie']."</option>";
							}
							
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refCategorie'].">".$ligne['libCategorie']."</option>";
							}
							*/
							echo "</select>";					
							echo"</td></tr></p>";

							
							
							
							$req = "Select DISTINCT idPatrimoine ,libPatrimoine From PATRIMOINE,IMMOBILIER WHERE refEntite ='".$entite."' AND refCategorie = '".$categorie."' AND PATRIMOINE.idPatrimoine = IMMOBILIER.refPatrimoine OR libPatrimoine = ' Autre';"; // ICI VA FALLOIR BIDOUILLER -> it works
							$resultat = $bd->query($req);
							
							
							// Liste Patrimoine
															
							echo"<p><tr><td>Patrimoine   </td>";	
							echo"<td><select name='patrimoine'/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							echo "<option value='' selected='selected'></option>";
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['idPatrimoine'].">".$ligne['libPatrimoine']."</option>";
							}
							echo "</select>";
							echo"</td></tr></p>";
						
							echo "<font size='2pt'><i> Si le Type ou la catégorie sont de type \"Autre\", veuillez spécifier précisément dans le détail l'objet de votre requête</font>";
?>