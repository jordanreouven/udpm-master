<?php 
   session_start();
if($_SESSION['logged']=="yes"){
    include('Include/ConnexionBaseDeDonnees.php');
    $NomUtilisateur=$_SESSION['Login'];
    $chemin="";
    $nb_fichier="";
    $bio=htmlspecialchars(@$_POST['bio']);
    echo $bio;
    $sql="INSERT INTO user (`Biographie`) values('$bio') WHERE `Login` LIKE '$NomUtilisateur'";
    bdConnect($sql, "passelect");
    
    if($dossier = opendir('utilisateur/'.$NomUtilisateur.'/Img/ImgProfil/')){//ouvre le répértoir de l'utilisateur

            while(false !== ($fichier = readdir($dossier))){ // vérifie que le répértoire existe et lis le contenu
                $nb_fichier++; // On incrémente le compteur de 1
            } 
    } 
    // si le compteur est égal a 2 l'utilisateur aura une photo de profil par defaut dans le cas contraire l'utilisateur aura une photo de profil qu'il a choisi
    if($nb_fichier==2){
        $chemin="utilisateur/Defaut.png";
    }
    else{
            $chemin="utilisateur/$NomUtilisateur/Img/ImgProfil/profil.png";
    }
    closedir($dossier);
    
    $requete="SELECT * from user where Login='$NomUtilisateur'";
    $resultat=bdConnect($requete,"select");
    while($ligne=$resultat->fetch()){
        $prenom=$ligne['Firstname'];
        $nom=$ligne['Surname'];
        $texte=$ligne['Biographie'];
    }
    
?>


<div class="page">
    
        <div class="header">
            <?php include("Include/MenuHeader.php");?>
        </div>

        <div class="Profil">

            <div class="Photo" style="background-image: url('<?php echo $chemin ?>');"> </div>
            <div class="Nom"><?php echo $prenom; echo" "; echo $nom;?></div>
            <div class="bio">
                <form id="FormBio" name="bio" action="" method="post">
                    <textarea name="bio" id="TextBio" rows="12" cols="60" values="<?php echo $texte ?>"></textarea>
                    <input type="submit" value="Enregistrer" style="border:none; padding:6px 0 6px 0; border-radius:2px; box-shadow:1px 1px 10px#999; background:#2E505C; font:bold 13px Arial; color:white;">
                </form>
            </div>
            <div class="like">
                <p>Ces likes:</p>
            </div>
      
        </div>
</div> 

<?php } else {header('location:index.php?Page=ConnexionInscription');}