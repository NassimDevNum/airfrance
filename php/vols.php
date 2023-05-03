<h2> Gestion des vols</h2>
<?php

    $unControleur->setTable("pilotes");
    $lesPilotes = $unControleur->selectAll();

    $unControleur->setTable("avions");
    $lesAvions = $unControleur->selectAll();

	$unControleur->setTable("vols");

	if(isset($_POST['Valider'])){
		$tab=array("numero"=>$_POST['numero'], 
                    "idpilote"=>$_POST['idpilote'], 
                    "idavion"=>$_POST['idavion'],
                    "date_depart"=>$_POST['date_depart'],
                    "date_arrivee"=>$_POST['date_arrivee'],
                    "idaeroport_depart"=>$_POST['idaeroport_depart'],
                    "idaeroport_arrivee"=>$_POST['idaeroport_arrivee']);
		$unControleur->insert($tab); 
	}

	$leVol = null; 
	if(isset($_GET['action']) && isset($_GET['idvol']))
	{
		$action = $_GET['action'];
		$idvol = $_GET['idvol']; 
		switch ($action) {
			case 'supp': $unControleur->delete("idvol", $idvol); break;
			case 'edit': 
			$leVol = $unControleur->selectWhere ("idvol", $idvol); 
				break;
		}
	}

	require_once("vue/vue_insert_vols.php");

	if(isset($_POST['Modifier'])){
		$tab=array("numero"=>$_POST['numero'], 
                    "idpilote"=>$_POST['idpilote'], 
                    "idavion"=>$_POST['idavion'],
                    "date_depart"=>$_POST['date_depart'],
                    "date_arrivee"=>$_POST['date_arrivee'],
                    "idaeroport_depart"=>$_POST['idaeroport_depart'],
                    "idaeroport_arrivee"=>$_POST['idaeroport_arrivee'],);
		$unControleur->update ($tab,"idvol", $_POST['idvol'] ); 
		header("Location: index.php?pidavion=4");
	}

	if (isset($_POST['Filtrer'])){
		$tab = array($_POST['Filtrer_Select']); 
		$lesVols = $unControleur->selectSearch($_POST['mot'], $tab);
	}else{ 

		$lesVols = $unControleur->selectAll(); 
	}
	require_once ("vue/vue_les_vols.php"); 
?>







