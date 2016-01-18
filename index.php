<?php 
if(!isset($Page)){
    $Page="ConnexionInscription";
}else{
    
}
if(isset($_GET['page'])){
    $Page=$_GET['page'];
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/jquery-1.11.3.min.js"></script>
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <script src="js/set_item.js"></script>
        <title>Accueil</title>
        <script src="js/ScriptMenu.js"></script>
        <script src="js/AfficherUpload.js"></script>
    </head>
    <body class="body">
        <div class="EffetPage">
        <?php
        switch($Page){
            case'ConnexionInscription':
                include('pages/ConnexionInscription.php');
                break;
            case'Music':
                include('pages/Music.php');
                break;
            case'People':
                include('pages/People.php');
                break;
            case'Playlist':
                include('pages/Playlist.php');
                break;
            case'Inscription':
                include('pages/Inscription.php');
                break;
            case'RechercheGeneral':
                include('pages/RechercheGeneral.php');
                break;
            case'Profil':
                include('pages/Profil.php');
                break;
            case'Upload':
                include('pages/Upload.php');
                break;
            default:
                include('pages/Accueil.php');
                break;
        } ?>
        </div>
        <div class="footer" align=center><div id="footer"><p align=center>- Alessandro Sipala &amp; Jordan Assayah -</p></div></div>
    </body>
</html>