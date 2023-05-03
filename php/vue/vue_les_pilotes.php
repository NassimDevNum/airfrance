<h3>Liste des pilotes</h3>
<form method="post">
	Filtrer par : 
	<select name="Filtrer_Select">
	<option value="idpilote">ID pilote</option>
    <option value="nom">Nom</option>
    <option value="prenom">Prenom</option>
    <option value="age">Age</option>
	</select>
	<input type="text" name="mot">
	<input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table>
<tr> 
		<td> Id Pilote </td> 
		<td> nom </td>
		<td> prenom </td> 
		<td> age </td>
	<tr> 
	<?php
	foreach ($lesPilotes as $unPilote) {
		echo "<tr>"; 
		echo "<td>".$unPilote['idpilote']."</td>"; 
        echo "<td>".$unPilote['nom']."</td>"; 
		echo "<td>".$unPilote['prenom']."</td>"; 
		echo "<td>".$unPilote['age']."</td>"; 
		echo "<td><a href='index.php?page=1&action=edit&idpilote=".$unPilote['idpilote']."'><img src='img/edit.png' height='30' width='30'></a></td>";
		echo "<td><a href='index.php?page=1&action=supp&idpilote=".$unPilote['idpilote']."'><img src='img/supp.png' height='30' width='30'></a></td>";
		echo "<tr/>";
	}
	?>
</table>