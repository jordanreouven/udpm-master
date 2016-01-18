<?php 
session_start();
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