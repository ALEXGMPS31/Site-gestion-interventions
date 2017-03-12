<?php

/**************************************************************************
* Source File	:  PATRIMOINE.php
* Author                   :  Pateyron
* Project name         :  Non enregistré* Created                 :  15/06/2015
* Modified   	:  15/06/2015
* Description	:  Definition of the class PATRIMOINE
**************************************************************************/




class PATRIMOINE 			
{
	 //Attributes
		
	 
	private $_id; // type : string
	private $_lib; // type : string

	//Operations
	 	
	 //Déclaration du constructeur
	public function construct($idPatrimoine, $libPatrimoine)
	{
		$this->_id = $idPatrimoine;		// Initialisation du code de cet objet
		$this->_lib  = $libPatrimoine;			
	}
	
	
	//Déclaration de la méthode publique 'create' qui permet d'ajouter un nouveau club à la BD
	public function create()
	{
		include "../connexionBD.php";
		$req = "INSERT INTO PATRIMOINE VALUES ('".$this->_id."','".$this->_lib."');"; 		// req reçoit une chaîne de car donc on met tout ce qui ne varie pas entre " ". On concatène les parties fixes / variables avec un "." 
		
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
	}
	
	public function retrieve() // Méthode pour effectuer la requete
	{
		include "../connexionBD.php";
		$req = "SELECT * FROM PATRIMOINE WHERE idPatrimoine = '".$this->_id."';"; //On envoie une requete à la BD pour sélectionner toutes les données de la table Club
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		
		$line = $result->fetch();
		$this->_id = $line['idPatrimoine']; // Il s'agit d'une jointure entre la valeur de l'attribut _id de la classe Club et l'attribut code de la table Club de la base.
		$this->_nom = $line['libPatrimoine']; //Fini
		
		
		
	}
	
	public function update()
	{
	
		include "../connexionBD.php";
		$req = "UPDATE PATRIMOINE SET libPatrimoine ='". $this->_lib . "' WHERE idPatrimoine = ". $this->_id .";";
		$result = $bd->exec($req) or die(print_r($bd->errorInfo(), true));
		
	
	}
	
	
	public function get_id()
	{
		return $this->_id;
	}
	
	public function get_lib()
	{
		return $this->_lib;
	}
	
} // End Class PATRIMOINE


?>

