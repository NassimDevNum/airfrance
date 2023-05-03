 <!-- MVC php pour une entreprise d'aviation Air France avec : gestion des avions / gestion des vols / gestion des pilotes 
On se connecte à la base de donnée avec un PDO, bdd: 'airfrance' user: 'root' password: 'root'
Tables : avions, vols, pilotes, aeroports  -->

Index:

<?php

require_once 'model/AvionManager.php';
require_once 'model/VolManager.php';
require_once 'model/PiloteManager.php';
require_once 'model/AeroportManager.php';

function listAvions()
{
    $avionManager = new AvionManager();
    $avions = $avionManager->getAvions();
    require 'view/listAvionsView.php';
}

function listVols()
{
    $volManager = new VolManager();
    $vols = $volManager->getVols();
    require 'view/listVolsView.php';
}

function listPilotes()
{
    $piloteManager = new PiloteManager();
    $pilotes = $piloteManager->getPilotes();
    require 'view/listPilotesView.php';
}

function listAeroports()
{
    $aeroportManager = new AeroportManager();
    $aeroports = $aeroportManager->getAeroports();
    require 'view/listAeroportsView.php';
}

function addAvion($immatriculation, $marque, $modele, $nb_places)
{
    $avionManager = new AvionManager();
    $affectedLines = $avionManager->addAvion($immatriculation, $marque, $modele, $nb_places);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'avion !');
    } else {
        header('Location: index.php?action=listAvions');
    }
}

function addVol($numero, $date_depart, $date_arrivee, $id_avion, $id_pilote, $id_aeroport_depart, $id_aeroport_arrivee)
{
    $volManager = new VolManager();
    $affectedLines = $volManager->addVol($numero, $date_depart, $date_arrivee, $id_avion, $id_pilote, $id_aeroport_depart, $id_aeroport_arrivee);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le vol !');
    } else {
        header('Location: index.php?action=listVols');
    }
}

function addPilote($nom, $prenom, $age)
{
    $piloteManager = new PiloteManager();
    $affectedLines = $piloteManager->addPilote($nom, $prenom, $age);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le pilote !');
    } else {
        header('Location: index.php?action=listPilotes');
    }
}

function addAeroport($nom, $ville, $pays)
{
    $aeroportManager = new AeroportManager();
    $affectedLines = $aeroportManager->addAeroport($nom, $ville, $pays);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'aéroport !');
    } else {
        header('Location: index.php?action=listAeroports');
    }
}

function deleteAvion($id)
{
    $avionManager = new AvionManager();
    $affectedLines = $avionManager->deleteAvion($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer l\'avion !');
    } else {
        header('Location: index.php?action=listAvions');
    }
}

function deleteVol($id)
{
    $volManager = new VolManager();
    $affectedLines = $volManager->deleteVol($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le vol !');
    } else {
        header('Location: index.php?action=listVols');
    }
}

function deletePilote($id)
{
    $piloteManager = new PiloteManager();
    $affectedLines = $piloteManager->deletePilote($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le pilote !');
    } else {
        header('Location: index.php?action=listPilotes');
    }
}

function deleteAeroport($id)
{
    $aeroportManager = new AeroportManager();
    $affectedLines = $aeroportManager->deleteAeroport($id);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer l\'aéroport !');
    } else {
        header('Location: index.php?action=listAeroports');
    }
}

function updateAvion($id, $immatriculation, $marque, $modele, $nb_places)
{
    $avionManager = new AvionManager();
    $affectedLines = $avionManager->updateAvion($id, $immatriculation, $marque, $modele, $nb_places);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'avion !');
    } else {
        header('Location: index.php?action=listAvions');
    }
}

function updateVol($id, $numero, $date_depart, $date_arrivee, $id_avion, $id_pilote, $id_aeroport_depart, $id_aeroport_arrivee)
{
    $volManager = new VolManager();
    $affectedLines = $volManager->updateVol($id, $numero, $date_depart, $date_arrivee, $id_avion, $id_pilote, $id_aeroport_depart, $id_aeroport_arrivee);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le vol !');
    } else {
        header('Location: index.php?action=listVols');
    }
}

function updatePilote($id, $nom, $prenom, $age)
{
    $piloteManager = new PiloteManager();
    $affectedLines = $piloteManager->updatePilote($id, $nom, $prenom, $age);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le pilote !');
    } else {
        header('Location: index.php?action=listPilotes');
    }
}

