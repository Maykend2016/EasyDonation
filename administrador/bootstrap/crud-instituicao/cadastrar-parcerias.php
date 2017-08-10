<?php
/**
 * Created by PhpStorm.
 * User: mayke
 * Date: 22/03/2017
 * Time: 13:17
 */
//--------------------------------------------------------------
//protegendo a página
require_once('../class/db.class.php');
require_once('../class/valida.class.php');
require_once('../class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
require_once('../protege.php');
///////////////////

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);
//final da proteção a página
//------------------------------------------------------------










//crud generico começa aqui:

try{
    $con = new PDO ("mysql:host=localhost;dbname=easy_donation","root","");

    if(isset($_POST['done']))
    {


        /**
         * inst_email
        inst_id
        inst_nome
        inst_password
        inst_CL
        inst_descricao
        inst_categoria
        inst_rua
        inst_numero
        inst_estado
        inst_bairro
        inst_telefone
         */
        $id = $_POST['inst_id'];
        $nome = $_POST['inst_nome'];
        $email = $_POST['inst_email'];
        $pass = $_POST['inst_password'];
        $telefone = $_POST['inst_telefone'];
        $ci = $_POST['inst_CI'];
        //$descricao = $_POST['inst_descricao'];
        //$rua = $_POST['inst_rua'];
        // $numero = $_POST['inst_numero'];

        //$estado = $_POST['inst_estado'];
        //$cidade = $_POST['inst_cidade'];
        //$bairro = $_POST['inst_bairro'];




        $insert = $con->prepare("INSERT INTO easy_instituicao (inst_id,inst_nome,inst_email,inst_password,inst_telefone,inst_CI) VALUES(:inst_id,:inst_nome,:inst_email,:inst_password,:inst_telefone,:inst_CI)");
        $insert->bindParam(':inst_id',$id);
        $insert->bindParam(':inst_nome',$nome);
        $insert->bindParam(':inst_email',$email);
        $insert->bindParam(':inst_password',$pass);
        $insert->bindParam(':inst_telefone',$telefone);
        $insert->bindParam(':inst_CI',$ci);
        //$insert->bindParam(':inst_descricao',$descricao);
        //$insert->bindParam(':inst_rua',$rua);
        //$insert->bindParam(':inst_numero',$numero);

        //$insert->bindParam(':inst_estado',$estado);
        //$insert->bindParam(':inst_cidade',$cidade);
        //$insert->bindParam(':inst_bairro',$bairro);

        // $insert->bindParam(':user_level',$nivel);
        $insert->execute();


        echo "<h1 align='center'; style='color: #f8efc0';  >Instituição cadastrada com sucesso !</h1>";
    }
}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon_login_red.ico" type="image/x-icon"/>

    <title>&Epsilon;&alpha;s&upsih; Do&eta;&alpha;tio&eta; | Admin</title>


    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">&Epsilon;&alpha;s&upsih; Do&eta;&alpha;tio&eta; | Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $dados['nome'] ?>  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Admin: <?= $dados['nome'] ?></a>
                    </li>

                    <li>
                        <a href="#"><?= $dados['email'] ?></a>
                    </li>
                    <li>
                        <a href="../../../index.php"><i class="glyphicon glyphicon-globe"></i> Ir para o site</a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="../index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-user"></i> Usuário Administrativo <i class="glyphicon glyphicon-triangle-bottom"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="../crud_administrador/cadastro-user.php">Cadastrar Adminstrador</a>
                        </li>
                        <li>
                            <a href="../crud_administrador/gerenciar-user.php">Gerenciar Adminstrador</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="../crud-instituicao/gerenciar-parceria.php"><i class="glyphicon glyphicon-info-sign"></i> Ver Instituições</a>
                    <a href="../crud-instituicao/cadastrar-parcerias.php"><i class="glyphicon glyphicon-plus"></i> Cadastar mais Instituições</a>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#demo1"><i class="glyphicon glyphicon-record"></i> Categorias <i class="glyphicon glyphicon-triangle-bottom"></i></a>
                    <ul id="demo1" class="collapse">
                        <li>
                            <a href="../crud-categoria/cadastro-categoria.php">Adicionar Categoria</a>
                        </li>
                        <li>
                            <a href="../crud-categoria/gerenciar-categoria.php">Gerenciar Categoria</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-hand-right " > </i> Doações</a>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small> <i class="glyphicon glyphicon-education "></i> Cadastrar | Instituições de Caridade</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class=""></i> Preencha os campos <i class="glyphicon glyphicon-hand-down "></i>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <!--formulário com o método post-->

            <form class="form-horizontal" method="post">
                <fieldset>


                    <div class="form-group">
                        <label class="col-md-1 control-label" for="id">Id inst</label>
                        <div class="col-md-4">
                            <input id="id" type="number" name="inst_id" placeholder="Ex: 0,1,2..."  class="form-control input-md" required="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-1 control-label" for="texNome">Nome</label>
                        <div class="col-md-4">
                            <input id="texNome" type="text" name="inst_nome" placeholder="Nome da instituição"  class="form-control input-md" required="" >
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-1 control-label" for="email">E-mail</label>
                        <div class="col-md-4">
                            <input id="email" type="email" name="inst_email" placeholder="exemplo@email.com" class="form-control input-md" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label" for="senha">Senha</label>
                        <div class="col-md-4">
                            <input id="senha" type="password" name="inst_password" placeholder="Digite uma senha" class="form-control input-md" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label" for="telefone">Telefone</label>
                        <div class="col-md-4">
                            <input id="telefone" type="tel" name="inst_telefone" placeholder="ex: 08193121199" class="form-control input-md" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label" for="ci">CI</label>
                        <div class="col-md-4">
                            <input id="ci" type="text" name="inst_CI" placeholder="Nome da instituição"  class="form-control input-md" required="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                  <button type="submit" id="singlebutton" name="done" class="btn btn-success">Cadastrar</button>
                         </div>
                    </div>

              </fieldset>
                <p></p>
                <br>
                <br>
                <br>
                <br>

          </form>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../js/plugins/morris/raphael.min.js"></script>
<script src="../js/plugins/morris/morris.min.js"></script>
<script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
