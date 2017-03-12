<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<Title>Traitement - Gestionnaire</Title>
		<link rel="stylesheet" type="text/css" href='cssGestion.css'/>
		<meta charset = "utf-8" />
		<script type ='text/javascript'>
			
			// Message de bienvenue
					function bilanExcel() {
					var valeurBilan = document.getElementById("bilan");
	
				}

		
		
		</script>
					
	</head>
	
	<body>
		<div id="corps">			
			<header>
				<?php include "logoGestion.php"; ?>
				<h1>Demandes d'intervention</h1>		
			</header>	
			
		<?php include "menuGestion.php"; ?>
		
			<section><br/>
		
			<form method = 'GET' action = 'bilanExcel.php' enctype="multipart/form-data">
			
			<fieldset>	
			<legend>Choisissez un mode de tri pour l'affichage</legend>
			
			<p>
			<ul>
				<li><a href='bilanExcel.php?bilan=libPatrimoine' title='Exporter'>Par Patrimoine</a></li><br/>
				<li><a href='bilanExcel.php?bilan=libelle' title='Exporter'>Par état d'avancement</a></li><br/>
				<li><a href='bilanExcel.php?bilan=dateDemande' title='Exporter'>Par date de demande</a></li><br/>
				<li><a href='bilanExcel.php?bilan=dureeMainOeuvre' title='Exporter'>Par nombre d'heures d'intervention sur chaque patrimoine</a></li><br/>
			</ul>
			</p>	
							
			
			</fieldset>
			</form>

			<br/></section>
			
			<footer>	
			Le site ayant été réalisé dans le cadre d'un stage, des erreurs peuvent subsister.
			</footer>		
		</div>		
	</body>	
</html>