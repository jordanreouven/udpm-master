<?php 
session_start();
if($_SESSION['logged']=="yes"){
$NomUtilisateur=$_SESSION['Login'];
?>
<div class="page">
        <div class="header">
            <?php include("Include/MenuHeader.php"); ?>
        </div>
            <div class="music" align=center>
                <h1 style="color: #b47f2a;"><?php echo @$_GET['item'];?></h1>
                <?php include("Include/Player.php"); ?>
            </div>
</div> 
<?php } else {header('location:index.php?Page=ConnexionInscription');}