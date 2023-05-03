<h3>Liste des aeroports</h3>
<form method="post">
	Filtrer par : 
	<select name="Filtrer_Select">
	<option value="idaeroport">ID Aéroport</option>
    <option value="nom">Nom</option>
    <option value="ville">Ville</option>
    <option value="pays">Pays</option>
	</select>
	<input type="text" name="mot">
	<input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table>
<tr> 
		<td> Id Aéroport </td> 
		<td> Nom aeroport </td>
		<td> Ville </td> 
		<td> Pays </td> 
		<td> Opérations </td>
	<tr> 
	<?php
	foreach ($lesAeroports as $unAeroport) {
		echo "<tr>"; 
		echo "<td>".$unAeroport['idaeroport']."</td>"; 
		echo "<td>".$unAeroport['nom']."</td>"; 
		echo "<td>".$unAeroport['ville']."</td>"; 
		echo "<td>".$unAeroport['pays']."</td>"; 
		echo "<td><a href='index.php?page=3&action=edit&idaeroport=".$unAeroport['idaeroport']."'><img src='img/edit.png' height='30' width='30'></a></td>";
		echo "<td><a href='index.php?page=3&action=supp&idaeroport=".$unAeroport['idaeroport']."'><img src='img/supp.png' height='30' width='30'></a></td>";
		echo "<tr/>";
	}
	?>
</table>