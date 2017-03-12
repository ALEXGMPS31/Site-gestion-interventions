<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Nouveau mot de passe</Title>
		<link rel="stylesheet" type="text/css" href='cssGestion.css'>
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">			
			<header>
				<?php include "logoGestion.php"; ?>
				<h1>Gestion des Interventions</h1>		
			</header>	
			
		<?php include "menuGestion.php"; ?>
		
			<section>
			<br/>
		



			<form method = 'POST' action = 'ajoutMdp.php'>
				
				<fieldset><legend>Modification du mot de passe d'un utilisateur</legend><br/>	
						
				<table>
				
				<tr>
					<th>Login de l'utilisateur</th>
					<td><input type ='text' name = 'nom' value ='' /></td>
				</tr>
			
				<tr>
					<th>Nouveau Mot de passe</th>
					<td><input type ='password' name = 'mdp' value ='' /></td>
				</tr>
				
				</table><br/>
				</fieldset>
				<br/>
				
				<p><input type='submit' value='Mettre à jour'/></p>
				
			</form>



		
			</section>
			
			<footer>			
				Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>
		</div>
	</body>
</html>