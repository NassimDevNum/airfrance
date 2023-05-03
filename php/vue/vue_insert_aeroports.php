<h3>Ajout d'un nouvel aéroport</h3>
<form method="post">
        <table>
            <tr>
                <td>Nom de l'aéroport</td>
                <td><input type="text" name="nom" value="<?= ($lAeroport!=null)?$lAeroport['nom']:''?>"></td>
            </tr>
            <tr>
                <td>Ville de l'aéroport</td>
                <td><input type="text" name="ville" value="<?= ($lAeroport!=null)?$lAeroport['ville']:''?>"></td>
            </tr>
            <tr>
                <td>Pays de l'aéroport</td>
                <td><input type="text" name="pays" value="<?= ($lAeroport!=null)?$lAeroport['pays']:''?>"></td>
            </tr>
            <div class="button">
            <tr>
                <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler"></td>
                <td>
                    <?= ($lAeroport!=null)?'<input class="btn btn-primary" type="submit" name="Modifier" value="Modifier">':'<input class="btn btn-primary" type="submit" name="Valider" value="Valider">'?>
                
            </tr>
            <?= ($lAeroport!=null)? '<input type="hidden" name="idaeroport" value="'.$lAeroport['idaeroport'].'">':''?>
            </div>
        </table>
</form>