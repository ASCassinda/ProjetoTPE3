$(document).ready(function () {
    $("#msgErroCategoria").hide();
    $("#msgErroNome").hide();
    $("#msgErroTelemovel").hide();
    $("#msgErroEmail").hide();
    $("#msgErroHorario").hide();
    $("#msgErroServico").hide();
    


    $("#btnCriarCliente").click(function () {
        var categoria = $("#categoria").val();
        var servico = $("#servico").val();
        var nome = $("#nome").val();
        var email = $("#email").val();
        var telemovel = $("#telemovel").val();
        var horario = $("#horario").val();


        
        if (nome === "") {
            $("#msgErroNome").fadeIn("slow");
            return false;
        }
        
        if (categoria === "") {
            $("#msgErroCategoria").fadeIn("slow");
            return false;
        }


        if (servico == false) {

            $("#msgErroServico").fadeIn("slow");
            return false;
        }

        if (email === "" || email.indexOf('@') === -1 || email.indexOf('.') === -1) {
            $("#msgErroEmail").fadeIn("slow");
            return false;
        }

        if (telemovel === "" || telemovel.length <= 8) {
            $("#msgErroTelemovel").fadeIn("slow");
            return false;
        }

        if (horario == false) {
            $("#msgErroHorario").fadeIn("slow");
            return false;
        }


    });


    $("#nome").keypress(function () {
        $("#msgErroNome").hide();
    });
    
    $("#categoria").on("change", function () {
        $("#msgErroCategoria").hide();
    });
    
    $("#telemovel").keypress(function () {
        $("#msgErroTelemovel").hide();

    });

    $("#email").keypress(function () {
        $("#msgErroEmail").hide();
    });

    $("#horario").on("change", function () {
        $("#msgErroHorario").hide();
    });

    $("#servico").on("change", function () {
        $("#msgErroServico").hide();
    });

});
   