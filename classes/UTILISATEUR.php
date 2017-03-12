<?php

/**************************************************************************
* Source File	:  UTILISATEUR.php
* Author                   :  Pateyron
* Project name         :  Non enregistré* Created                 :  15/06/2015
* Modified   	:  15/06/2015
* Description	:  Definition of the class UTILISATEUR
**************************************************************************/




class UTILISATEUR 			
{
	//Attributes
		
	 
	private $_idUtilisateur; // type : int
	private $_grade;
	private $_nom; // type : string
	private $_mdp; // type : string

	//Operations
	 	
	 public function construct($idUtilisateur, $grade, $nom, $mdp)
	{
		$this->_idUtilisateur = $idUtilisateur;		// Initialisation du code de cet objet
		$this->_grade  = $grade;			
		$this->_nom  = $nom;			
		$this->_mdp  = $mdp;			
	}
	
	
	//Déclaration de la méthode publique 'create' qui permet d'ajouter un nouvel utilisateur à la BD
	public function create()
	{
		include "../connexionBD.php";
		$req = "INSERT INTO UTILISATEUR VALUES ('".$this->_idUtilisateur."','".$this->_grade."','".$this->_nom."','".$this->_mdp."');"; 		// req reçoit une chaîne de car donc on met tout ce qui ne varie pas entre " ". On concatène les parties fixes / variables avec un "." 
		
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
	}
	
	public function check() // MEthode pour vérifier si il n'existe pas déjà un utilisateur du même nom
	{
		include "../connexionBD.php";
		$req = "SELECT nom FROM UTILISATEUR WHERE nom = '".$this->_nom."';"; //On envoie une requete à la BD pour sélectionner toutes les données de la table Club
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		$line = $result->fetch();
		$this->_nom = $line['nom'];
		
	}
	
	public function retrieve() // Méthode pour effectuer la requete
	{
		include "../connexionBD.php";
		$req = "SELECT * FROM UTILISATEUR WHERE idUtilisateur = '".$this->_idUtilisateur."';"; //On envoie une requete à la BD pour sélectionner toutes les données de la table Club
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		
		$line = $result->fetch();
		$this->_idUtilisateur = $line['idUtilisateur']; // Il s'agit d'une jointure entre la valeur de l'attribut _ref de la classe Club et l'attribut code de la table Club de la base.
		$this->_grade = $line['grade']; //Fini
		$this->_nom = $line['nom']; //Fini
		$this->_mdp = $line['mdp']; //Fini
		
		
		
	}
	
	public function update()
	{
	
		include "../connexionBD.php";
		$req = "UPDATE UTILISATEUR SET mdp ='". $this->_mdp . "' WHERE nom = '". $this->_nom ."';"; // cet update modifie juste le mdp d'un utilisateur précis
		$result = $bd->exec($req) or die(print_r($bd->errorInfo(), true));
		
	
	}
	
	
	public function get_id()
	{
		return $this->_idUtilisateur;
	}
	
	public function get_grade()
	{
		return $this->_grade;
	}
	
	public function get_nom()
	{
		return $this->_nom;
	}
	
	public function get_mdp()
	{
		return $this->_mdp;
	}
	

} // End Class UTILISATEUR


?>

