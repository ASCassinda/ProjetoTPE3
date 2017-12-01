$(document).ready(function(){
    //Se clicar na combo  vai acontecer;
  $("#categoria").on("change", function (e) {
        //crisr ums variavel
                        

            var categoria = $("#categoria").val();
            e.preventDefault();
            //trecho de codigo do ajaax
            $.ajax({
                url: 'chamadasAjax.php', //caminho do usuario que ele vai chamar
                type: 'POST', //tipo
                data: {idCat: categoria},
                beforeSend: function () {

                    $('#servico').html("Carregando");
                },
                success: function (data) {
                    data = $.parseJSON(data);

                   // $("#servico option").remove();// remove todos os valores do servico e se nao tiver no caso esta vazio
                    var optHTML;
                    
                   optHTML = '<option>Selecione O servico</option>';
                        $("#servico").append(optHTML);
                    for (i = 0; i < data.length; i++) {
                    
                        optHTML = '<option value="' + data[i].idServico + '">' + data[i].nomeServico + '</option>';
                        $("#servico").append(optHTML);
                        
                    }
                }
            });
        });


        $("#servico").on("change", function (e) {
            var servico = $("#servico").val();
            
            e.preventDefault();
            $.ajax({
                url: 'chamadasAjax.php',
                type: 'POST',
                data: {idServico: servico},
                beforeSend: function () {
                    $('#profissional').html("Carregando");
                },
                success: function (data) {
                    data = $.parseJSON(data);
                    

                   // $("#profissional option").remove();
                    var optHTML;
                    
                    optHTML = '<option>Selecione o Profissional</option>';
                        $("#profissional").append(optHTML);
                    for (i = 0; i < data.length; i++) {                     
                        optHTML = '<option value="' + data[i].idProfissional + '">' + data[i].nomeProfissional + '</option>';
                       
                        $("#profissional").append(optHTML);
                    }
                }
            });
        });
        
        
        $("#profissional").on("change", function (e) {
            var profissional = $("#profissional").val();
            
            e.preventDefault();
            $.ajax({
                url: 'chamadasAjax.php',
                type: 'POST',
                data: {idProfissional: profissional},
                beforeSend: function () {
                    $('#horario').html("Carregando");
                },
                success: function (data) {
                    data = $.parseJSON(data);
                    
                   // $("#horario option").remove();
                   
                    var optHTML;
                    optHTML = '<option>Selecione o horario</option>';
                        $("#horario").append(optHTML);
                    for (i = 0; i < data.length; i++) {                     
                        optHTML = '<option value="' + data[i].horario + '">' + data[i].horario + '</option>';
                        $("#horario").append(optHTML);
                    }
                }



            });
        });
        
  
    
         
});