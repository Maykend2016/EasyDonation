<?php
/**
 * Created by PhpStorm.
 * User: mayke
 * Date: 06/03/2017
 * Time: 12:42
 */
?>


<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">

    <title>
        &Epsilon;&alpha;s&upsih; Do&eta;&alpha;tio&eta; | Brasil
    </title>

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
                                <button class="btn btn-info btn" type="button"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                </div><!-- /fim de pesquisa -->

                <br>




                <div class="panel panel-default"><!--borda do menu vertical-->

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active al text-center"><a>Categorias</a></li>
                        <li><a href="roupas-calcados.php"><img src="easydonation/img/icons/camisa.png">  Roupa Masculina</a></li>
                        <li><a href="#"><i class="#"></i>Categoria</a></li>
                        <li><a href="#"><i class="#"></i>Categoria</a></li>
                        <li><a href="#"><i class="#"></i>Categoria</a></li>
                        <li><a href="#"><i class="#"></i>Categoria</a></li>
                        <li><a href="#"><i class="#"></i>Categoria</a></li>
                        <li><a href="#"><i class="#"></i>Categoria</a></li>
                        <li><a href="#"><i class="#"></i>Categoria</a></li>
                        <li><a href="#"><i class="#"></i>Categoria</a></li>
                    </ul>
                </div>
            </div>
            
            <?php
                    include './_inst/Acesso_BD/conection_data_base.php';
                    $id = $_GET['id'];
                    //SELECT LISTAGEM DOACAO
                    //Imagem  ID Inst CI Categoria Sub-Categoria Descriçãp Quantidade Data
                    $sql_list = "SELECT * FROM easy_doacao WHERE id = " . $id . "";
                    $execute = $conn->query($sql_list) or die($conn->error);
                    $produto = $execute->fetch(PDO::FETCH_ASSOC);
                    $num = $execute->rowCount();

                     //INST
                    $id_inst = $produto['inst_CI'];
                    $sql2 = "SELECT inst_email, inst_nome FROM easy_instituicao WHERE  inst_CI='$id_inst'";
                    $pqs2 = $conn->query($sql2);
                    $pqs2->execute();
                    while ($roow = $pqs2->fetch()) {
                        $nome_inst = $roow['inst_nome'];
                        $email_inst = $roow['inst_email'];
                    }
                    
                    if ($num > 0) {
                        
                        
                    
                    $id_cat = $produto['id_cat'];
                    $sql = "SELECT titulo_cat FROM easy_categoria WHERE id = $id_cat";
                    $pqs = $conn->query($sql);
                    $pqs->execute();
                    while ($roow = $pqs->fetch()) {
                        $nome_cat = $roow['titulo_cat'];
                    }
                    
                   
                    
                    //NOME SUBCATEGORIA
                    $id_sub = $produto['id_subcat'];
                    $sql = "SELECT titulo_sub FROM easy_subcategoria WHERE id = $id_sub";
                    $pqs = $conn->query($sql);
                    $pqs->execute();
                    while ($rooow = $pqs->fetch()) {
                        $nome_sub = $rooow['titulo_sub'];
                    }
                        do {
                            $d_get = $produto['descricao'];

                            $i_get = "./_doacao/crud/fotos/" . $produto['img_padrao'];


                            echo '
                                <div class="col-md-9 ">     <!-- <div class="col-md-9 well">-->

                <div class="row">

                    <div class="col-md-7">  <!--col-md-8-->
                        <img class="img-responsive" src="'.$i_get.'" alt="">
                    </div>

                    <div class="col-md-3">
                        <h2>'.$nome_inst.'</h2>
                        <h3>'.$produto['descricao'].'</h3>
                        <p>'.$produto['data'].'</p>
                        <h4>'.$nome_cat.'</h4>
                        <h5>'.$nome_sub.'</h5>    
                        <ul>








                            <li>'.$email_inst.'</li>
                           
                        </ul>
                    </div>

                </div>


            </div>';
                        } while ($produto = $execute->fetch(PDO::FETCH_ASSOC));
                    }
                    // include '../view/';
                    ?>
            
        </div>
    </div>







    <div class="container">

        <!-- Portfolio Item Heading
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Doação
                    <small>Descrição</small>
                </h1>
            </div>
        </div>
         /.row -->



        <p></p>
        <!--
        Nome da doação
        Quantidade de itens
        Categoria da doação
        Data da Postagem
        -->



        <hr>



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
                    <li><a href="contato.php">Contato</a></li>
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
                <li><a href="#"><img src="easydonation/img/icons/Facebook.png"> Facebook</a></li>
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



<!-- jQuery -->
<script src="easydonation/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="easydonation/js/bootstrap.min.js"></script>

</body>

</html>
