<?php
include('Include/ConnexionBaseDeDonnees.php');
$email=@$_POST['email'];
if($email!=""){
    $requete2="SELECT * FROM user WHERE Email='$email'";
    $resultat=bdConnect($requete2,"select");
    while($ligne=$resultat->fetch()){
        $message="Login : ".$ligne['Login']."\nMot de passe : ".$ligne['Password']."\nCe message à définitivement le swag absolu.";
        mail($email,"Récupération mot de passe et login UDPM",$message);
    }
}
$retour=@$_GET['retour'];
if($retour==1){
    header("Location:index.php?page=Music");   
}
?>
<div class="mdp" hidden>
    <p style="padding:0 10px 0 10px">Pour récupérer votre mode de passe ou login, veuillez entrer votre email.</p>
    <form action="?retour=1" method="post">
        <label>Entrez votre email : </label><input type="email" name="email" id="email"><br><br>
        <input type="submit" value="Envoyer" 
               style="  width: 90px;
                        height: 30px;
                        margin-top: 20px;
                        padding: 0px 10px 0px 10px;
                        display: inline-block;
                        border: none;
                        color: #132b42;
                        background: #807f7f;
                        -webkit-box-shadow: 2px 2px 15px -4px #000000 ;
                        box-shadow: 2px 2px 15px -4px #000000 ;
                        z-index: 1;
                        position: relative;
                        font-size: 11pt;
                        border-radius: 20px 20px 20px 20px;
                        outline: none;"
        >
    </form>
</div>
