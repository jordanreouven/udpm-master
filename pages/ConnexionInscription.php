<script>
$(document).click(function(e) {
    if( e.target.id != 'search') {
        $("#searchResult").hide();  
    }else{
        $("#searchResult").show();  
    }
});
function AfficherMdpRec(){
    $("#EffetFondNoir").fadeIn(700,function(){
        $("#EffetFondNoir").css("background-color","rgba(0,0,0,0.4)").css("transition","background-color 0.7s");
        $(".mdp").fadeIn(700);
        $(".ConnexionInscription")
            .css("-webkit-filter","blur(5px)")
            .css("transition","-webkit-filter 0.7s")
            .css("-moz-filter","blur(5px)")
            .css("transition","-moz-filter 0.7s")
            .css("filter","blur(5px)")
            .css("transition","filter 0.7s");
        $(".mdp").show();
        $(".mdp")
            .css("margin-top","60px")
            .css("width","400px")
            .css("height","150px")
            .css("background-color","rgba(90,54,64,1)")
            .css("color","#FFF")
            .css("position","fixed")
            .css("border-radius","20px 20px 20px 20px")
            .css("z-index","3")
            .css("left","50%")
            .css("margin-left","-200px")
            .css("box-shadow","-1px 2px 40px 3px rgba(0, 0, 0, 0.3) inset");
    });
}
</script>
<div class="page">
    <div class="header">
        <nav>
            <ul>
                <li style="color:#b47f2a;font-size: 36pt;"><a style="text-decoration:none;color:#b47f2a;position:relative;top:30px;left:10px;">UD&amp;PM</a></li>
            </ul>
        </nav>
    </div>
    <div class="ConnexionInscription">
        <!-- Block qui concerne la recherche -->
        <div class="recherche" align=center>
            <br><p style="color:#b47f2a;font-size: 36pt; margin-bottom:15px;padding-left:40px;padding-right:40px;">The world of music that speaks to your ears !</p>
            <div class="resultat">
                <input type="text" id="search" name="search" placeholder="Que voulez-vous écouter ?" autocomplete="off">
                <ul id="searchResult"></ul>
            </div>
        </div>
        <div class="rest">
            <div class="infos">
                <!-- Block qui concerne la connexion -->
                <div class="connexion">
                    <p style="font-size:36pt;color:#84736b;margin-bottom:10px;margin-top:33px;" id="LabelCon">Connexion</p>
                    <input type="text" id="login" name="login" placeholder="Login" autocomplete="off" required><br>
                    <br><input type="password" id="passwd" name="passwd" placeholder="Password" required>
                    <p id="ConEnCours" style="font-size:36pt;color:#84736b;margin-top:-40px;" hidden></p>
                    <br><input type="button" id="ConfCon" value="OK">
                    <input type="hidden" id="ConCheck" value=""><br>
                </div>
                <!-------------------------------------->
                <div id="barre"></div>
                <!-- Block qui concerne l'inscription -->
                <div class="inscription">
                    <p style="font-size:36pt;color:#84736b;margin-bottom:-5px;margin-top:42px;">Inscription</p>
                    <p style="font-size:13pt;margin-bottom:10px;color:#84736b;">Pour pouvoir vous inscrire,<br> il faut suivre les étapes en cliquant<br> sur le bouton ci-dessous.</p><br>
                    <button id="inscription">ICI</button>
                </div>
            </div>
            <div style="text-align:center;margin: 0 auto;"><a style="color:white;" onclick="AfficherMdpRec();s">Mot de passe oublie</a></div>
        </div>
    </div>
    <div id="EffetFondNoir" hidden>
        <?php include("pages/mdp.php");?>
    </div>
</div>
