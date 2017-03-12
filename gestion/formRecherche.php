<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Rechercher une demande</Title>
		<link rel="stylesheet" type="text/css" href='cssGestion.css'>
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">			
			<header>
				<?php include "logoGestion.php"; ?>
				<h1>Rechercher une demande</h1>		
			</header>
				<?php include "menuGestion.php"; ?>
			<section>
				
				<br/><br/>
				<fieldset>				
					<legend> Saisissez ci-dessous le numéro de la demande à afficher </legend>
					<form method="GET" action="traiter.php">
						
						<p><table class='form'>
							<tr>
							<td>Numéro </td>
							<td><input type='text' name='numDemande' /></td>
							</tr>
						</table> </p>
						
						<p><input type="submit" value="Rechercher" ></p>
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