<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/Classes/Usuario.php';
require_once '../../model/DAO/UsuarioDAO.php';
require_once '../../model/DAO/MarcacaoDAO.php';
$marcacaoDAO = new MarcacaoDAO();
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administrativo</title>
        <meta charset='utf-8' />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link href='../content/css/fullcalendar.min.css' rel='stylesheet' />
        <link rel='stylesheet' href='../content/css/estiloAgendamento.css' />
        <link href='../content/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <link href="../../view/content/image/icone.png" rel="icon" />

    </head>
    <body>

        <div id='calendar'></div>
        
        <script src='../content/js/moment.min.js'></script>
        <script src='../content/js/jquery.min.js'></script>
        <script src='../content/js/fullcalendar.min.js'></script>
        <script src='../content/js/locale/pt-br.js'></script>
        <script>
            $(document).ready(function () {
                $('#calendar').fullCalendar({
                    //cabecalho
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: Date(),
                    navLinks: true,
                    editable: true,
                    eventLimit: true,
                    events: [

<?php
foreach ($marcacaoDAO->visualizarMarcacoesConfirmadas() as $dados) {
    ?>
                            {
                                
                                id: '<?php echo $dados['idMarcacao']; ?>',
                                title: '<?php echo $dados['nomeUtilizador'].'-'.$dados['horario'].'-'.$dados['nomeServico'] ; ?>',
                                start: '<?php echo $dados['dataMarcacao']; ?>',
                                url: 'visualizarDadosAgenda.php?idMarcacao=<?php echo $dados['idMarcacao']; ?>',
                                
                            },
<?php }; ?>

                    ]
                });
            });
        </script>
    </body>
</html>
