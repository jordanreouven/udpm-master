$(function(){ 
    $("#OptionUser").hide(); 
}); 
$(document).click(function(e) {
    if( (e.target.id != 'User') && (e.target.id != 'IdUser')) {
        $("#IdUser").css("background-color","#2E505C").css("box-shadow","none").css("height","100%");
        $("#OptionUser").hide();  
    }else{
        $("#IdUser").css("background-color","#5A3640").css("box-shadow","-1px 2px 40px 3px rgba(0, 0, 0, 0.3) inset").css("height","calc(100% + 1px)");
        $("#OptionUser").show();  
    }
});