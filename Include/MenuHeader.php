<nav>   
    <ul>
        <li style="color:#b47f2a;font-size: 36pt;width: auto; float:left;"><a href="?page=Accueil" style="text-decoration:none;color:#b47f2a;position:relative;top:30px;left:10px;">UD&amp;PM</a></li>
        <!--<li style="float:left;left:15%;top:30px;width:40%;height:80px;">
            <input type="text" id="search" name="search" placeholder="Que voulez-vous écouter ?" autocomplete="off" style="width:100%;height:35px;box-shadow:2px 2px 12px -2px #000 inset;">
            <ul id="searchResult"></ul>
        </li>-->
        <li style="color:#b47f2a;font-size: 20pt;" id="User">
            <p align=center id="IdUser"><a style="position:relative;top:40px;"><?php echo $NomUtilisateur;?></a></p>
            <ul id="OptionUser">
                <a href="?page=Profil"><li>Profil</li></a>
                <a href="?page=Music"><li>Like</li></a>
                <a onclick="AfficherUpload();"><li>Upload</li></a>
                <a href="pages/Deconnexion.php"><li>Deconnexion</li></a>
            </ul>
        </li>
    </ul>
</nav>