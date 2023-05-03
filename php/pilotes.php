<h2> Gestion des pilotes</h2>
<?php
	$unControleur->setTable("pilotes");

	if(isset($_POST['Valider'])){
		$tab=array("nom"=>$_POST['nom'], 
                    "prenom"=>$_POST['prenom'], 
                    "age"=>$_POST['age'],);
		$unControleur->insert($tab); 
	}

	$lePilote = null; 
	if(isset($_GET['action']) && isset($_GET['idpilote']))
	{
		$action = $_GET['action'];
		$idpilote = $_GET['idpilote']; 
		switch ($action) {
			case 'supp': $unControleur->delete("idpilote", $idpilote); break;
			case 'edit': 
			$lePilote = $unControleur->selectWhere ("idpilote", $idpilote); 
				break;
		}
	};
		require_once("vue/vue_insert_pilotes.php");
	
		if(isset($_POST['Modifier'])){
		$tab=array("nom"=>$_POST['nom'], 
                    "prenom"=>$_POST['prenom'], 
                    "age"=>$_POST['age'],);
		$unControleur->update ($tab,"idpilote", $_POST['idpilote'] ); 
		header("Location: index.php?page=1");
	}

	if (isset($_POST['Filtrer'])){
		$tab = array($_POST['Filtrer_Select']); 
		$lesPilotes = $unControleur->selectSearch($_POST['mot'], $tab);
	}else{ 

		$lesPilotes = $unControleur->selectAll (); 
	}
	require_once ("vue/vue_les_pilotes.php"); 
?>