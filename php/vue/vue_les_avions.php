<h3>Liste des avions</h3>
<form method="post">
	Filtrer par :
	<select name="Filtrer_Select">
	<option value="idavion">ID avion</option>
    <option value="immatriculation">Immatriculation</option>
    <option value="marque">Marque</option>
    <option value="modele">Modele</option>
    <option value="nb_places">Nombre de places</option>
	</select>
	<input type="text" name="mot">
	<input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table>
<tr> 
		<td> Id Avion </td> 
		<td> Immatriculation </td>
		<td> Marque </td> 
		<td> Modele </td> 
		<td> Nombre de place </td>
	<tr> 
	<?php
	foreach ($lesAvions as $unAvion) {
		echo "<tr>"; 
		echo "<td>".$unAvion['idavion']."</td>"; 
		echo "<td>".$unAvion['immatriculation']."</td>"; 
		echo "<td>".$unAvion['marque']."</td>"; 
		echo "<td>".$unAvion['modele']."</td>"; 
        echo "<td>".$unAvion['nb_places']."</td>"; 
		echo "<td><a href='index.php?page=2&action=edit&idavion=".$unAvion['idavion']."'><img src='img/edit.png' height='30' width='30'></a></td>";
		echo "<td><a href='index.php?page=2&action=supp&idavion=".$unAvion['idavion']."'><img src='img/supp.png' height='30' width='30'></a></td>";
		echo "<tr/>";
	}
	?>
</table>