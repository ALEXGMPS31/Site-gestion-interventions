<?php

session_start();



$nom = addslashes($_POST['log']);
$mdp = addslashes($_POST['pass']);


include "connexionBD.php";

$requete = "SELECT nom, mdp, idGrade, idUtilisateur FROM UTILISATEUR
WHERE nom='$nom'
AND									 
mdp ='$mdp'";

$resultat = $bd->query($requete) or die(print_r($bd->errorInfo(), true));

$line = $resultat->fetch();

// Variables de Session
$_SESSION['id'] = $line['idUtilisateur'];
$_SESSION['nom'] = $nom;
$_SESSION['demande'];

// Verification du grade
If($line['idGrade']=='1')
{
	header("Location:administration/index.php");
}
	
elseIf($line['idGrade']==2)
{
	header("Location:gestion/index.php");
}

elseIf($line['idGrade']==3)
{
	header("Location:user/index.html");
}
	
else 
{
	header('Location: formEchecAuth.php');
}			
				
		
?>