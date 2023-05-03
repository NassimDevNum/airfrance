<h3>Ajout d'un nouveau pilote</h3>
<form method="post">
        <table>
            <tr>
                <td>Nom du pilote</td>
                <td><input type="text" name="nom" value="<?= ($lePilote!=null)?$lePilote['nom']:''?>"></td>
            </tr>
            <tr>
                <td>Prenom du pilote</td>
                <td><input type="text" name="prenom" value="<?= ($lePilote!=null)?$lePilote['prenom']:''?>"></td>
            </tr>
            <tr>
                <td>Age du pilote</td>
                <td><input type="text" name="age" value="<?= ($lePilote!=null)?$lePilote['age']:''?>"></td>
            </tr>
            <div class="button">
            <tr>
                <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler"></td>
                <td>
                    <?= ($lePilote!=null)?'<input class="btn btn-primary" type="submit" name="Modifier" value="Modifier">':'<input class="btn btn-primary" type="submit" name="Valider" value="Valider">'?>
                
            </tr>
            <?= ($lePilote!=null)? '<input type="hidden" name="idpilote" value="'.$lePilote['idpilote'].'">':''?>
            </div>
        </table>
</form>