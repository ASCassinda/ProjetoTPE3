$(document).ready(function () {
    
    // VALIDAR FORMULARIO CADASTRAR CLIENTE
   $("#msgErroNome").hide();
            $("#msgErroSenha").hide();
            $("#msgErro").hide();
            $("#btnEntrarLogin").click(function () {
                var nome = $("#nome").val();
                var senha = $("#senha").val();
                if (nome == "") {
                    $("#msgErroNome").fadeIn("slow");
                    return false;
                }
                if (senha == "") {
                    $("#msgErroSenha").fadeIn("slow");
                    return false;
                }
                
            });
            
            
            
            $("#nome").keypress(function(){
                $("#msgErroNome").hide();
            });
         
          $("#senha").keypress(function(){
                $("#msgErroSenha").hide();
            });
            
            // VALIDAR FORMULARIO CADASTRAR CLIENTE
            
             $("#msgErroNome").hide();
            $("#msgErroSenha1").hide();
            $("#msgErroSenha2").hide();
            $("#msgErroEmail").hide();
            $("#msgErroLogin").hide();
            $("#msgErroTelemovel").hide();
            $("#msgErroEmail").hide();
            $("#msgErroHorario").hide();
            

            $("#btnCriarCliente").click(function () {
                var nome = $("#nome").val();
                var email = $("#email").val();
                var telemovel = $("#telemovel").val();
                var login = $("#login").val();
                var senha1 = $("#senha1").val();
                var senha2 = $("#senha2").val();
                var horario = $("#horario").val();


                if (nome == "") {
                    $("#msgErroNome").fadeIn("slow");
                    return false;
                }
                if (email == "" || email.indexOf('@') == -1 || email.indexOf('.') == -1) {
                    $("#msgErroEmail").fadeIn("slow");
                    return false;
                }

                if (telemovel == "" || telemovel.length <=8) {
                    $("#msgErroTelemovel").fadeIn("slow");
                    return false;
                }

                if (login == "") {
                    $("#msgErroLogin").fadeIn("slow");
                    return false;
                }

                if (senha1 == "" || senha1 != senha2) {
                    $("#msgErroSenha1").fadeIn("slow");
                    return false;
                }

                if (senha2 == "" || senha2 != senha1) {
                    $("#msgErroSenha2").fadeIn("slow");
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

            $("#senha1").keypress(function () {
                $("#msgErroSenha1").hide();
            });

            $("#login").keypress(function () {
                $("#msgErroLogin").hide();
            });

            $("#senha2").keypress(function () {
                $("#msgErroSenha2").hide();
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



            //para o caso do telemovel
          
    
    
    //para os servicos fica:
    
        
         
});