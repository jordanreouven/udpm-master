<?php
 
function bdConnect($requete, $type_req)
{
    $hote ='localhost';
    $nom_bd='udpm';
    $utilisateur='root';
    $mdp='';
   
    try
    {
        //connexion au serveur SQL
      //  $connexion= new PDO ('mysql:host='.$hote.';dname='.$nom_bd,                             $utilisateur, $mdp);
                $connexion = new PDO('mysql:host=localhost; dbname=udpm', 'root', '');
                               // permet d'avoir plus de détails sur les erreurs retournées
    }
   
    //gestion des erreurs
    catch(Exception $e)
    {
        echo 'Une erreur est survenue !';
        die();
    }
   
   
   //execution de la requete
    if ($type_req=='select'){
            $result=$connexion->query("$requete"); //exécution de requetes de selection (SELECT)
            return($result);}
    else
            $result=$connexion->exec("$requete"); //exécution de requete ddl qui changent les contenus de la BD
   
   //$connexion->closeCursor(); // termine le traitement de la requete
   
    return ($result);
}
?>