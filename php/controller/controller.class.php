<?php
	require_once ("model/modele.class.php");
	class Controleur {
		private $unModele ; 
		//instance de la classe Modele

		public function __construct ($serveur, $bdd, $user, $mdp){
			//instanciation de la classe Modele 
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
		} 
		public function setTable ($uneTable){
			$this->unModele->setTable($uneTable);
		}
		public function selectAll (){
			$lesResultats = $this->unModele->selectAll (); 
			//on fait traiter les données 
			return $lesResultats; 
		}
		public function selectSearch  ($mot, $tab){
			$lesResultats = $this->unModele->selectSearch ($mot, $tab); 
			return $lesResultats;
		}
		public function insert ($tab)
		{
			//appliquer des controles sur les données 
			$this->unModele->insert($tab);
		}
		public function delete  ($cle, $valeur)
		{
			//on controle la presence de l'id 
			$this->unModele->delete ($cle, $valeur); 
		}
		public function update  ($tab, $cleId, $valeurId)
		{
			$this->unModele->update($tab, $cleId, $valeurId); 
		}
		public function selectWhere  ($cle, $valeur)
		{
			//on controle la presence de l'id 
			return $this->unModele->selectWhere($cle, $valeur); 
		}
		public function verifConnexion ($email,$mdp)
		{
			$user = $this->unModele->verifConnexion ($email,$mdp); 
			return $user;
		}
	}
?>
