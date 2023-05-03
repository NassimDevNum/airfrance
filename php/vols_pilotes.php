<h2> Liste des vols</h2>
<?php 

$unControleur->setTable("pilotes");
$lesPilotes = $unControleur->selectAll();

$unControleur->setTable("avions");
$lesAvions = $unControleur->selectAll();

$unControleur->setTable("vols");
$lesVols = $unControleur->selectAll();

if (isset($_POST['Filtrer'])){
    $tab = array($_POST['Filtrer_Select']); 
    $lesVols = $unControleur->selectSearch($_POST['mot'], $tab);
}else{ 

    $lesVols = $unControleur->selectAll(); 
}
require_once('vue/vue_les_vols_pilotes.php');

?>