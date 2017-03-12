<!DOCTYPE html>
<html>
	<head>
		<Title>Accueil - Demandes d'intervention</Title>
		<link rel="stylesheet" type="text/css" href='cssPublique.css'>
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">			
			<header>
				<?php include "logo.php"; ?>
				<h1>Demande d'interventions</h1>		
			</header>	
		
			
			<section>
				<br/>
				<br/><br/>
				Veuillez saisir vos identifiants ci-dessous pour vous authentifier
				<br/>
				<br/>
				
				<fieldset>				
					<legend> Authentification </legend>
					<form method="POST" action="authentification.php"> <!-- Remplacer par authentification.php, la il s'agit d'une version de démo !!!!! -->
						<table>
							<tr>
								<td>Login</td>
								<td><input type="text" name="log" ></td>
							</tr>
							<tr>
								<td>Mot de passe</td>
								<td><input type="password" name="pass" ></td>
							</tr>
							
							<br/>
							
							</table>
							
							<p><input type="submit" value="Connexion" ></p>
					</form>
				
			
			</section>
			
			<footer>	
			
					
			Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>		
		</div>		
	</body>	
</html>