function updateAeroport($id, $nom, $ville, $pays)
{
    $aeroportManager = new AeroportManager();
    $affectedLines = $aeroportManager->updateAeroport($id, $nom, $ville, $pays);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'aéroport !');
    } else {
        header('Location: index.php?action=listAeroports');
    }
}

function getAvion($id)
{
    $avionManager = new AvionManager();
    $avion = $avionManager->getAvion($id);
    require 'view/updateAvionView.php';
}

function getVol($id)
{
    $volManager = new VolManager();
    $vol = $volManager->getVol($id);
    require 'view/updateVolView.php';
}

function getPilote($id)
{
    $piloteManager = new PiloteManager();
    $pilote = $piloteManager->getPilote($id);
    require 'view/updatePiloteView.php';
}

function getAeroport($id)
{
    $aeroportManager = new AeroportManager();
    $aeroport = $aeroportManager->getAeroport($id);
    require 'view/updateAeroportView.php';
}
?>
 <!-- base de données SQL et les tables qui correspondent au code:  -->

<!-- CREATE DATABASE airfrance;

CREATE TABLE avions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    immatriculation VARCHAR(30) NOT NULL,
    marque VARCHAR(30) NOT NULL,
    modele VARCHAR(30) NOT NULL,
    nb_places INT(6) NOT NULL
);

CREATE TABLE vols (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(30) NOT NULL,
    date_depart DATE NOT NULL,
    date_arrivee DATE NOT NULL,
    id_avion INT(6) NOT NULL,
    id_pilote INT(6) NOT NULL,
    id_aeroport_depart INT(6) NOT NULL,
    id_aeroport_arrivee INT(6) NOT NULL
);

CREATE TABLE pilotes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    age INT(6) NOT NULL
);

CREATE TABLE aeroports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    ville VARCHAR(30) NOT NULL,
    pays VARCHAR(30) NOT NULL
); -->

/* les fichiers de vues: */

