<h2> Gestion des aeroports</h2>
<?php
	$unControleur->setTable("aeroports");

	if(isset($_POST['Valider'])){
		$tab=array("nom"=>$_POST['nom'], 
                    "ville"=>$_POST['ville'], 
                    "pays"=>$_POST['pays']);
		$unControleur->insert($tab); 
	}

	$lAeroport = null; 
	if(isset($_GET['action']) && isset($_GET['idaeroport']))
	{
		$action = $_GET['action'];
		$idaeroport = $_GET['idaeroport']; 
		switch ($action) {
			case 'supp': $unControleur->delete("idaeroport", $idaeroport); break;
			case 'edit': 
			$lAeroport = $unControleur->selectWhere ("idaeroport", $idaeroport); 
				break;
		}
	}

	require_once ("vue/vue_insert_aeroports.php");

	if(isset($_POST['Modifier'])){
		$tab=array("nom"=>$_POST['nom'], 
                    "ville"=>$_POST['ville'], 
                    "pays"=>$_POST['pays']);
		$unControleur->update ($tab,"idaeroport", $_POST['idaeroport'] ); 
		header("Location: index.php?page=3");
	}

	if (isset($_POST['Filtrer'])){
		$tab = array($_POST['Filtrer_Select']); 
		$lesAeroports = $unControleur->selectSearch($_POST['mot'], $tab);
	}else{ 

		$lesAeroports = $unControleur->selectAll (); 
	}
	require_once ("vue/vue_les_aeroports.php"); 
?>