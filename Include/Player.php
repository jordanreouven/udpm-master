<?php
$NomUtilisateur=$_SESSION['Login'];
?>
<script>
    /*-----------------------------------------------------*/
       var audio
            
    /*Fonction qui va permettre de changer l'image "Play" en "Pause" et inversement*/
         $(function(){
             
         
    /*-----------------------------------------------------*/    
            audio=$("audio");
            audio.prop("volume",0.5);
            var compteur=0;
            addEventHandlers();
             });

            function addEventHandlers(){
                $("a.load").click(loadAudio);
                $("a.start").click(startAudio);
                $("a.forward").click(forwardAudio);
                $("a.back").click(backAudio);
                $("a.pause").click(pauseAudio);
                $("a.stop").click(stopAudio);
                $("a.volume-up").click(volumeUp);
                $("a.volume-down").click(volumeDown);
                $("a.mute").click(toggleMuteAudio);
            }

            function loadAudio(){
                audio.bind("load",function(){
                    $(".alert-success").html("Audio Loaded succesfully");
                });
                audio.trigger('load');
                startAudio();
            }

            function startAudio(NumBox){
                audio.trigger('play');
                $("#box"+NumBox).css("background-image","url(../img/Pause.png)");
            }

            function pauseAudio(NumBox){
                audio.trigger('pause');
                $("#box"+NumBox).css("background-image","url(../img/Play.png)");
            }

            function stopAudio(NumBox){
                pauseAudio();
                audio.prop("currentTime",0);
            }

            function forwardAudio(){
                pauseAudio();
                audio.prop("currentTime",audio.prop("currentTime")+5);
                startAudio();
            }

            function backAudio(){
                pauseAudio();
                audio.prop("currentTime",audio.prop("currentTime")-5);
                startAudio();
            }

            function volumeUp(){
                var volume = audio.prop("volume")+0.2;
                if(volume >1){
                    volume = 1;
                }
                audio.prop("volume",volume);
            }

            function volumeDown(){
                var volume = audio.prop("volume")-0.2;
                if(volume <0){
                    volume = 0;
                }
                audio.prop("volume",volume);
            }

            function toggleMuteAudio(){
                audio.prop("muted",!audio.prop("muted"));
            }
        /*-----------------------------------------------------*/
            function afficher(NumBox){
                $("#box"+NumBox).css("visibility","visible"); 
            }
            function desafficher(NumBox){
                $("#box"+NumBox).css("visibility","hidden");
            }
            function ActionPause(NumBox){
                var name=$("#box"+(NumBox-1)).css("background-image");
                name=name.substr(name.length-10,8);
                if(name=='Play.png'){
                    startAudio(NumBox-1);
                }
                else{
                    pauseAudio(NumBox-1);
                }
            }
        /*-----------------------------------------------------*/
    /*-----------------------------------------------------*/
</script>
<div class="player">
    <div class="FondPlayer">
        <audio controls="none" preload="none" hidden>
            <source src="utilisateur/<?php echo strtolower($NomUtilisateur);?>/Music/Make_Me_Smile.mp3">
        </audio>
        <ul style="float:left;">
            <?php for($i=1;$i<59;$i=$i+3){?>
            <li>
                <div id="box<?php echo $i?>" style="box-shadow: 0px 0px 0px 15px rgba(0, 0, 0, 0.3);margin:15px 15px 15px 15px;background-image:url(utilisateur/jordy/Img/ImgMusic/grey.jpg);width:150px;height:150px;background-size:cover;position:relative;z-index:2;" onmouseover="afficher(<?php echo $i+1;?>);" onmouseout="desafficher(<?php echo $i+1;?>);">
                    <div id="box<?php echo $i+1;?>" style="width:150px;height:150px;background-size:60px;background-image:url(img/Play.png);background-repeat:no-repeat;background-position:center;position:relative;opacity:1;z-index:2;visibility:hidden;">
                        <div id="box<?php echo $i+2;?>" style="width:150px;height:150px;position:relative;box-shadow: -1px 2px 40px 7px rgba(0, 0, 0, 0.7) inset;z-index:0;" onclick="ActionPause(<?php echo $i+2;?>);">
                        </div>
                    </div>
                </div>
            </li>
            <?php }?>
            <li id="Previous"></li>
            <li id="Next"></li>
            <li id="ActualTime"></li>
            <li id="track"></li>
            <li id="TotalTime"></li>
            <li id="Download"></li>
            <li id="Like"></li>
        </ul>
    </div>
</div>