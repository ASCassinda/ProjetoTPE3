$(document).ready(function(){
    
    $('#btnSalvar').on("click", function(e){
        
            e.preventDefault();
            
                  var categoria='';
                  $('.selecionarCategoria').each(function(){
                   var cat=$(this).val();
                   categoria=categoria + cat + ",";    
                });
                
                   var servico='';
                  $(".selecionarServico").each(function(){
                   var servicos=$(this).val();
                   servico=servico + servicos + ",";    
                });
                
                 var profissional='';
                  $(".selecionarProfissional").each(function(){
                   var profissionais=$(this).val();
                   profissional=profissional + profissionais + ",";    
                });
                
                var dataMarcacao='';
                  $(".selecionarData").each(function(){
                   var data=$(this).val();
                   dataMarcacao=dataMarcacao + data + ",";    
                });
                
                var horario='';
                  $(".selecionarHorario").each(function(){
                   var hora=$(this).val();
                   horario=horario + hora + ",";    
                });
                
                //alert("categoria="+categoria+" servico="+servico+" profissional="+profissional+" horario="+horario+" data="+dataMarcacao);
                
               
                $.ajax({
                    url: 'requisicaoAjaxCadastraDadosMultiplos.php?tipo=marcar',
                    type:'post',
                    async: true,  
                    data:{mCategoria:categoria,mServico:servico,mProfissional:profissional,mHorario:horario,mData:dataMarcacao},
                    success: function(res){
                    console.log(res);
                   // alert('Inserido com sucesso');
                    
   
                   for (i = 0; i < res.length; i++) {
                   $(".remove_pedidos").closest('tr').remove();
                  }
                    
                      } ,
                        error: function(er){
                            
                           console.log(er); 
                        }                
                });
                });
});