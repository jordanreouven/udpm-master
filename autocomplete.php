<?php
    $connexion = new PDO('mysql:host=localhost; dbname=udpm', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $keyword = '%'.$_POST['keyword'].'%';

    $requete = $connexion->prepare('SELECT * FROM user WHERE Firstname LIKE (:keyword) OR Surname LIKE (:keyword) LIMIT 0, 10'); 
    $requete->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $requete->execute();
    $liste = $requete->fetchAll();

    $resultat = str_replace($_POST['keyword'], '<b><u>'.$_POST['keyword'].'</u></b>', $_POST['keyword']);
    echo '<li style="list-style: none;" onclick="RechercheGeneral(\''.str_replace("'", "\'", $_POST['keyword']).'\')">Recherche pour \''.$resultat.'\'</li>';
    foreach ($liste as $rs) {
        // Mettre le texte entré en gras.
        $resultat = str_replace($_POST['keyword'], '<b><u>'.$_POST['keyword'].'</u></b>', $rs['Firstname']." ".$rs['Surname']);
        // add new option
        echo '<li style="list-style: none;" onclick="set_item(\''.str_replace("'", "\'", $rs['Firstname']." ".$rs['Surname']).'\')">'.$resultat;
        /*if($rs['Category']=="people"){
           
        }
        else{}*/
    }
?>