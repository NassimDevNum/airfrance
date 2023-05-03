<h3>Ajout d'un nouveau vol</h3>
<form method="post">
        <table class="vol">
            <tr>
                <td>Numéro de vol</td>
                <td><input type="text" name="numero" value="<?= ($leVol!=null)?$leVol['numero']:''?>"></td>
            </tr>
            <tr>
                <td>id Pilote</td>
                <td><input type="text" name="idpilote" value="<?= ($leVol!=null)?$leVol['idpilote']:''?>"></td>
            </tr>
            <tr>
                <td>Id Avion</td>
                <td><input type="text" name="idavion" value="<?= ($leVol!=null)?$leVol['idavion']:''?>"></td>
            </tr>
            <tr>
                <td>date de départ <input type = 'text' name = 'date_depart' id='date_depart' value="<?= ($leVol!=null)?$leVol['date_depart']:''?>">
                    &nbsp;<img style='cursor: pointer; padding:3px;' onclick="javascript:rb_plage('depart')" src='img/calendar.png' height="20" width="20" align='absmiddle'>
                    <div id='calendar_depart' style='display:none;margin-left:100px;_margin-top:25px;_margin-left:-150px;'></div>
                </td>
            </tr>
            <tr>
            <td>date d'arrivée <input type = 'text' name = 'date_arrivee' id='date_arrivee' value="<?= ($leVol!=null)?$leVol['date_arrivee']:''?>">
                    &nbsp;<img style='cursor: pointer; padding:3px;' onclick="javascript:rb_plage('arrivee')" src='img/calendar.png' height="20" width="20" align='absmiddle'>
                    <div id='calendar_arrivee' style='display:none;margin-left:100px;_margin-top:25px;_margin-left:-150px;'></div>
                </td>
            </tr>
            <tr>
                <td>aéroport de départ</td>
                <td><input type="text" name="idaeroport_depart" value="<?= ($leVol!=null)?$leVol['idaeroport_depart']:''?>"></td>
            </tr>
            <tr>
                <td>aéroport d'arrivée</td>
                <td><input type="text" name="idaeroport_arrivee" value="<?= ($leVol!=null)?$leVol['idaeroport_arrivee']:''?>"></td>
            </tr>
            <div class="button">
            <tr>
                <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler"></td>
                <td>
                    <?= ($leVol!=null)?'<input class="btn btn-primary" type="submit" name="Modifier" value="Modifier">':'<input class="btn btn-primary" type="submit" name="Valider" value="Valider">'?>
                </td>
            </tr>
            <?= ($leVol!=null)? '<input type="hidden" name="idvol" value="'.$leVol['idvol'].'">':''?>
            </div>
        </table>
</form>