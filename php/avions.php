<h2> Gestion des avions</h2>
<?php
	$unControleur->setTable("avions");

	if(isset($_POST['Valider'])){
		$tab=array("immatriculation"=>$_POST['immatriculation'], 
                    "marque"=>$_POST['marque'], 
                    "modele"=>$_POST['modele'],
                    "nb_places"=>$_POST['nb_places'],);
		$unControleur->insert($tab); 
	}

	$lAvion = null; 
	if(isset($_GET['action']) && isset($_GET['idavion']))
	{
		$action = $_GET['action'];
		$idavion = $_GET['idavion']; 
		switch ($action) {
			case 'supp': $unControleur->delete("idavion", $idavion); break;
			case 'edit': 
			$lAvion = $unControleur->selectWhere ("idavion", $idavion); 
				break;
		}
	}

	require_once ("vue/vue_insert_avions.php");

	if(isset($_POST['Modifier'])){
		$tab=array("immatriculation"=>$_POST['immatriculation'], 
                    "marque"=>$_POST['marque'], 
                    "modele"=>$_POST['modele'],
                    "nb_places"=>$_POST['nb_places'],);
		$unControleur->update ($tab,"idavion", $_POST['idavion'] ); 
		header("Location: index.php?page=2");
	}

	if (isset($_POST['Filtrer'])){
		$tab = array($_POST['Filtrer_Select']); 
		$lesAvions = $unControleur->selectSearch($_POST['mot'], $tab);
	}else{ 

		$lesAvions = $unControleur->selectAll (); 
	}
	require_once ("vue/vue_les_avions.php"); 
?>