            $(document).ready(function () {

                    $("#msgErroCategoria").hide();
                    $("#msgErroHorario").hide();
                    $("#msgErroServico").hide();
                    $("#msgErroData").hide();
                    $("#msgErroProfissional").hide();

                    $("#btnConfirmarMarcacao").click(function () {
                        var categoria = $("#categoria").val();
                        var profissional = $("#profissional").val();
                        var servico = $("#servico").val();
                        var horario = $("#horario").val();
                        var data = $("#data").val();

                        if (data == "") {
                            $("#msgErroData").fadeIn("slow");
                            return false;
                        }

                        if (categoria == "") {
                            $("#msgErroCategoria").fadeIn("slow");
                            return false;
                        }
                        if (servico == "" || servico=="Selecione O servico") {
                            $("#msgErroServico").fadeIn("slow");
                            return false;
                        }

                        if (profissional == "" || profissional=="Selecione o Profissional") {
                            $("#msgErroProfissional").fadeIn("slow");
                            return false;
                        }

                        if (horario == "" || horario=="Selecione o horario") {
                            $("#msgErroHorario").fadeIn("slow");
                            return false;
                        }

                    });


                    $("#data").on("change", function () {
                        $("#msgErroData").hide();
                    });

                    $("#categoria").on("change", function () {
                        $("#msgErroCategoria").hide();
                    });
                    $("#servico").on("change", function () {
                        $("#msgErroServico").hide();
                    });
                    $("#profissional").on("change", function () {
                        $("#msgErroProfissional").hide();
                    });
                    $("#horario").on("change", function () {
                        $("#msgErroHorario").hide();
                    });
                    
                    //Botao Adicionar Marcacao
                      $("#btnAdicionar").click(function () {
                          
                         
                        var categoria = $("#categoria").val();
                        var profissional = $("#profissional").val();
                        var servico = $("#servico").val();
                        var horario = $("#horario").val();
                        var data = $("#data").val();

                        if (data == "") {
                            $("#msgErroData").fadeIn("slow");
                            return false;
                        }

                        if (categoria == "") {
                            $("#msgErroCategoria").fadeIn("slow");
                            return false;
                        }
                        if (servico == "") {
                            $("#msgErroServico").fadeIn("slow");
                            return false;
                        }

                        if (profissional == "") {
                            $("#msgErroProfissional").fadeIn("slow");
                            return false;
                        }

                        if (horario == "") {
                            $("#msgErroHorario").fadeIn("slow");
                            return false;
                        }

                    });


                    $("#data").on("change", function () {
                        $("#msgErroData").hide();
                    });

                    $("#categoria").on("change", function () {
                        $("#msgErroCategoria").hide();
                    });
                    $("#servico").on("change", function () {
                        $("#msgErroServico").hide();
                    });
                    $("#profissional").on("change", function () {
                        $("#msgErroProfissional").hide();
                    });
                    $("#horario").on("change", function () {
                        $("#msgErroHorario").hide();
                    });
                    
                    
                   
                    

                   
                });
   