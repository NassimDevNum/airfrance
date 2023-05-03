<h3>Ajout d'un nouvel avion</h3>
<form method="post">
        <table>
            <tr>
                <td>immatriculation de l'avion</td>
                <td><input type="text" name="immatriculation" value="<?= ($lAvion!=null)?$lAvion['immatriculation']:''?>"></td>
            </tr>
            <tr>
                <td>marque de l'avion</td>
                <td><input type="text" name="marque" value="<?= ($lAvion!=null)?$lAvion['marque']:''?>"></td>
            </tr>
            <tr>
                <td>modele de l'avion</td>
                <td><input type="text" name="modele" value="<?= ($lAvion!=null)?$lAvion['modele']:''?>"></td>
            </tr>
            <tr>
                <td>nombre de places dans l'avion</td>
                <td><input type="text" name="nb_places" value="<?= ($lAvion!=null)?$lAvion['nb_places']:''?>"></td>
            </tr>
            <div class="button">
            <tr>
                <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler"></td>
                <td>
                    <?= ($lAvion!=null)?'<input class="btn btn-primary" type="submit" name="Modifier" value="Modifier">':'<input class="btn btn-primary" type="submit" name="Valider" value="Valider">'?>
                
            </tr>
            <?= ($lAvion!=null)? '<input type="hidden" name="idavion" value="'.$lAvion['idavion'].'">':''?>
            </div>
        </table>
</form>