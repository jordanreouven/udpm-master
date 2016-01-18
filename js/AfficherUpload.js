function AfficherUpload(){
    $("#Upload").show(function(){
        $("#EffetFondNoir").css("background-color","rgba(0,0,0,0.4)").css("transition","background-color 1.2s");
        $(".FormUpload").fadeIn(1200);
    });
}