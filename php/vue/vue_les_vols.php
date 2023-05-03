<h3>Liste des vols</h3>
<form method="post">
	Filtrer par : 
	<select name="Filtrer_Select">
	<option value="idvol">ID Vol</option>
    <option value="numero">Numero</option>
    <option value="idpilote">Id Pilote</option>
    <option value="idavion">Id Avion</option>
    <option value="date_depart">Date de départ</option>
	<option value="date_arrivee">Date d'arrivée</option>
	<option value="idaeroport_depart">Aéroport de départ</option>
	<option value="idaeroport_arrivee">Aéroport d'arrivée</option>
	</select>
	<input type="text" name="mot">
	<input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table>
	<tr> 
		<td> Id Vol </td> 
		<td> numéro de vol </td>
		<td> Id Pilote </td>
		<td> Id Avion </td>
		<td> date de départ </td> 
		<td> date d'arrivée </td> 
		<td> aéroport de départ </td>
        <td> aéroport d'arrivée </td>
	<tr> 
	<?php
	foreach ($lesVols as $unVol) {
		echo "<tr>"; 
		echo "<td>".$unVol['idvol']."</td>"; 
		echo "<td>".$unVol['numero']."</td>"; 
		echo "<td>".$unVol['idpilote']."</td>"; 
		echo "<td>".$unVol['idavion']."</td>"; 
		echo "<td>".$unVol['date_depart']."</td>"; 
		echo "<td>".$unVol['date_arrivee']."</td>"; 
        echo "<td>".$unVol['idaeroport_depart']."</td>";
        echo "<td>".$unVol['idaeroport_arrivee']."</td>"; 
		echo "<td><a href='index.php?page=4&action=edit&idvol=".$unVol['idvol']."'><img src='img/edit.png' height='30' width='30'></a></td>";
		echo "<td><a href='index.php?page=4&action=supp&idvol=".$unVol['idvol']."'><img src='img/supp.png' height='30' width='30'></a></td>";
		echo "<tr/>";
	}
	?>
</table>