function set_item(item){ 
    if(item==""){
        $('#searchResult').hide();
    }
    else{
        window.location.href="index.php?page=Music&item="+item;   
    }        
}
function RechercheGeneral(item){ 
    if(item==""){
        $('#searchResult').hide();
    }
    else{
        window.location.href="index.php?page=RechercheGeneral&item="+item;   
    }        
}
$(document).ready(function(){
    
        var keyword = $('#search').val();
        if(keyword==""){
            $('#search').val("");
        }
    
        function autocomplet() {
            var min_length = 1; // min caracters to display the autocomplete
            var keyword = $('#search').val();
            if (keyword.length >= min_length) {
                $.ajax({
                    url: 'autocomplete.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data){
                        $('#searchResult').show();
                        $('#searchResult').html(data);
                    }
                });
            } else {
                
            }
        }
        
        $("#search").keyup(function(){
            autocomplet();
        });
        $("#search").focusin(function(){
            $('#searchResult').show();
        });
    
        function connexionLoginPass() {
            var min_length = 1; // min caracters to display the autocomplete
            var login = $('#login').val();
            var Pass = $('#passwd').val();
            //----------------------------------------------------
            if (Pass.length >= min_length) {
                    $.ajax({
                        url: 'ConnexionReq.php',
                        type: 'POST',
                        data: {Login:login,Password:Pass},
                        success:function(data){
                            $('#ConCheck').val(data);
                            if($('#ConCheck').val()=="true"){
                                $('#login').fadeOut(600);
                                $('#ConfCon').fadeOut(600);
                                $('#LabelCon').css("margin-top","60px").css("transition","margin-top 1s");
                                $('#passwd').fadeOut(600,function(){
                                    if($('#passwd').is(":hidden")==true){
                                        $('#ConEnCours').html("en cours");
                                        $('#ConEnCours').fadeIn(1500); 
                                        setTimeout(function(){
                                            window.location.href="index.php?page=Accueil";
                                        },3000);
                                    }
                                });
                            }
                            else{
                                $('#login').fadeOut(600);
                                $('#ConfCon').fadeOut(600);
                                $('#passwd').fadeOut(600,function(){
                                    if($('#passwd').is(":hidden")==true){
                                        if(data=="pass"){
                                            $('#ConEnCours').html("Le mot de passe<br> est <b style='color:#FF6363;'>faux</b>."); 
                                        }
                                        if(data=="loginPass"){
                                            $('#ConEnCours').html("Mot de passe<br> et / ou login <br><b style='color:#FF6363;'>faux</b>.");
                                        }
                                        $('#ConEnCours').css("font-size","29pt");
                                        $('#ConEnCours').fadeIn(1500,function(){
                                            setTimeout(function(){
                                                $('#ConEnCours').fadeOut( 600);      
                                            },1500);
                                            if(data=="pass"){
                                                setTimeout(function(){
                                                    $('#login').fadeIn(600);
                                                    $('#ConfCon').fadeIn(600);
                                                    $('#passwd').fadeIn(600,function(){
                                                        $('#passwd').focus();
                                                    });  
                                                },2100);
                                            }
                                            if(data=="loginPass"){
                                                setTimeout(function(){
                                                    $('#login').fadeIn(600);
                                                    $('#ConfCon').fadeIn(600);
                                                    $('#passwd').fadeIn(600,function(){
                                                        $('#login').focus();
                                                    });  
                                                },2100);
                                            }
                                        });   
                                    }
                                });
                            }
                        }
                    });
                } else {

                }
        }
        
        $('#login').on('keypress',function(e) {
            if( e.keyCode === 13 ) {
                connexionLoginPass();
            }
        });
        $('#passwd').on('keypress',function(e) {
            if( e.keyCode === 13 ) {
                connexionLoginPass();
            }
        }); 
        $('#ConfCon').click(function() {
            connexionLoginPass();
        });
        $("#inscription").click(function(){
            window.location.href="index.php?page=Inscription";   
        });
    });    