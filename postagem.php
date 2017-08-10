
<!--

modal page
Full Width Tabs

icones
https://icons8.com/-->

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="utf-8">

        <title>
            Eventos
        </title>

        <!----postagem---->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="easydonation/css/post.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <!-------->

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="easydonation/img/br.png">

        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

        <link href="easydonation/css/navbar.css" rel="stylesheet">

        <link href="easydonation/css/footer.css" rel="stylesheet">

        <!-- Modern-business CSS-->
        <link href="easydonation/css/modern-business.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="easydonation/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>

    <body>

    <!--menu de navegação-->

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="degrader" href="index.php">&Epsilon;&alpha;s&upsih; Do&eta;&alpha;tio&eta;</a>
            </div>
            <div id="navbar" class=" navbar-collapse collapse" >
                <ul class="nav navbar-nav">
                    <li><a href="postagem.php">Eventos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.html">Instituição</a></li>
                    <li><a href="informacao/contato.html">Informações</a></li>
                </ul>
            </div>
        </div>
    </nav>


        <!--Corpo da página-->

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <ol class="breadcrumb ">
                        <li><a href="index.php">Início</a>
                        </li>
                        <li class="active">Doações</li>
                    </ol>
                </div>
            </div><!--(FIM)conteúdo horizontal----->


            <div class="container">
                <div class="row">
                    <div class="col-md-3">


                        <!--pesquisa por doações-->

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Instituições e doações">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn" type="button">Buscar</button>
                            </span>
                        </div><!-- /fim de pesquisa -->


                        <style>
                            .menuvertical .li{
                                background: #ffb160;
                                color: #122b40;
                            }
                        </style>

                        <br>
                        <div class="panel panel-default  "><!--borda do menu vertical-->

                            <ul class="nav nav-pills nav-stacked  menuvertical">

                                <li class="active al text-center"><a>Categorias</a></li>
                                <?php
                                include './_inst/Acesso_BD/conection_data_base.php';

                                $sql = "SELECT titulo_cat FROM easy_categoria";
                                $pqs = $conn->query($sql);
                                $pqs->execute();
                                while ($roow = $pqs->fetch()) {
                                    $nome_categoria = $roow['titulo_cat'];
                                    $menuscutlo = strtolower($nome_categoria);
                                    echo '<li><a href="' . $menuscutlo . '.php"><i class="#"></i>' . $nome_categoria . '</a></li>';
                                }
                                ?>

                            </ul>
                        </div>
                    </div>





                    <link  href="http://ironsummitmedia.github.io/startbootstrap-modern-business/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-6">
                                <?php
                                //TESTE
                                $itens_por_pagina = 5; // número de registros por página
                                //$pagina = intval($_GET['pagina']);
                                //Se o GET vir vazio ele atribui um valor, se não, ele pega o valor
                                if (empty($_GET['pagina'])) {
                                    $pagina = 0;
                                } else {
                                    $pagina = intval($_GET['pagina']);
                                }
                                /* @var $pagina type */

                                $item = $pagina * $itens_por_pagina;
                                //SELECT LISTAGEM DOACAO
                                //Imagem  ID Inst CI Categoria Sub-Categoria Descriçãp Quantidade Data
                                $sql_list = "SELECT * FROM easy_evento LIMIT " . $item . ", " . $itens_por_pagina . "";
                                $execute = $conn->query($sql_list) or die($conn->error);
                                $produto = $execute->fetch(PDO::FETCH_ASSOC);
                                $num = $execute->rowCount();

                                $num_total = $conn->query("SELECT * FROM easy_evento ")->rowCount();

                                $num_paginas = ceil($num_total / $itens_por_pagina);
                                if ($num > 0) {

                                    do {

                                        $inst_nome = "SELECT * FROM easy_instituicao WHERE inst_CI='" . $produto['CI'] . "'";
                                        $e = $conn->query($inst_nome);
                                        $e->execute();
                                        while ($roow = $e->fetch()) {
                                            $name_inst = $roow['inst_nome'];
                                        }


                                        echo'<div class="panel panel-default">
                            <div class="panel-body">
                                
                                <div class="pull-right"><br>
                                    <b><a href="https://www.google.com/">' . $name_inst . '</a></b>
                                </div><br><br><br>
                                <center>
                                    <h4>' . $produto['titulo'] . '</h4>
                                </center>
                                <p>' . $produto['descricao'] . '</p>

                                    <hr><br>
                                    <center>
                                        <img src="./_evento/crud/fotos/' . $produto['img'] . '" class="img-responsive">
                                    </center>        
                                    <hr>
                                <div class="pull-left">
                                    <a><b>' . $name_inst . '</b></a>  <b>' . $produto['data'] . '</b>
                                </div>

                                
                            </div>
                            

                        </div>';
                                    } while ($produto = $execute->fetch(PDO::FETCH_ASSOC));
                                }
                                ?>


                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li>
                                            <a href="instituicao_todas_doacoes.php?pagina=0" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                        for ($i = 0; $i < $num_paginas; $i++) {
                                            // echo $num_total; 
                                            // echo $total_reg;
                                            $estilo = "";
                                            if ($pagina == $i) {
                                                $estilo = "class=\"active\"";
                                            }
                                            ?>
                                            <li <?php echo $estilo; ?>><a href="instituicao_todas_doacoes.php?pagina=<?php echo $i; ?>"><?php echo $i + 1; ?></a></li>
                                        <?php } ?>
                                        <li>
                                            <a href="instituicao_todas_doacoes.php?pagina=<?php echo $num_paginas - 1; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>


                            </div>
                        </div>
                    </div>






                </div><!--Final do conteúdo-->
            </div>
        </div>








        <!----------- Footer ------------>

        <footer class="footer-bs">
            <div class="row">
                <div class="col-md-3 footer-brand animated fadeInLeft">
                    <h2>&Epsilon;&alpha;s&upsih; Do&eta;&alpha;tio&eta;</h2>
                    <p>Descrição</p>
                    <p>© 2017, Todos os direitos reservados</p>
                </div>
                <div class="col-md-4 footer-nav animated fadeInUp">
                    <h4>Quem somos &#8212;</h4>
                    <div class="col-md-6">
                        <ul class="pages">
                            <li><a href="#">Easy Donation no Brasil</a></li>
                            <li><a href="#">História do Easy Donation</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list">
                            <li><a href="contato.html">Contato</a></li>
                            <li><a href="#">Ajude com o seu blog</a></li>
                            <li><a href="#">Divulgue</a></li>
                            <li><a href="#">Seja um colaborador</a></li>
                            <li><a href="#">Voluntários</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 footer-social animated fadeInDown">
                    <h4>Social</h4>
                    <ul>
                        <li><a href="https://www.facebook.com/Easy-Donation-356403174694499/"><img src="easydonation/img/icons/Facebook.png"> Facebook</a></li>
                        <li><a href="#"><img src="easydonation/img/icons/Twitter.png"> Twitter</a></li>
                        <li><a href="#"><img src="easydonation/img/icons/instagran.png"> Instagram</a></li>
                        <li><a href="#"><img src="easydonation/img/icons/YouTube.png"> Youtube</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-ns animated fadeInRight">
                    <h4>Receba notícias</h4>
                    <p>Infome seu email e receba nossas notícias.</p>
                    <p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                        </span>
                    </div><!-- /input-group -->
                    </p>
                </div>
            </div>
        </footer>

    </div>
    <script type="text/javascript">

    </script>


    <!-- jQuery -->
    <script src="easydonation/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="easydonation/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="easydonation/js/jqBootstrapValidation.js"></script>
    <script src="easydonation/js/contact_me.js"></script>

</body>

</html>