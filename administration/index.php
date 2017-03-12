<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Administration</Title>
		<link rel="stylesheet" type="text/css" href='cssGestion.css'>
		<meta charset = "utf-8" />
	</head>
	
	<body>
		<div id="corps">		
			
			<header>
			<?php include "logoGestion.php"; ?>
				<h1>ADMINISTRATION</h1>		
			</header>	
		
			<section>
				<br/>
				<br/><br/>
				<fieldset>
					<legend>Liste des demandes</legend>
									
				
						<table>
							<th>Id</th>
							<th>Demandeur</th>
							<th>Entité</th>
							<th>Lieu</th>
							<th>Date demande</th>
							<th>Etat</th>
							
							<tr>
								<td>1</td>
								<td>Duprilot</td>
								<td>Bâtiment</td>
								<td>Mairie Commentry</td>
								<td>01/06/2015</td>
								<td>Terminé</td>
								<td><a href='consulterClub.php?club=".$line['code']."' title='Traiter'><img src='../img/fleche.png'></a></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Leneuf</td>
								<td>Espaces Verts</td>
								<td>Jardin Publique de Commentry</td>
								<td>03/06/2015</td>
								<td>En Cours</td>
								<td><a href='consulterClub.php?club=".$line['code']."' title='Traiter'><img src='../img/fleche.png'></a></td>
							</tr>
							<tr>
								<td>3</td>
								<td>Bouvier</td>
								<td>Bâtiment</td>
								<td>Salle Polyvalente de Commentry</td>
								<td>03/06/2015</td>
								<td>En Attente</td>
								<td><a href='traiter.php' title='Traiter'><img src='../img/fleche.png'></a></td>
							</tr>
							<br/>
							
							</table>
							
							
				
				</fieldset>
			</section>
			
			<footer>	
			
					
			Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>		
		</div>		
	</body>	
</html>