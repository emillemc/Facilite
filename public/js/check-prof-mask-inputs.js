/* Necessita do plugin 'jquery.mask.min.js'*/

/* MOSTRAR/OCULTAR CAMPOS PROFISSIONAIS */
//Ao selecionar checkbox mostra e ativa os campos profissionais 
$("#is_prof").on("click", function() {
    // $("#formCpf").toggle();
     if( $("#is_prof").is(':checked') ){
        $("#cpf").prop("disabled", false); // <- = habilita input
        $("#tel").prop("disabled", false); // <- = habilita input
        $("#formCpf").show("fast");
        $("#formTel").show("linear");
        // $("#form_prof").prop("action", "/register-prof"); // <- Muda o action do form para cadastrar prof
    }else{
        $("#cpf").prop("disabled", true); // <- = desabilita input
        $("#tel").prop("disabled", true); // <- = desabilita input
        $("#formCpf").hide("fast");
        $("#formTel").hide("linear");
        // $("#form_prof").prop("action", "/register");
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