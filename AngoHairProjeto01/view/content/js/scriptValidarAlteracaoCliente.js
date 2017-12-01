$(document).ready(function () {
  
$("#msgErroNome").hide();
            $("#msgErroSenha1").hide();
            $("#msgErroEmail").hide();
            $("#msgErroLogin").hide();
            $("#msgErroTelemovel").hide();
            $("#msgErroEmail").hide();
            
            

            $("#btnCriarCliente").click(function () {
                var nome = $("#nome").val();
                var email = $("#email").val();
                var telemovel = $("#telemovel").val();
                var login = $("#login").val();
                var senha1 = $("#senha1").val();
                var senha2 = $("#senha2").val();


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

                if (senha1 == "" ) {
                    $("#msgErroSenha1").fadeIn("slow");
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

            $("#telemovel").keypress(function () {
                $("#msgErroTelemovel").hide();
               
            });

            $("#email").keypress(function () {
                $("#msgErroEmail").hide();
            });
            
            



            //para o caso do telemovel
            function numeros(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key);
                numero = "0123456789";
                especial = "8-37-38-46";
                tecEspecial = false;

                //este ciclo é para verificar o caso de apagar o teclado
                for (var i in especial) {
                    if (key == especial[i]) {
                        tecEspecial = true;
                    }
                }
                if (numero.indexOf(tecla) == -1 && !tecEspecial) {
                    return false;

                }
            }            
 
});