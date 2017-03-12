<?php


// echo "<br/>Salut, j'espère vraiment que ça marche cette fois !! ".$_GET['choix'];
							
							include "../connexionBD.php";
							
							$req = "Select refEntite, libEntite From ENTITE";
							$resultat = $bd->query($req);
							
							// Liste Type
							echo"<p><tr><td>Type   </td>";	
							echo"<td><select id='entite' name='entite' onChange= ".chr(34)."ajaxCategorie()".chr(34)."/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							echo "<option value='' selected='selected'></option>";
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refEntite'].">".$ligne['libEntite']."</option>";
							}
							
							echo "</select>";
							echo"</td></tr></p>";
							
							
							
							
						/*
							// Liste Categorie
							$req = "Select refCategorie, libCategorie From IMMOBILIER, ENTITE, CATEGORIE WHERE refCategorie = REFENSEMBLE  AND IMMOBILIER.refEntite = ENTITE.refEntite";
							$resultat = $bd->query($req);
							
							echo"<p><tr><td>Categorie   </td>";
							echo"<td><select id='categorie' name='categorie' onChange=".chr(34)."ajaxPatrimoine()".chr(34)."/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refCategorie'].">".$ligne['libCategorie']."</option>";
							}
							echo "</select>";					
							echo"</td></tr></p><p><font size='2pt'><i>Si vous choisissez un Type ou une Catégorie \"Autre\" veuillez spécifier son nom dans le détail</i></font>";
							
							
							
														
							
								 // Ici mettre le nom associé à l'id de la variable de session !!!!!!!
						*/
							
?>			
