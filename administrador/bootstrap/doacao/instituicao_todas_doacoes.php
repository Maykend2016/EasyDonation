<!DOCTYPE html>
<html lang="en">

<head>
            <?php
// esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer 
// o login e digitar na barra de endereço do seu navegador o caminho para a página principal
// do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito
//o login não será criado a session, então ao verificar que a session não existe a página redireciona 
//o mesmo para a index.php.
        session_start();
        if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('location:../../login.html');
        }

        if (isset($_POST['exit_inst'])) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('location:../../login.html');
        }
        $logado = $_SESSION['email'];
        ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon_login_red.ico" type="image/x-icon"/>

    <title>&Epsilon;&alpha;s&upsih; Do&eta;&alpha;tio&eta; | Admin</title>


    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bootstrap/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="../../icon/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
        include '../../_admin/conection_data_base.php';
        $valor_nome;
        $valor_CI;
        $sql = "SELECT * FROM easy_instituicao WHERE inst_email = '$logado' ";

        foreach ($conn->query($sql) as $row) {
            $valor_nome = $row['inst_nome'];
            $valor_CI = $row['inst_CI'];
        }
        
        ?>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top sub-back-color" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand degrader" href="index_instituicao.php"><strong>EasyDonation | <span style="font-size: 17px;">Instituição</span></strong></a>
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
                                    <h5 class="media-heading"><strong><?php echo utf8_encode($valor_nome)?></strong>
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
                                    <h5 class="media-heading"><strong><?php echo utf8_encode($valor_nome)?></strong>
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
                                    <h5 class="media-heading"><strong><?php echo utf8_encode($valor_nome)?></strong>
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-address-card" aria-hidden="true"></i> <?php echo utf8_encode($valor_nome)?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><form method="post"><button name="exit_inst"><i class="fa fa-fw fa-power-off"></i> Log Out</button></form></a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="index_instituicao.php"><i class="glyphicon glyphicon-home"></i> Start Panel</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-user-circle" aria-hidden="true"></i> Instituto <i class="glyphicon glyphicon-triangle-bottom"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="instituicao_atualizar_pf.php">Atualizar Perfil</a>
                        </li>
                        <li>
                            <a href="instituicao_mudar_local.php">Mudar Localização</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-handshake-o" aria-hidden="true"></i> Doações <i class="glyphicon glyphicon-triangle-bottom"></i></a>
                    <ul id="demo1" class="collapse">
                        <li>
                            <a href="instituicao_doacao.php">Cadastrar Doações</a>
                        </li>
                        <li>
                            <a href="gerencia-user.html">Atualizar Doações</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-search" aria-hidden="true"></i> Consulta <i class="glyphicon glyphicon-triangle-bottom"></i></a>
                    <ul id="demo2" class="collapse">
                        <li>
                            <a href="cadastro-user.html">Doações da Semana</a>
                        </li>
                        <li>
                            <a href="gerencia-user.html">Doações do Mês</a>
                        </li>
                        <li>
                            <a href="instituicao_todas_doacoes.php">Todas as Doaçoes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="gerenciar-parceria.html"><i class="fa fa-users" aria-hidden="true"></i>  Parcerias</a>
                    
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#demo3"><i class="fa fa-cog" aria-hidden="true"></i> Administradores <i class="glyphicon glyphicon-triangle-bottom"></i></a>
                    <ul id="demo3" class="collapse">
                        <li>
                            <a href="cadastrar-categoria.html">Atendimento</a>
                        </li>
                        <li>
                            <a href="gerenciar-categoria.html">Quem somos</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="gerenciar-parceria.html"><i class="glyphicon glyphicon-hand-right " > </i> Dúvidas</a>
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
                        Donatários  <small>Cadastrados</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="glyphicon glyphicon-user "></i> Informações
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <div class="container-fluid">
                    <div class="row">


                        <div class="col-md-11">
                            <h4>Informações de Donatários</h4>
                            <div class="table-responsive ">


                                <table id="mytable" class="table table-bordred table-striped">

                                    <thead>

                                <th><input type="checkbox" id="checkall" /></th>
                                <th>Imagem</th>
                                <th>ID</th>
                                <th>Inst CI</th>
                                <th>Categoria</th>
                                <th>Sub-Categoria</th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Data</th>

                                <th>Delete</th>
                                </thead>
                                <tbody>
                                    
    <script type="text/javascript">
                                    function deletaDoacao(id){
                                    alert(id);
                                    
                                    $.ajax({
                                    url: 'excluir.php',
                                    type: 'POST',
                                    data: {cod_id : id},
                                    success: function( data )
				{
					alert( data );
				}
			});
                                                
                                            }
                                
    </script>
                                    <?php
                                    
                                    //SELECT LISTAGEM DOACAO
        //Imagem  ID Inst CI Categoria Sub-Categoria Descriçãp Quantidade Data
        
                              
        $sql_list =  "SELECT * FROM easy_doacao WHERE inst_CI = '$valor_CI' ";
        $list = $conn->prepare($sql_list);
        $list->execute();
        while($row = $list->fetch()) {
            echo' <tr>
                                    <td><input type="checkbox" class="checkthis" /></td>
                                    <td><img src="../../_doacao/crud/fotos/'.$row['img_padrao'].'" width="40" height="40"></td>
                                    <td id="'.$row['id'].'">'.$row['id'].'</td>
                                    <td>'.$row['inst_CI'].'</td>
                                    <td>'.$row['id_cat'].'</td>
                                    <td>'.$row['id_subcat'].'</td>
                                    <td>'.$row['descricao'].'</td>
                                    <td>'.$row['quantidade'].'</td>
                                    <td>'.$row['data'].'</td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"  data-target="#delete" onclick="deletaDoacao('.$row['id'].')" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                </tr>';
        }
                                    
                                

                               ?>
                               



                                </tbody>

                                
                                </table>

                                <div class="clearfix"></div>
                                <ul class="pagination pull-right">
                                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bootstrap/js/plugins/morris/raphael.min.js"></script>
    <script src="../bootstrap/js/plugins/morris/morris.min.js"></script>
    <script src="../bootstrap/js/plugins/morris/morris-data.js"></script>

</body>

</html>
