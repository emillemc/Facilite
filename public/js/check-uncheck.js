

 $( document ).ready(function() {

    /******************** Cursor mãozinha em cima dos botões das categorias ******************/

    // cat_1
    $('#label_cat_1, #cat_1, #div_categoria_1, #check_span_1, #div_bg_1').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_2
    $('#label_cat_2, #cat_2, #div_categoria_2, #check_span_2, #div_bg_2').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_3
    $('#label_cat_3, #cat_3, #div_categoria_3, #check_span_3, #div_bg_3').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_4
    $('#label_cat_4, #cat_4, #div_categoria_4, #check_span_4, #div_bg_4').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_5
    $('#label_cat_5, #cat_5, #div_categoria_5, #check_span_5, #div_bg_5').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_6
    $('#label_cat_6, #cat_6, #div_categoria_6, #check_span_6, #div_bg_6').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    /* ************************************************************************************** */

    /* ************************ Check-uncheck style botões categorias************************ */

    // cat_1
    $("#div_bg_1").on("click", function() {
        if( $("#cat_1").is(":checked") ){
            $("#cat_1").prop("checked", false);
        }else{
            $("#cat_1").prop("checked", true);
        }

        if( $("#cat_1").is(":checked") ){
            $('#check_span_1').removeClass('glyphicon-unchecked');
            $('#check_span_1').addClass('glyphicon-check');
            $("#div_bg_1").css({backgroundColor: "#5E5E62"});
            $("#check_span_1").css({color: "#FFFFFF"});
            $("#label_cat_1").css({color: "#FFFFFF"});
        }else{
            $('#check_span_1').removeClass('glyphicon-check');
            $('#check_span_1').addClass('glyphicon-unchecked');
            $("#div_bg_1").css({backgroundColor: "#FFFFFF"});
            $("#check_span_1").css({color: "#171717"});
            $("#label_cat_1").css({color: "#171717"});
        }  
    });

    // cat_2
    $("#div_bg_2").on("click", function() {
        if( $("#cat_2").is(":checked") ){
            $("#cat_2").prop("checked", false);
        }else{
            $("#cat_2").prop("checked", true);
        }

        if( $("#cat_2").is(":checked") ){
            $('#check_span_2').removeClass('glyphicon-unchecked');
            $('#check_span_2').addClass('glyphicon-check');
            $("#div_bg_2").css({backgroundColor: "#5E5E62"});
            $("#check_span_2").css({color: "#FFFFFF"});
            $("#label_cat_2").css({color: "#FFFFFF"});
        }else{
            $('#check_span_2').removeClass('glyphicon-check');
            $('#check_span_2').addClass('glyphicon-unchecked');
            $("#div_bg_2").css({backgroundColor: "#FFFFFF"});
            $("#check_span_2").css({color: "#171717"});
            $("#label_cat_2").css({color: "#171717"});
        }    
    });

    // cat_3
    $("#div_bg_3").on("click", function() {
        if( $("#cat_3").is(":checked") ){
            $("#cat_3").prop("checked", false);
        }else{
            $("#cat_3").prop("checked", true);
        }

        if( $("#cat_3").is(":checked") ){
            $('#check_span_3').removeClass('glyphicon-unchecked');
            $('#check_span_3').addClass('glyphicon-check');
            $("#div_bg_3").css({backgroundColor: "#5E5E62"});
            $("#check_span_3").css({color: "#FFFFFF"});
            $("#label_cat_3").css({color: "#FFFFFF"});
        }else{
            $('#check_span_3').removeClass('glyphicon-check');
            $('#check_span_3').addClass('glyphicon-unchecked');
            $("#div_bg_3").css({backgroundColor: "#FFFFFF"});
            $("#check_span_3").css({color: "#171717"});
            $("#label_cat_3").css({color: "#171717"});
        } 
    });

    // cat_4
    $("#div_bg_4").on("click", function() {
        if( $("#cat_4").is(":checked") ){
            $("#cat_4").prop("checked", false);
        }else{
            $("#cat_4").prop("checked", true);
        }

        if( $("#cat_4").is(":checked") ){
            $('#check_span_4').removeClass('glyphicon-unchecked');
            $('#check_span_4').addClass('glyphicon-check');
            $("#div_bg_4").css({backgroundColor: "#5E5E62"});
            $("#check_span_4").css({color: "#FFFFFF"});
            $("#label_cat_4").css({color: "#FFFFFF"});
        }else{
            $('#check_span_4').removeClass('glyphicon-check');
            $('#check_span_4').addClass('glyphicon-unchecked');
            $("#div_bg_4").css({backgroundColor: "#FFFFFF"});
            $("#check_span_4").css({color: "#171717"});
            $("#label_cat_4").css({color: "#171717"});
        }  
    });

    // cat_5
    $("#div_bg_5").on("click", function() {
        if( $("#cat_5").is(":checked") ){
            $("#cat_5").prop("checked", false);
        }else{
            $("#cat_5").prop("checked", true);
        }

        if( $("#cat_5").is(":checked") ){
            $('#check_span_5').removeClass('glyphicon-unchecked');
            $('#check_span_5').addClass('glyphicon-check');
            $("#div_bg_5").css({backgroundColor: "#5E5E62"});
            $("#check_span_5").css({color: "#FFFFFF"});
            $("#label_cat_5").css({color: "#FFFFFF"});
        }else{
            $('#check_span_5').removeClass('glyphicon-check');
            $('#check_span_5').addClass('glyphicon-unchecked');
            $("#div_bg_5").css({backgroundColor: "#FFFFFF"});
            $("#check_span_5").css({color: "#171717"});
            $("#label_cat_5").css({color: "#171717"});
        }  
    });

    // cat_6
    $("#div_bg_6").on("click", function() {
        if( $("#cat_6").is(":checked") ){
            $("#cat_6").prop("checked", false);
        }else{
            $("#cat_6").prop("checked", true);
        }

        if( $("#cat_6").is(":checked") ){
            $('#check_span_6').removeClass('glyphicon-unchecked');
            $('#check_span_6').addClass('glyphicon-check');
            $("#div_bg_6").css({backgroundColor: "#5E5E62"});
            $("#check_span_6").css({color: "#FFFFFF"});
            $("#label_cat_6").css({color: "#FFFFFF"});
        }else{
            $('#check_span_6').removeClass('glyphicon-check');
            $('#check_span_6').addClass('glyphicon-unchecked');
            $("#div_bg_6").css({backgroundColor: "#FFFFFF"});
            $("#check_span_6").css({color: "#171717"});
            $("#label_cat_6").css({color: "#171717"});
        }  
    });

    /* ************************************************************************************** */

});