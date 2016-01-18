<?php 
    session_start();
    $NomUtilisateur=$_SESSION['Login'];

?>
<div class="page">
    
        <div class="header">
            <?php include("Include/MenuHeader.php");?>
        </div>

        <div class="Profil">

            <div class="Photo" style="background-image: url(utilisateur/<?php echo $NomUtilisateur; ?>/Img/ImgProfile/profil.png);"> </div>
            <div class="MesLike">  </div>
      
        </div>
</div> 

