$(document).ready(function($){
    $('.hide_search').css({display: 'none'});
    $(document).on('click', " .show_search", (e)=>{
    $("#catalog").animate({
        right: "0vw",
    },400);
    $(".search_show_hide").html("<i class='hide_search fas fa-times'></i>");
        
    });
    $(document).on('click', " .hide_search", (e)=>{
    $("#catalog").animate({
        "right": "-100%",
    
    },400);
    $(".search_show_hide").html("<i class='show_search fas fa-search'></i>");
        
    });

});