listAvionsView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Liste des avions</title>
    </head>
    <body>
        <h1>Liste des avions</h1>
        <p><a href="index.php?action=addAvion">Ajouter un avion</a></p>
        <table>
            <tr>
                <th>Immatriculation</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Nombre de places</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($avions as $avion) {
                ?>
                <tr>
                    <td><?= $avion['immatriculation'] ?></td>
                    <td><?= $avion['marque'] ?></td>
                    <td><?= $avion['modele'] ?></td>
                    <td><?= $avion['nb_places'] ?></td>
                    <td><a href="index.php?action=getAvion&amp;id=<?= $avion['id'] ?>">Modifier</a></td>
                    <td><a href="index.php?action=deleteAvion&amp;id=<?= $avion['id'] ?>">Supprimer</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>

listVolsView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Liste des vols</title>
    </head>
    <body>
        <h1>Liste des vols</h1>
        <p><a href="index.php?action=addVol">Ajouter un vol</a></p>
        <table>
            <tr>
                <th>Numéro</th>
                <th>Date de départ</th>
                <th>Date d'arrivée</th>
                <th>Avion</th>
                <th>Pilote</th>
                <th>Aéroport de départ</th>
                <th>Aéroport d'arrivée</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($vols as $vol) {
                ?>
                <tr>
                    <td><?= $vol['numero'] ?></td>
                    <td><?= $vol['date_depart'] ?></td>
                    <td><?= $vol['date_arrivee'] ?></td>
                    <td><?= $vol['id_avion'] ?></td>
                    <td><?= $vol['id_pilote'] ?></td>
                    <td><?= $vol['id_aeroport_depart'] ?></td>
                    <td><?= $vol['id_aeroport_arrivee'] ?></td>
                    <td><a href="index.php?action=getVol&amp;id=<?= $vol['id'] ?>">Modifier</a></td>
                    <td><a href="index.php?action=deleteVol&amp;id=<?= $vol['id'] ?>">Supprimer</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>

listPilotesView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Liste des pilotes</title>
    </head>
    <body>
        <h1>Liste des pilotes</h1>
        <p><a href="index.php?action=addPilote">Ajouter un pilote</a></p>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($pilotes as $pilote) {
                ?>
                <tr>
                    <td><?= $pilote['nom'] ?></td>
                    <td><?= $pilote['prenom'] ?></td>
                    <td><?= $pilote['age'] ?></td>
                    <td><a href="index.php?action=getPilote&amp;id=<?= $pilote['id'] ?>">Modifier</a></td>
                    <td><a href="index.php?action=deletePilote&amp;id=<?= $pilote['id'] ?>">Supprimer</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>

listAeroportsView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Liste des aéroports</title>
    </head>
    <body>
        <h1>Liste des aéroports</h1>
        <p><a href="index.php?action=addAeroport">Ajouter un aéroport</a></p>
        <table>
            <tr>
                <th>Nom</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($aeroports as $aeroport) {
                ?>
                <tr>
                    <td><?= $aeroport['nom'] ?></td>
                    <td><?= $aeroport['ville'] ?></td>
                    <td><?= $aeroport['pays'] ?></td>
                    <td><a href="index.php?action=getAeroport&amp;id=<?= $aeroport['id'] ?>">Modifier</a></td>
                    <td><a href="index.php?action=deleteAeroport&amp;id=<?= $aeroport['id'] ?>">Supprimer</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>

addAvionView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajouter un avion</title>
    </head>
    <body>
        <h1>Ajouter un avion</h1>
        <form action="index.php?action=addAvion" method="post">
            <p>
                <label for="immatriculation">Immatriculation</label> : <input type="text" name="immatriculation" id="immatriculation" />
            </p>
            <p>
                <label for="marque">Marque</label> : <input type="text" name="marque" id="marque" />
            </p>
            <p>
                <label for="modele">Modèle</label> : <input type="text" name="modele" id="modele" />
            </p>
            <p>
                <label for="nb_places">Nombre de places</label> : <input type="text" name="nb_places" id="nb_places" />
            </p>
            <p>
                <input type="submit" value="Ajouter" />
            </p>
        </form>
    </body>
</html>

addVolView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajouter un vol</title>
    </head>
    <body>
        <h1>Ajouter un vol</h1>
        <form action="index.php?action=addVol" method="post">
            <p>
                <label for="numero">Numéro</label> : <input type="text" name="numero" id="numero" />
            </p>
            <p>
                <label for="date_depart">Date de départ</label> : <input type="text" name="date_depart" id="date_depart" />
            </p>
            <p>
                <label for="date_arrivee">Date d'arrivée</label> : <input type="text" name="date_arrivee" id="date_arrivee" />
            </p>
            <p>
                <label for="id_avion">Avion</label> : <input type="text" name="id_avion" id="id_avion" />
            </p>
            <p>
                <label for="id_pilote">Pilote</label> : <input type="text" name="id_pilote" id="id_pilote" />
            </p>
            <p>
                <label for="id_aeroport_depart">Aéroport de départ</label> : <input type="text" name="id_aeroport_depart" id="id_aeroport_depart" />
            </p>
            <p>
                <label for="id_aeroport_arrivee">Aéroport d'arrivée</label> : <input type="text" name="id_aeroport_arrivee" id="id_aeroport_arrivee" />
            </p>
            <p>
                <input type="submit" value="Ajouter" />
            </p>
        </form>
    </body>
</html>

addPiloteView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajouter un pilote</title>
    </head>
    <body>
        <h1>Ajouter un pilote</h1>
        <form action="index.php?action=addPilote" method="post">
            <p>
                <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" />
            </p>
            <p>
                <label for="prenom">Prénom</label> : <input type="text" name="prenom" id="prenom" />
            </p>
            <p>
                <label for="age">Age</label> : <input type="text" name="age" id="age" />
            </p>
            <p>
                <input type="submit" value="Ajouter" />
            </p>
        </form>
    </body>
</html>

addAeroportView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajouter un aéroport</title>
    </head>
    <body>
        <h1>Ajouter un aéroport</h1>
        <form action="index.php?action=addAeroport" method="post">
            <p>
                <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" />
            </p>
            <p>
                <label for="ville">Ville</label> : <input type="text" name="ville" id="ville" />
            </p>
            <p>
                <label for="pays">Pays</label> : <input type="text" name="pays" id="pays" />
            </p>
            <p>
                <input type="submit" value="Ajouter" />
            </p>
        </form>
    </body>
</html>

updateAvionView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier un avion</title>
    </head>
    <body>
        <h1>Modifier un avion</h1>
        <form action="index.php?action=updateAvion&amp;id=<?= $avion['id'] ?>" method="post">
            <p>
                <label for="immatriculation">Immatriculation</label> : <input type="text" name="immatriculation" id="immatriculation" value="<?= $avion['immatriculation'] ?>" />
            </p>
            <p>
                <label for="marque">Marque</label> : <input type="text" name="marque" id="marque" value="<?= $avion['marque'] ?>" />
            </p>
            <p>
                <label for="modele">Modèle</label> : <input type="text" name="modele" id="modele" value="<?= $avion['modele'] ?>" />
            </p>
            <p>
                <label for="nb_places">Nombre de places</label> : <input type="text" name="nb_places" id="nb_places" value="<?= $avion['nb_places'] ?>" />
            </p>
            <p>
                <input type="submit" value="Modifier" />
            </p>
        </form>
    </body>
</html>

updateVolView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier un vol</title>
    </head>
    <body>
        <h1>Modifier un vol</h1>
        <form action="index.php?action=updateVol&amp;id=<?= $vol['id'] ?>" method="post">
            <p>
                <label for="numero">Numéro</label> : <input type="text" name="numero" id="numero" value="<?= $vol['numero'] ?>" />
            </p>
            <p>
                <label for="date_depart">Date de départ</label> : <input type="text" name="date_depart" id="date_depart" value="<?= $vol['date_depart'] ?>" />
            </p>
            <p>
                <label for="date_arrivee">Date d'arrivée</label> : <input type="text" name="date_arrivee" id="date_arrivee" value="<?= $vol['date_arrivee'] ?>" />
            </p>
            <p>
                <label for="id_avion">Avion</label> : <input type="text" name="id_avion" id="id_avion" value="<?= $vol['id_avion'] ?>" />
            </p>
            <p>
                <label for="id_pilote">Pilote</label> : <input type="text" name="id_pilote" id="id_pilote" value="<?= $vol['id_pilote'] ?>" />
            </p>
            <p>
                <label for="id_aeroport_depart">Aéroport de départ</label> : <input type="text" name="id_aeroport_depart" id="id_aeroport_depart" value="<?= $vol['id_aeroport_depart'] ?>" />
            </p>
            <p>
                <label for="id_aeroport_arrivee">Aéroport d'arrivée</label> : <input type="text" name="id_aeroport_arrivee" id="id_aeroport_arrivee" value="<?= $vol['id_aeroport_arrivee'] ?>" />
            </p>
            <p>
                <input type="submit" value="Modifier" />
            </p>
        </form>
    </body>
</html>

updatePiloteView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier un pilote</title>
    </head>
    <body>
        <h1>Modifier un pilote</h1>
        <form action="index.php?action=updatePilote&amp;id=<?= $pilote['id'] ?>" method="post">
            <p>
                <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" value="<?= $pilote['nom'] ?>" />
            </p>
            <p>
                <label for="prenom">Prénom</label> : <input type="text" name="prenom" id="prenom" value="<?= $pilote['prenom'] ?>" />
            </p>
            <p>
                <label for="age">Age</label> : <input type="text" name="age" id="age" value="<?= $pilote['age'] ?>" />
            </p>
            <p>
                <input type="submit" value="Modifier" />
            </p>
        </form>
    </body>
</html>

updateAeroportView.php:

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier un aéroport</title>
    </head>
    <body>
        <h1>Modifier un aéroport</h1>
        <form action="index.php?action=updateAeroport&amp;id=<?= $aeroport['id'] ?>" method="post">
            <p>
                <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" value="<?= $aeroport['nom'] ?>" />
            </p>
            <p>
                <label for="ville">Ville</label> : <input type="text" name="ville" id="ville" value="<?= $aeroport['ville'] ?>" />
            </p>
            <p>
                <label for="pays">Pays</label> : <input type="text" name="pays" id="pays" value="<?= $aeroport['pays'] ?>" />
            </p>
            <p>
                <input type="submit" value="Modifier" />
            </p>
        </form>
    </body>
</html>

/* les fichiers de modèles: */

AvionManager.php:

<!-- <?php -->

// class AvionManager
// {
//     private $_db;

//     public function __construct($db)
//     {
//         $this->setDb($db);
//     }

//     public function setDb(PDO $db)
//     {
//         $this->_db = $db;
//     }

//     public function getAvions()
//     {
//         $avions = [];
//         $q = $this->_db->query('SELECT * FROM avions');
//         while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {