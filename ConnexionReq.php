<?php

$Login=htmlspecialchars(@$_POST['Login']);
$Password=htmlspecialchars(@$_POST['Password']);

function bdConnect($requete, $type_req){
    $hote='localhost';
    $nom_bd='udpm'; //Le nom de votre base de données.
    $utilisateur='root'; //Nom d'utilisateur pour se connecter.
    $mdp=''; // Mot de passe de l'utilisateur pur se connecter.
    try{
        $connexion = new PDO('mysql:host='.$hote.';dbname='.$nom_bd, $utilisateur, $mdp);   
    }
    catch(Exception $e){
        echo 'Une erreur est survenue !';
        die();
    }

    //Execution de la requ^te
    if ($type_req == "select"){
        $result=$connexion->query("$requete");
        return ($result);
    }
    else{
        $result=$connexion->exec("$requete");
        return;
    }  
}

    
$requete="SELECT * FROM user WHERE Login LIKE '".$Login."'";
$resultats=bdConnect($requete, 'select');


while ($ligne = $resultats->fetch()){
    if($ligne['Login']==$Login){
        if($ligne['Password']==$Password){
            $data="true";
            echo $data;
            session_start();
            $_SESSION['Login']=$Login;
            $_SESSION['Password']=$Password;
            break;
        }
        else{
            $data="pass";
            echo $data; 
            break;
        }
    }
}
if(empty($ligne)){
   $data="loginPass";
        echo $data; 
}
?>