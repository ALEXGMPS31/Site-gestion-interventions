<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Nouvelle DI</Title>
		<link rel="stylesheet" type="text/css" href='cssForm.css'>
		<meta charset = "utf-8" />
		
		<script type ='text/javascript' src='verifNav.js'>
		
		</script>
		
		<script type ='text/javascript'>
			
			// Message de bienvenue
					function ajaxType() {
						var xhr = getXMLHttpRequest();
						xhr.onreadystatechange = function () {
						if (xhr.readyState < 4)                         // while waiting response from server
							document.getElementById('conteneur').innerHTML = "Chargement...";
						else if (xhr.readyState === 4) {                // 4 = Response from server has been completely loaded.
							if (xhr.status == 200 && xhr.status < 300)  // http status between 200 to 299 are all successful
								document.getElementById('conteneur').innerHTML = xhr.responseText;
							}
						};

						xhr.open("GET", "ajaxType.php?choix=truc", true);
						xhr.send(null);
					}
					
					function ajaxCategorie() {
						var entite = document.getElementById("entite").value;
						
						//alert (value1+","+value2);
						
						var xhr = getXMLHttpRequest();
						xhr.onreadystatechange = function () {
						if (xhr.readyState < 4)                         // while waiting response from server
							document.getElementById('conteneur').innerHTML = "Chargement...";
						else if (xhr.readyState === 4) {                // 4 = Response from server has been completely loaded.
							if (xhr.status == 200 && xhr.status < 300)  // http status between 200 to 299 are all successful
								document.getElementById('conteneur').innerHTML = xhr.responseText;
							}
						};
						
						xhr.open("GET", "ajaxCategorie.php?entite="+entite, true);
						xhr.send(null);
					}
					
					function ajaxPatrimoine() {
						var entite = document.getElementById("entite").value;
						var categorie = document.getElementById("categorie").value;
						
						//alert (value1+","+value2);
						
						var xhr = getXMLHttpRequest();
						xhr.onreadystatechange = function () {
						if (xhr.readyState < 4)                         // while waiting response from server
							document.getElementById('conteneur').innerHTML = "Chargement...";
						else if (xhr.readyState === 4) {                // 4 = Response from server has been completely loaded.
							if (xhr.status == 200 && xhr.status < 300)  // http status between 200 to 299 are all successful
								document.getElementById('conteneur').innerHTML = xhr.responseText;
							}
						};
						
						xhr.open("GET", "ajaxPatrimoine.php?entite="+entite+"&categorie="+categorie, true);
						xhr.send(null);
					}
					
					function ajaxPret() {
						var xhr = getXMLHttpRequest();
						
						xhr.onreadystatechange = function () {
						if (xhr.readyState < 4)                         // while waiting response from server
							document.getElementById('conteneur').innerHTML = "Chargement...";
						else if (xhr.readyState === 4) {                // 4 = Response from server has been completely loaded.
							if (xhr.status == 200 && xhr.status < 300)  // http status between 200 to 299 are all successful
								document.getElementById('conteneur').innerHTML = xhr.responseText;
							}
						};
						
						xhr.open("GET", "ajaxPret.php?choix=truc", true);
						xhr.send(null);
						alert("La demande de prêt n'est pas encore opérationnelle.");
					}
					
					
		
		</script>
		
	</head>
	
	<body>
		<div id="corps">			
			<header>
				<?php include "logoUser.php"; ?>
				<h1>Nouvelle demande</h1>		
			</header>
				<?php include "menuPublique.php"; ?>
			<section>
					<?php //include "../scripts.html"; ?> <!--  les sripts sont desactivés !!  -->
				
				<br/><br/>
				<fieldset>				
					<legend> Demande </legend>
					<form method="POST" action="newDemande.php" enctype="multipart/form-data"> <!-- Remplacer par authentification.php, la il s'agit d'une version de démo !!!!! -->
						<table class='form'>
						
							<tr><td>Intervention</td><td>Prêt</td></tr>
							<tr>
								<td><input name='typeDemande' type='radio' value='0' onclick = 'ajaxType()'/></td>
								<td><input name='typeDemande' type='radio' value='1' onclick = 'ajaxPret()'/></td>
							</tr>
						</table>	
						
						<table>
							<p><div id='conteneur'></div></p>
						</table>
							
							<?php
							
					/*		include "../connexionBD.php";
							
							$req = "Select refEntite, libEntite From ENTITE";
							$resultat = $bd->query($req);
								
							echo"<tr><td>Type </td>";	
							echo"<td><select name='entite'/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refEntite'].">".$ligne['libEntite']."</option>";
							}
							echo"</td></tr>";
							
							// Liste Categorie
							$req = "Select refCategorie, libCategorie From CATEGORIE";
							$resultat = $bd->query($req);
							
							echo"<tr><td>Categorie</td>";
							echo"<td><select name='categorie'/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refCategorie'].">".$ligne['libCategorie']."</option>";
							}	
							echo"</td></tr>";
							
							// Liste Entité
							
							
							// Liste Patrimoine
							$req = "Select idPatrimoine, libPatrimoine From PATRIMOINE";
							$resultat = $bd->query($req);
								
							echo"<tr><td>Patrimoine</td>";	
							echo"<td><select name='patrimoine'/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['idPatrimoine'].">".$ligne['libPatrimoine']."</option>";
							}
							echo"</td></tr>";																
							
								 // Ici mettre le nom associé à l'id de la variable de session !!!!!!!
							
						*/	
							?>
							
							
							<br/>
							<fieldset>
							<legend text-align='center'>Details</legend>
							<textarea name="detail" id="detail" rows="5" cols="50" placeholder="Saisissez ici les informations complémentaires"></textarea>  
							</fieldset>
							
							<br/>
							<br/>
							<tr>
						<!--<td>Joindre</td> PIECE JOINTE !!!
							<td><input type="file" name ="pj" title="Compressez dans un fichier .zip ou .rar si vous voulez ajouter plusieurs fichiers" /></td> -->
							</tr>
							<br/>
							<br/>
							
							<p><input type="submit" value="Envoyer" ></p>
					</form>
				</fieldset>
			<br/><br/>
			</section>
		
			<footer>		
			Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>		
		</div>		
	</body>	
</html>