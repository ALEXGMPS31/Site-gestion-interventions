<?php

/**************************************************************************
* Source File	:  DEMANDE.php
* Author                   :  Pateyron
* Project name         :  Non enregistré* Created                 :  15/06/2015
* Modified   	:  15/06/2015
* Description	:  Definition of the class DEMANDE
**************************************************************************/






class DEMANDE
{
	//Déclaration des attributs de la classe
	private $_numero;		
	private $_refEtat;		
	private $_idUtilisateur;
	private $_idDemandeur;
	private $_refPatrimoine;
	private $_dateDemande;
	private $_detail;
	private $_observation;
	private $_nbOuvriers;
	private $_nbHeures;
	private $_dateRealisation;




	//Déclaration du constructeur
	public function construct($numero, $etat, $user, $demandeur, $patrimoine, $date, $detail, $observation, $nbOuvriers, $duree, $dateRealisation)
	{
		$this-> _numero = $numero;		// Initialisation du code de cet objet
		$this-> _refEtat  = $etat;	
		$this-> _idUtilisateur  = $user;
		$this-> _idDemandeur = $demandeur;
		$this-> _refPatrimoine  = $patrimoine;
		$this-> _dateDemande  = $date;
		$this-> _detail  = addslashes($detail);
		$this-> _observation  = addslashes($observation);
		$this-> _nbOuvriers  = $nbOuvriers;
		$this-> _nbHeures  = $duree;
		$this-> _dateRealisation  = $dateRealisation;
		
		
	}

	

	//Déclaration de la méthode publique 'create' qui permet d'ajouter une nouvelle demande à la BD
	public function create() // FAIT !
	{
		include "../connexionBD.php"; // On n'insère pas numéro car il est auto incrémenté
		$req = "INSERT INTO DEMANDE VALUES ('".$this->_numero."','".$this->_refEtat."','".$this->_idUtilisateur."','".$this->_idDemandeur."','".$this->_refPatrimoine."','" .$this->_dateDemande."','".$this->_detail."','".$this->_observation."','".$this->_nbOuvriers."','".$this->_nbHeures."','".$this->_dateRealisation."');"; 		// req reçoit une chaîne de car donc on met tout ce qui ne varie pas entre " ". On concatène les parties fixes / variables avec un "." 
		
		$bd->exec($req) or die(print_r($bd->errorInfo(), true));
		
		
	}
	
	public function retrieve() // Récupérer les valeurs de la BD pour les afficher sur le site -> FINI !!
	{
		include "../connexionBD.php";
		$req = "SELECT * FROM DEMANDE WHERE numero = '".$this->_numero."';"; //On envoie une requete à la BD pour sélectionner toutes les données de la table Demande
		
		$result = $bd->query($req) or die(print_r($bd->errorInfo(), true));
		
		$line = $result->fetch();
		$this->_numero = $line['numero']; // Ici on stock les valeurs de la bd dans nos variables de classe !!
		$this->_refEtat = $line['refEtat'];
		$this->_idUtilisateur = $line['idUtilisateur'];
		$this->_idDemandeur = $line['idDemandeur'];
		$this->_refPatrimoine = $line['refPatrimoine'];
		$this->_dateDemande = $line['dateDemande'];
		$this->_detail = $line['detail'];
		$this->_observation = $line['observation'];
		$this->_nbOuvriers = $line['nbOuvriers'];
		$this->_nbHeures = $line['dureeMainOeuvre'];
		$this->_dateRealisation = $line['dateRealisation'];
		
	}
	
	public function update() // Fini -> Permet de modifier observation et etat par le gestionnaire mais pas de rectifier une demande incorrecte par l'utilisateur -> Pas vraiment utile. -- UPDATE FOIREUX, ON OUBLIE
	{
	
		include "../connexionBD.php";
		$req = "UPDATE DEMANDE SET refEtat ='". $this->_refEtat . "', detail='".$this->_detail ."', observation='".$this->_observation ."', nbOuvriers='".$this->_nbOuvriers ."', dureeMainOeuvre='".$this->_nbHeures ."', dateRealisation='".$this->_dateRealisation ."' WHERE numero = '". $this->_numero ."';";
		$result = $bd->exec($req) or die(print_r($bd->errorInfo(), true));
		
	
	}
	
	
	public function get_numero()
	{
		return $this->_numero;
	}
	
	public function get_refEtat()
	{
		return $this->_refEtat;
	}
	
	public function get_idUtilisateur()
	{
		return $this->_idUtilisateur;
	}
	
	public function get_refPatrimoine()
	{
		return $this->_refPatrimoine;
	}
	
	public function get_dateDemande()
	{
		return $this->_dateDemande;
	}
	
	public function get_detail()
	{
		return $this->_detail;
	}
	
	public function get_observation()
	{
		return $this->_observation;
	}
	
	public function get_idDemandeur()
	{
		return $this->_idDemandeur;
	}
	
	public function get_nbOuvriers()
	{
		return $this->_nbOuvriers;
	}
	
	public function get_nbHeures()
	{
		return $this->_observation;
	}
	
	public function get_dateRealisation()
	{
		return $this->_dateRealisation;
	}

	
} // FINI !! 
?>