$(document).ready(function(){
    
    $("#btnAdicionar").click(function(){
                  var data= $("#data").val();
                   var idServico=$("#servico").val();
                   var idCategoria=$("#categoria").val();
                   var idProfissional=$("#profissional").val();
                   var horario=$("#horario").val();
                   
                     if (data === "") {
                            $("#msgErroData").fadeIn("slow");
                            return false;
                        }
                        if (idCategoria === "") {
                            $("#msgErroCategoria").fadeIn("slow");
                            return false;
                        }
                        if (idServico == "" || idServico=="Selecione O servico") {
                            $("#msgErroServico").fadeIn("slow");
                            return false;
                        }

                        if (idProfissional == "" || idProfissional=="Selecione o Profissional") {
                            $("#msgErroProfissional").fadeIn("slow");
                            return false;
                        }

                        if (horario == "" || horario=="Selecione o horario") {
                            $("#msgErroHorario").fadeIn("slow");
                            return false;
                        }
                
                   var servico = $("#servico option[value='"+idServico+"']").text();
                   var categoria = $("#categoria option[value='"+idCategoria+"']").text();
                   var profissional = $("#profissional option[value='"+idProfissional+"']").text();
               
                   var tabela='<tr id="dados">\n\
                        <td><select class="selecionarServico form-control" disabled><option value="'+idServico+'">'+servico+'</option><select></td>\n\
                        <td><select class="selecionarCategoria form-control" disabled><option value="'+idCategoria+'">'+categoria+'</option><select></td>\n\
                        <td><select class="selecionarProfissional form-control" disabled><option value="'+idProfissional+'">'+profissional+'</option><select></td>\n\
                        <td><input  class="selecionarData form-control" type="text" value="'+data+'" disabled></td>\n\
                        <td><input  class="selecionarHorario form-control" type="text" value="'+horario+'" disabled></td>\n\
                        <td><input class="btn btn-danger remove_pedidos" type="submit" name="btnRemover" value="Remover" ></td>\n\
                            </tr>';
                             
                   $("#tabela").append(tabela);
                   
                   $(document).on('click','.remove_pedidos', function(){
                   $(this).closest('tr').remove();
                    });
                   
                   document.getElementById('data').value="";
                   document.getElementById('servico').value="";
                   document.getElementById('categoria').value="";
                   document.getElementById('profissional').value="";
                   document.getElementById('horario').value="";
                   return false;
                });
});