<!DOCTYPE html>
<html lang="pt-br">
    <head>
        
        <title>AngoHairs</title>
        <meta charset="utf-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
        <script type="text/javascript" src="view/content/css/jquery.js"></script>
        <link href="view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
       <link href="view/content/css/grid.css" rel="stylesheet" type="text/css"/>
        <link href="view/content/css/reset.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="view/content/css/font-awesome.min.css">
        <link rel="stylesheet" href="view/content/css/animate.css">
        <link rel="stylesheet" href="view/content/js/jquery-ui-1.8.16.custom.css">
        <link href="view/content/css/font-awesome-animation.css" rel="stylesheet" />
        <link href="view/content/css/estilo_1.css" rel="stylesheet" />
        <link href="view/content/image/icone.png" rel="icon" />

    </head>
    <body >
        <!--SESSAO DE NAVEGAÇÃO - MENU -->

        <section id="header" class="navbar navbar-fixed-top custom-navbar">
            <nav class="navbar navbar-default nav-header" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#but1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    <a class="navbar-brand" href="#" >AngoHairs</a>
                </div>

                <div class="collapse navbar-collapse" id="but1">
                    <ul class="nav navbar-nav ">
                        <li><a href="#inicio" class="smoothScroll menu">Home</a></li>
                        <li><a href="#servicos"  class="smoothScroll menu">Serviços</a></li>
                        <li><a href=#solicitarMarcacao"  class="smoothScroll menu">Solicitar Marcação</a></li>
                        <li><a href="#price-sec"  class="smoothScroll menu">Sobre</a></li>
                        <li><a href="#contactos"  class="smoothScroll menu">Contactos</a></li>

                    </ul>
                    <div class="collapse navbar-collapse" id="menuSecundario">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="Entrar_Login"><a href="login.php" class="menu_e"></a></li>
                            <li  class="Entrar_Login"> <a href="#myModal" class="menu_e" data-toggle="modal">Logar  <i class="fa fa-sign-out">&nbsp;</i></a></li>

                            <li class="Entrar_Cadastro"><a href="view/cliente/cadastroUsuario.php" class="menu_e">Registar  <i class="fa fa-user">&nbsp;</i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <!--FIM SESSÃO DE  NAVEGAÇÃO - MENU -->   



        <!--SESSÃO DE INÍCIO -->
        <section id="inicio"   class="wow ">
            <div class="container_inicio">
                <div class="pattern height-resize">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center">SALÃO DE BELEZA / BEAUTY SALON / SALON DE BEAUTÉ</h3>
                            <i class="fa  fa-2x faa-horizontal animated"><h1 class="text-center">AngoHairs</h1></i>
                            <hr/>
                            <a href="#servicos" class="smoothScroll btn btn-danger">O que fazemos</a>
                            <a href="#contactos" class="smoothScroll btn btn-dangerr">Fale Connosco</a>
                        </div>
                    </div>
                </div>
                <div id="content">
                    <div id="content-box">	
                        <div class="slider">
                            <div class="slider_item">
                                <img src="view/content/image/t8.jpg">
                            </div>
                            <div class="slider_item">
                                <img src="view/content/image/st11.jpg">
                            </div>
                            
                            <div class="slider_item">
                                <img src="view/content/image/t2.jpg">
                            </div>
                            
                            <div class="slider_item">
                                <img src="view/content/image/t9.jpg">
                            </div>
                            
                            

                        </div>
                    </div>	
                </div>
            </div>

        </section>
        <!--FIM SESSÃO DE INÍCIO -->


        <!-- SESSÃO DE SERVIÇOS -->	
        <section id="servicos">
            <div id="container">
                <div class="main_servico height-resize">
                    <div class="container_12">
                        <div class="wrapper">
                            <article class="col-md-4">
                                <figure class="img-rounded img-indent "><img src="view/content/image/k.jpg" alt="" class="feature-image"> </figure>
                                <h5 class="feature-title">CABELEIREIRO</h5>

                                <ul class="list">
                                    <li class="cor"><i class="fa fa-calendar"></i><a href="#fundo_cor">Alisamento/Relaxamento</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Coloração/Tonalização</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Descoloração</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Hidratação</a></li>

                                </ul>

                            </article>

                            <article class="col-md-4">
                                <figure class="img-rounded img-indent"><img src="view/content/image/sombra2.jpg" alt="" class="feature-image"> </figure>
                                <h5 class="feature-title"> MAQUILHAGEM/SOBRANCELHAS</h5>

                                <ul class="list">
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Makeup</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Micropigmentação hiperrealista</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Micropigmentação fio a fio em 3D</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Alisamento de sobrancelhas</a></li>
                                </ul>

                            </article>


                            <article class="col-md-4">
                                <figure class="img-rounded img-indent"><img src="view/content/image/homem.jpg" alt=""> </figure>
                                <h5>SERVIÇOS PARA HOMENS</h5>
                                <ul class="list">
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Barba</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Cabelo</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Limpeza de pele</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Manicure e Pedicure </a></li>
                                </ul>

                            </article> 
                        </div>  
                        <div class="wrapper">
                            <article class="col-md-4">
                                <figure class="img-rounded img-indent"><img src="view/content/image/sombra.jpg" alt=""> </figure>
                                <h5>ESTÉTICA FACIAL E CORPORAL</h5>
                                <ul class="list">
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Massagem Corporal</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Tratamento Estético Corporal/Facial </a></li>
                                </ul>

                            </article>

                            <article class="col-md-4">

                                <figure class="img-rounded img-indent"><img src="view/content/image/page1-img1.jpg" alt=""> </figure>
                                <h5>DEPILAÇÃO</h5>
                                <ul class="list">
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Depilação egípcia</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Depilação com cera(por área capilar)</a></li>
                                </ul>

                            </article>

                            <article class="col-md-4">
                                <figure class="img-rounded img-indent"><img src="view/content/image/page1-img2.jpg" alt=""> </figure>
                                <h5>MANICURE/PEDICURE</h5>

                                <ul class="list">

                                    <li><i class="fa fa-calendar"></i><a href="more.html">Embelezamento das Mãos/Pés</a></li>
                                    <li><i class="fa fa-calendar"></i><a href="more.html">Alongamento de Unhas- Gel/Fibra</a></li>
                                </ul>

                            </article>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
        </section>
        <!-- FIM SESSÃO DE SERVIÇOS -->		



        <!-- INÍCIO SESSÃO DESCRIÇÃO SERVIÇOS -->	
        <section id="descricao_servico">
            <div class="page">
                <div class="container">	
                    <div class="row">
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="view/content/image/icon-1.png" class="feature-image">
                                <h3 class="feature-title">TINTURA</h3>
                                <p>Quer se loira, morena ou ruiva? Podemos ajudá-lo a encontrar
                                    a cor que melhor apresenta seus olhos, complementa o seu tom de pelee reforça
                                    suas características faciais.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="view/content/image/icon-2.png" class="feature-image">
                                <h3 class="feature-title">CABELO</h3>
                                <p>Poucas coisas refletem o estilo de uma mulher mais do que o seu cabelo.
                                    Cortes personalizados para destacar suas melhores características.
                                    Procedimentos de cortes, coloração para deixá-la linda.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="view/content/image/icon-3.png" class="feature-image">
                                <h3 class="feature-title">HOMENS</h3>
                                <p>Venha ficar charmoso com o seu melhor corte de cabelo.
                                    Cortes personalizados para destacar suas melhores características.
                                    Procedimentos de cortes, coloração para deixá-lo atraente. </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="view/content/image/icon-4.png" class="feature-image">
                                <h3 class="feature-title">MAQUILHAGEM</h3>
                                <p>A maquilhagem celebra e destaca a individualidade dentro de um novo contexto
                                    de expressão da beleza feminina. A maquilhagem  tornaas mais bonitase modernas.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="view/content/image/icon-5.png" class="feature-image">
                                <h3 class="feature-title">ESTÉTICA</h3>
                                <p> A estética da facial é a identidade das mulheres
                                    bonitas e modernas. Venha desfrutar dos nossos serviços
                                    deixando seu rosto lindo.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="view/content/image/icon-6.png" class="feature-image">
                                <h3 class="feature-title">MASSAGEM</h3>
                                <p>A massagem ajuda a relaxar não só o corpo, mas a mente. Venha desfrutar dos nossos serviços
                                    deixando seu corpo lindo.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="view/content/image/icon-7.png" class="feature-image">
                                <h3 class="feature-title">MANICURE</h3>
                                <p>A manicure não é apenas um tratamento para as unhas, mas também para as mãos.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="feature">
                                <img src="view/content/image/icon-8.png" class="feature-image">
                                <h3 class="feature-title">DEPILAÇÃO</h3>
                                <p>Desfrute de nossos serviços, e venha deixar seu corpo
                                    lindo e macio.</p>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </section>
        <!-- FIM SESSÃO DESCRIÇÃO SERVIÇOS  -->	


        <!-- INÍCIO SESSÃO SOBRE  -->	
        <section id="sobre">
            <div class="container_sec">
                <div class="main_sobre height-resize">
                    <div class="row text-center">
                        <div class="col-md-12 Letf-plant">

                            <div class="col-md-3">
                                <ul class="plan">
                                    <li class="plan-head c-b">SOBRE</li>
                                    <li><i class="fa fa-credit-card share-square-o fa-4x faa-vertical animated"></i></li>
                                    <li>AngoHair dispinibiliza tratamento de beleza para todas as pessoas
                                        Com uma equipe de especialistas qualificados e experiêntes, 
                                        o ambiente é extremamente acolhedor e hospitaleiro faz
                                        com que a experiência da mudança de  visual se torne ainda mais agradável.</li>

                                    <li class="bottom">
                                        <a href="#servicos" class="btn btn-danger">Read More</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <ul class="plan">

                                    <li class="plan-head c-a">SERVIÇOS</li>
                                    <li><i class="fa fa-desktop fa-4x faa-shake animated"></i></li>
                                    <li>O salão AngoHair oferece uma equipe formada por 
                                        especialistas com objectivo do proporcionar experiências
                                        inovadoras em cortes de cabelo, coloração, estética do 
                                        corpo entre outros.o salão é um dos lugares
                                        mais confiáveis na cidade para o tratamentos de beleza.</li>

                                    <li class="bottom">
                                        <a href="#servicos" class="btn btn-danger">Read More</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <ul class="plan">

                                    <li class="plan-head c-v">SOCIAL</li>
                                    <li><i class="fa fa-plus fa-4x faa-float animated"></i></li>
                                    <li>AngoHair é o lugar ideal para explorar e trazer para fora 
                                        a beleza que existe em você. Salão de excelência e referência 
                                        no requisito Beleza de homens e mulheres. Salão
                                        moderno e bem equipado com o que há de melhor e mais recente na indústria cosmética da cidade.</li>
                                    <li class="bottom">
                                        <a href="#servicos" class="btn btn-danger">Read More</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FIM INÍCIO SESSÃO SOBRE  -->	






        <!--  INÍCIO SESSÃO CONTACTO  -->
        <section id="contactos">
            <div class="main_c">
                <div class="main_contact height-resize">
                    <div class="container_12">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center">
                                    <i class="fa fa-map-marker"></i> Angola, Luanda<br />
                                    <i class="fa fa-envelope"></i> Email: JanethNascimento@gmail.com | AntonioCassinda@hotmail.com | SantosRusso@gmail.com<br />
                                    <i class="fa fa-phone"></i> Phone: 933715085| 949551230 | 925567401
                                </p>
                            </div>
                        </div>
                        <form role="form" action="#" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="name" class="form-control fa fa-user" id="contact-name" placeholder="Name">
                                </div>
                                `                                   </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                    <textarea name="message" class="form-control" id="contact-message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-6 col-xs-offset-6">
                                    <button type="submit" class="form-control">Enviar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <ul class="nav nav-pills social">
                                    <li><a href="#" class="shadow-top-down social-facebook"><i class="fa fa-facebook-official"></i></a></li>
                                    <li><a href="#" class="shadow-top-down social-twitter"><i class="fa fa-twitter-square"></i></a></li>
                                    <li><a href="#" class="shadow-top-down social-youtube"><i class="fa fa-youtube-square"></i></a></li>
                                    <li><a href="#" class="shadow-top-down social-instagram"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  FIM SESSÃO CONTACTO  -->	
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="text-center">Bem vindo ao AngoHairs</h3>
                        <div id="msgErro">Senha errada</div>
                    </div>
                    <div class="modal-body">
                        
                        <form class="form-group-lg" id="validar" method="post" action="controller/controllerLogin.php">

                            <ul class="list-unstyled">
                                <li class="form-group">
                                    <input type="text" name="nomeUsuario" placeholder="Nome do usuário" id="nome" class="form-control">
                                    <div id="msgErroNome">Preencha o campo nome!!!</div>
                                </li> 
                                <li class="form-group">
                                    <input type="password" name="senha" placeholder="Senha" id="senha" class="form-control">
                                    <div id="msgErroSenha">Preencha o campo senha !!!</div>
                                </li> 
                                <li>
                                    <p class="text-right"><a href="#contactos">Esqueceu-se da senha?</a></p>
                                </li>
                                <li class="form-group">
                                    <input type="submit" name="entrar" value="Entrar" id="btnEntrarLogin" class="btn btn-primary btn-block"/>
                                </li>
                            </ul>
                            <p class="text-center">Não possui uma conta?&nbsp;<a href="view/cliente/cadastroUsuario.php"><strong>Regista-te</strong></a></p>

                        </form>
                    </div>

                </div>
            </div>
        </div>	
        <!--  INÍCIO SESSÃO FOOTER  -->	 
        <div class="block">
            <footer>
                <div class="main aligncenter">
                    <div class="privacy"><strong>Design by: Janeth Nascimento | <a href="#team" class="Team_f">Team</a> &copy 2017 |</div>
                </div>
            </footer>
        </div>
        <!--  FIM SESSÃO FOOTER  -->	
  <script src="view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
       <script type="text/javascript" src="view/content/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="view/content/js/scriptValidar.js"></script>
        <script type="text/javascript" src="view/content/js/bgstretcher.js"></script>
        <script type="text/javascript" src="view/content/js/wow.js"></script>
        <script type="text/javascript" src="view/content/js/functionsNova.js"></script>
        <script type="text/javascript" src="view/content/js/functions.js"></script>
        <script type="text/javascript" src="view/content/js/custom.js"></script>
        <script type="text/javascript" src="view/content/js/cycle.js"></script>
        <script type="text/javascript" src="view/content/js/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="view/content/js/jquery.cycle.all.js.download"></script>
        <script type="text/javascript" src="view/content/js/fundo_tela.js"></script>


    </body>
</html>
