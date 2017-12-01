$(document).ready(function(){
    
    $("#categoria").on("change", function () {
        
            var categoria = $("#categoria").val();
           
            $.ajax({
                url: 'chamadasAjaxProfissional.php',
                type: 'POST',
                data: {idCat: categoria},
                beforeSend: function () {
                    $('#servico').html("Carregando");
                },
                success: function (data) {
                    data = $.parseJSON(data);
                    var optHTML;
                    for (i = 0; i < data.length; i++) {
                        optHTML = '<option value="' + data[i].idServico + '">' + data[i].nomeServico + '</option>';
                        $("#servico").append(optHTML);
                        
                    }
                }
            });
        });
        
        });
     
