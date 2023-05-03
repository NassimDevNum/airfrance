<?php
    session_start();
    require_once("controller/controller.class.php");
    require_once("controller/config_bdd.php");
    //instanciation du controleur
    $unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootcss/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/dhtmlxcalendar.css">
    <script src="js/dhtmlxcommon.js"></script>
    <script src="js/dhtmlxcalendar.js"></script> 
    <title>Air France</title>
    <script type="text/javascript">
    function rb_plage(id){
    mCal = null;
    typecal = id;
    document.getElementById('calendar_'+id).innerHTML='';
    mCal = new dhtmlxCalendarObject('calendar_'+id, false, {isMonthEditable: true, isYearEditable: true});
    mCal.draw();
    mCal.setDateFormat('%Y-%m-%d');
    mCal.attachEvent('onClick',selectDate_plage);
    if(document.getElementById('calendar_'+id).style.display=='none'){
        document.getElementById('calendar_'+id).style.display='block';
    }
    else{
        document.getElementById('calendar_'+id).style.display='none';
    }
    }
   
    function selectDate_plage(date){
        if(typecal!=''){
            var dateCible = mCal.getFormatedDate("%Y-%m-%d", date);
            document.getElementById('date_'+typecal).value = dateCible;
            document.getElementById('calendar_'+typecal).style.display='none';
        }
    typecal='';
    return true;
    }
</script>
</head>
<body>
    <center>
        <img src="img/airfr.png" height="100">

        <?php

        
            $user = null;
            if(! isset($_SESSION['email'])){
                require_once("vue/vue_connexion.php");
            }

            if(isset($_POST['SeConnecter'])){
                $email = $_POST['email'];
                $mdp = $_POST['mdp'];
                $user = $unControleur->verifConnexion($email,$mdp);
                if($user == null){
                    echo "<br> Vérifier vos identifiants";
                }else{
                    echo "<br>Bienvenue ".$user['nom'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['nom'] = $user['nom'];
                    $_SESSION['role'] = $user['role'];
                }

            }
            if(isset($_SESSION['email'])){
                if($_SESSION['role'] == 'admin'){
                    echo'
            <a href="index.php?page=0">
                <img src="img/home.png" height="100" width="100">
            </a>
            <a href="index.php?page=1">
                <img src="img/pilote.png" height="100" width="100">
            </a>
            <a href="index.php?page=2">
                <img src="img/avion.png" height="100" width="100">
            </a>
            <a href="index.php?page=3">
                <img src="img/aeroport.png" height="100" width="100">
            </a>
            <a href="index.php?page=4">
                <img src="img/vol.png" height="100" width="100">
            </a>
            <a href="index.php?page=5">
                <img src="img/deconnexion.png" height="100" width="100">
            </a>
            <hr class="blue">
            <hr class="white">
            <hr class="red">
            ';
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 0;
            }
            switch($page){
                case 0:require_once("home.php");break;
                case 1:require_once("pilotes.php");break;
                case 2:require_once("avions.php");break;
                case 3:require_once("aeroports.php");break;
                case 4:require_once("vols.php");break;
                case 5:session_destroy();
                unset($_SESSION['email']);
                header("Location: index.php");
                break;
            }
                }else{
                    echo'
            <a href="index.php?page=6">
                <img src="img/vol.png" height="100" width="100">
            </a>
            <a href="index.php?page=5">
                <img src="img/deconnexion.png" height="100" width="100">
            </a>
            <hr class="blue">
            <hr class="white">
            <hr class="red">
            ';
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 0;
        }
        switch($page){
            case 6:require_once("vols_pilotes.php");break;
            case 5:session_destroy();
            unset($_SESSION['email']);
            header("Location: index.php");
            break;
        }
                }
            }
            
        ?>
</body>
</html>