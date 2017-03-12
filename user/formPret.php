<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Pret</Title>
		<link rel="stylesheet" type="text/css" href='cssForm.css'>
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">			
			<header>
				<?php include "logoUser.php"; ?>
				<h1>Formulaire de Pret</h1>		
			</header>
				<?php include "menuPublique.php"; ?>
			<section>
				
				<br/><br/>
				<fieldset>				
					<legend> Informations </legend>
					<form method="POST" action="newDemande.php"> <!-- Remplacer par authentification.php, la il s'agit d'une version de démo !!!!! -->
						<table class='form'>
						
						<i>Salut à toi <?php echo $_SESSION['nom']." d'identifiant ".$_SESSION['id']; ?></i>
						
							
							
							<?php
							include "../connexionBD.php";
							
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
							$req = "Select refEntite, libEntite From ENTITE";
							$resultat = $bd->query($req);
								
							echo"<tr><td>Entité</td>";	
							echo"<td><select name='entite'/>"; //Le nom de l'objet selectionné dans la liste est: "patrimoine"
							While ($ligne = $resultat->fetch())
							{
								echo "<option value=".$ligne['refEntite'].">".$ligne['libEntite']."</option>";
							}
							echo"</td></tr>";
							
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
							
							
							?>
							
							</table>
							<br/>
							<fieldset>
							<legend text-align='center'>Details</legend>
							<textarea name="detail" id="detail" rows="5" cols="50" placeholder="Saisissez ici les informations compélmentaires"></textarea>  
							</fieldset>
							
							<br/>
							<br/>
							<tr>
							<td>Joindre</td>
							<td><input type="file" value="Joindre un document" name ="pj" title="Compresser dans un fichier .zip ou .rar si vous voulez ajouter plusieurs fichiers" /></td>
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