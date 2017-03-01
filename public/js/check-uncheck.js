$('#label-cat, #cat_1, #div-categoria').mouseover(function() {
    $(this).css({cursor: "pointer"});
});


$("#label-cat, #cat_1, #div-categoria").on("click", function() {
    if( $("#cat_1").is(":checked") ){
        $("#cat_1").prop("checked", false);
    }else{
        $("#cat_1").prop("checked", true);
    }

    if( $("#cat_1").is(":checked") ){
        $('#check_span').removeClass('glyphicon-unchecked');
        $('#check_span').addClass('glyphicon-check');
        $("#div-bg").css({backgroundColor: "#5E5E62"});
        $("#check_span").css({color: "#FFFFFF"});
        $("#label-cat").css({color: "#FFFFFF"});
    }else{
        $('#check_span').removeClass('glyphicon-check');
        $('#check_span').addClass('glyphicon-unchecked');
        $("#div-bg").css({backgroundColor: "#FFFFFF"});
        $("#check_span").css({color: "#171717"});
        $("#label-cat").css({color: "#171717"});
    }
     
});



   