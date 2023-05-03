<?php
	class Modele 
	{
		private $unPDO, $table ; 

		public function __construct ($serveur, $bdd, $user, $mdp){
		$this->unPDO = null;
		try{
		$this->unPDO = new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
		}
		catch (PDOException $exp){
			echo "Impossible de se connecter au serveur<br/>"; 
			echo $exp->getMessage (); 
		}
		}
		//getter et setter sur l'attribut table 
		public function getTable(){
			return $this->table;
		}
		public function setTable($uneTable)
		{
			$this->table = $uneTable;
		}

		public function selectAll (){
			if ($this->unPDO != null){
			// Exécution de la requête 
			$requete = "select * from  ".$this->table.";";
			//preparation de la requete avant execution 
			$select = $this->unPDO->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesResultats = $select->fetchAll(); 
			//retourner les résultats 
			return $lesResultats;
		}else {
			return null; 
		}
		}

		public function selectSearch  ($mot, $tab){
			if ($this->unPDO != null){
			$tabLike= array();
			foreach ($tab as $element) {
				$tabLike[] = $element."  like  :mot ";
			}
			$chaineLike = implode(" or ", $tabLike);
			// Exécution de la requête 
			$requete = "select * from ".$this->table." where ".$chaineLike;
			$donnees=array(":mot"=>'%'.$mot.'%');
			//preparation de la requete avant execution 
			$select = $this->unPDO->prepare ($requete); 
			//execution de la requete 
			$select->execute ($donnees); 
			//extraction des données 
			$lesResultats = $select->fetchAll(); 
			//retourner les résultats 
			return $lesResultats;
		}else {
			return null; 
		}
		}

		public function insert ($tab)
		{
			$donnees = array(); 
			$tabNoms = array();
			foreach ($tab as $cle => $valeur) {
				$tabNoms[] = ":".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaineNoms = implode(",", $tabNoms); 

			if ($this->unPDO != null){
			$requete ="insert into ".$this->table." values (null,".$chaineNoms."); ";
			$insert = $this->unPDO->prepare($requete); 
			$insert->execute ($donnees); 
			}
		}

		public function delete  ($cle, $valeur)
		{
			if ($this->unPDO != null){
				$requete ="delete from ".$this->table." where ".$cle." = :".$cle." ; "; 
				$donnees =array(":".$cle=>$valeur);
				$delete = $this->unPDO->prepare($requete); 
				$delete->execute ($donnees); 
			}
		}

		public function update ($tab, $cleId, $valeurId)
		{
			if ($this->unPDO != null){
				$donnees = array(); 
				$tabNoms = array();
				foreach ($tab as $cle => $valeur) {
					$tabNoms[] = $cle."=:".$cle;
					$donnees[":".$cle] = $valeur;
				}
				$chaineNoms = implode(",", $tabNoms); 
				$requete ="update ".$this->table." set ".$chaineNoms." where ".$cleId." = :".$cleId." ; "; 

				$donnees[":".$cleId]=$valeurId;

				$update = $this->unPDO->prepare($requete); 
				$update->execute ($donnees); 
			}
		}

		public function selectWhere ($cle, $valeur)
		{
			if ($this->unPDO != null){
				$requete ="select * from ".$this->table." where ".$cle." = :".$cle." ; "; 
				$donnees =array(":".$cle=>$valeur);
				$select = $this->unPDO->prepare($requete); 
				$select->execute ($donnees); 
				$unResultat = $select->fetch();  
				return $unResultat;
			}
		}
	
	public function verifConnexion ($email,$mdp)
	{
		if ($this->unPDO != null){
			$requete ="select * from user where email=:email and mdp = :mdp; "; 
			$donnees=array(":email"=>$email, ":mdp"=>$mdp); 
			$select = $this->unPDO->prepare($requete);
			$select->execute ($donnees); 
			$user = $select->fetch(); 
			return $user;
		}
		else{
			return null;
			} 
	}
	}
?>

