<?php

/**************************************************************************
* Source File	:  CATEGORIE.php
* Author                   :  Pateyron
* Project name         :  Non enregistré* Created                 :  15/06/2015
* Modified   	:  15/06/2015
* Description	:  Definition of the class CATEGORIE
**************************************************************************/




class CATEGORIE 			
{
	//Attributes
		
	 
	var $refCategorie; // type : string
	var $libCategorie; // type : string

	//Operations
	 	
	//Déclaration du constructeur
	public function construct($refCategorie, $libCategorie)
	{
		$this-> _refCategorie = $refCategorie;		// Initialisation du code de cet objet
		$this-> _libCategorie  = $libCategorie;	
	
	}

	

	//Déclaration de la méthode publique 'create' qui permet d'ajouter une nouvelle demande à la BD
	public function create() // FAIT !
	{
		include "../connexionBD.php"; // On n'insère pas numéro car il est auto incrémenté
		$req = "INSERT INTO CATEGORIE VALUES ('".$this->_refCategorie."','".$this->_libCategorie."');"; 		// req reçoit une chaîne de car donc on met tout ce qui ne varie pas entre " ". On concatène les parties fixes / variables avec un "." 
		
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
	}
	
	public function retrieve() // Récupérer les valeurs de la BD pour les afficher sur le site -> FINI !!
	{
		include "../connexionBD.php";
		$req = "SELECT * FROM CATEGORIE WHERE refCategorie = '".$this->_refCategorie."';"; //On envoie une requete à la BD pour sélectionner toutes les données de la table Demande
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		
		$line = $result->fetch();
		$this->_refCategorie = $line['refCategorie']; // Ici on stock les valeurs de la bd dans nos variables de classe !!
		$this->_libCategorie = $line['libCategorie'];
		
	}
	
	public function update() // Fini -> Permet de modifier observation et etat par le gestionnaire mais pas de rectifier une demande incorrecte par l'utilisateur -> Pas vraiment utile.
	{
	
		include "../connexionBD.php";
		$req = "UPDATE CATEGORIE SET refCategorie ='". $this->_refCategorie . "', libCategorie='".$this->_libCategorie."';";
		$result = $bd->exec($req) or die(print_r($bd->errorInfo(), true));
	
	}
	
	public function get_refCategorie()
	{
		return $this->_refCategorie;
	}
	
	public function get_libCategorie()
	{
		return $this->_libCategorie;
	}
	
} // FINI !! 
?>
