<?php

include("Include/ConnexionBaseDeDonnees.php");
session_start();
$NomUtilisateur=$_SESSION['Login'];

?>
<div class="page">
    <div class="header">
        <?php include("Include/MenuHeader.php");?>
    </div>
    <div class="accueil">
        <div class="contenu">
            <div id="TopPlaylist" hidden>
                <p>Top Playlist</p>
                <?php
                $requete="SELECT * FROM `playlist` ORDER BY `Like` DESC LIMIT 5 ";
                $resultat=bdConnect($requete, 'select');
                while ($ligne=$resultat->fetch()){
                    echo"<div style=' width:200px; height:150px; background-color:white; float:left;'align=center>";
                    echo $ligne['NamePlaylist'];
                    echo"</div>";
                 }
                ?>
            </div>
            <div id="TopMusique">
                <p>Top Musique</p>
                <?php
                $requete="SELECT * FROM `music` ORDER BY `Like` DESC LIMIT 5 ";
                $resultat=bdConnect($requete, 'select');
                while ($ligne=$resultat->fetch()){
                            echo"<div style=' width:200px; height:150px; float:left;'align=center>";
                            echo $ligne['Name'];
                            echo"</div>";
                        }
                ?>
            </div>
            <div id="TopArtiste">
                <p>Top Artiste</p>
                <?php
                $requete="SELECT * FROM `artist` ORDER BY `Like` DESC LIMIT 5 ";
                $resultat=bdConnect($requete, 'select');
                while ($ligne=$resultat->fetch()){
                    echo"<div style=' width:200px; height:150px; background-color:white; float:left;'align=center>";
                    echo $ligne['NameArtist'];
                    echo"</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <div id="Upload" hidden>
        <div id="EffetFondNoir">
            <?php include("pages/Upload.php");?>
        </div>
    </div>
</div>