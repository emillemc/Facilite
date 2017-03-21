/* Necessita do plugin 'jquery.mask.min.js'*/

/* MOSTRAR/OCULTAR CAMPOS PROFISSIONAIS */
//Ao selecionar checkbox mostra e ativa os campos profissionais 
$("#role").on("click", function() {
    // $("#formCpf").toggle();
     if( $("#role").is(':checked') ){
        $("#cpf").prop("disabled", false); // <- = habilita input
        $("#tel").prop("disabled", false); // <- = habilita input
        $("#formCpf").show("fast");
        $("#formTel").show("linear");
    }else{
        $("#cpf").prop("disabled", true); // <- = desabilita input
        $("#tel").prop("disabled", true); // <- = desabilita input
        $("#formCpf").hide("fast");
        $("#formTel").hide("linear");
    }
});

/* CPF MASK */
$("#cpf").on("focus", function(){
    $("#cpf").mask("999.999.999-99");
});

/* TEL MASK */
$("#tel").on("focus", function(){
    $("#tel").mask("(99) 99999-9999");
});

/**
 * Ao carregar a página
 */
$( window ).on( "load", function() {
    // Se checkbox "Sou Profissional" estiver marcado exibe e habilita os campos profissionais
    if( $("#role").is(':checked') ){
        $("#cpf").prop("disabled", false); // <- = habilita input
        $("#tel").prop("disabled", false); // <- = habilita input
        $("#formCpf").show("fast");
        $("#formTel").show("linear");
    }else{
        $("#cpf").prop("disabled", true); // <- = desabilita input
        $("#tel").prop("disabled", true); // <- = desabilita input
        $("#formCpf").hide("fast");
        $("#formTel").hide("linear");
    }
});