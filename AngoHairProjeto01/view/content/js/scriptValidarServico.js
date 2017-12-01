            $(document).ready(function () {
                        
                        
           $("#msgErroNome").hide();
            $("#msgErroIdServico").hide();
            $("#msgErroPreco").hide();
            
            $("#btnCriarServico").click(function () {
                var nomeServico = $("#nomeServico").val();
                var idServico = $("#idServico").val();
                var preco = $("#preco").val();

                if (nomeServico === "") {
                    $("#msgErroNome").fadeIn("slow");
                    return false;
                }
                
                if (idServico === "") {
                    $("#msgErroIdServico").fadeIn("slow");
                    return false;
                }
                
                 if (preco === "") {
                    $("#msgErroPreco").fadeIn("slow");
                    return false;
                }
                
            });

            $("#nomeServico").keypress(function () {
                $("#msgErroNome").hide();
            });

            $("#idServico").keypress(function () {
                $("#msgErroIdServico").hide();
            });
            $("#preco").keypress(function () {
                $("#msgErroPreco").hide();
            });  
                



             $("#btnAlterarServico").click(function () {
                var nomeServico = $("#nomeServico").val();
                var idServico = $("#idServico").val();
                var preco = $("#preco").val();

                if (nomeServico === "") {
                    $("#msgErroNome").fadeIn("slow");
                    return false;
                }
                
                if (idServico === "") {
                    $("#msgErroIdServico").fadeIn("slow");
                    return false;
                }
                 if (preco === "" ) {
                    $("#msgErroPreco").fadeIn("slow");
                    return false;
                }
                
            });

            $("#nomeServico").keypress(function () {
                $("#msgErroNome").hide();
            });

            $("#idServico").keypress(function () {
                $("#msgErroIdServico").hide();
            });
            $("#preco").keypress(function () {
                $("#msgErroPreco").hide();
            
        });
   
   });
