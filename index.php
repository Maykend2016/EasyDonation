
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
                            $menuscutlo = strtolower( $nome_categoria);
                            echo '<li><a href="'. $menuscutlo.'.php"><i class="#"></i>'. $nome_categoria.'</a></li>';
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>




            <div class="col-md-9">

                <!--formulário-->

                <form class="form-horizontal" action="index.php" method="POST">
                    <fieldset>

                        <!-- Selecão de Estados -->
                        

                        <div class="form-group">
                            <label class="col-xs-1"></label>
                            <div class=" col-xs-3">
                                <select id="estado" name="estados" class="form-control">
                                    <option value="estado">Selecione seu estado</option>
                                    <option value="1">AC-Acre</option>
                                    <option value="2">AL-Alagoas</option>
                                    <option value="4">AM-Amazonas</option>
                                    <option value="3">AP-Amapá</option>
                                    <option value="5">BA-Bahia</option>
                                    <option value="6">CE-Ceará</option>
                                    <option value="7">DF-Distrito Federal</option>
                                    <option value="8">ES-Espírito Santo</option>
                                    <option value="10">GO-Goiás</option>
                                    <option value="11">MA-Maranhão</option>
                                    <option value="12">MT-Mato Grosso</option>
                                    <option value="13">MS-Mato Grosso do Sul</option>
                                    <option value="14">MG-Minas Gerais</option>
                                    <option value="15">PA-Pará</option>
                                    <option value="16">PB-Paraíba</option>
                                    <option value="17">PR-Paraná</option>
                                    <option value="18">PE-Pernambuco</option>
                                    <option value="19">PI-Piauí</option>
                                    <option value="20">RJ-Rio de Janeiro</option>
                                    <option value="21">RN-Rio Grande do Norte</option>
                                    <option value="23">RO-Rondônia</option>
                                    <option value="22">RS-Rio Grande do Sul</option>
                                    <option value="25">SC-Santa Catarina</option>
                                    <option value="27">SE-Sergipe</option>
                                    <option value="26">SP-São Paulo</option>
                                    <option value="24">TO-Tocantins</option>
                                </select>
                            </div>

                            <button type="submit" id="btn_pesquisa" class="btn btn-default pull-left">Procurar</button>

                            <script type="text/javascript">
                                
                                $('#btn_pesquisa').click(function (){
                                   
                                   if($('#estado').val() != 'estado'){
                                       
                                       $.ajax({
                                           url: "selectDoacao.php",
                                           method: 'post',
                                           data: 
                                       })
                                   }
                                   
                                });
                            </script>
                        </div>
                    </fieldset>
                </form>
            </div>

            <!--Conteúdo do lado direito -->
            <div class="col-md-9">
            <?php 
             
             
             //TESTE
            $itens_por_pagina = 15; // número de registros por página
            //$pagina = intval($_GET['pagina']);
            //Se o GET vir vazio ele atribui um valor, se não, ele pega o valor
            if (empty($_GET['pagina'])) {
                $pagina = 0;
            } else {
                $pagina = intval($_GET['pagina']);
            }
            /* @var $pagina type */
            $est;
            $item = $pagina * $itens_por_pagina;
            //SELECT LISTAGEM DOACAO
            //Imagem  ID Inst CI Categoria Sub-Categoria Descriçãp Quantidade Data
            $sql_list = "SELECT * FROM easy_doacao LIMIT " . $item . ", " . $itens_por_pagina . "";

            $execute = $conn->query($sql_list) or die($conn->error);
            $produto = $execute->fetch(PDO::FETCH_ASSOC);
            $num = $execute->rowCount();

            $num_total = $conn->query("SELECT * FROM easy_doacao ")->rowCount();

            $num_paginas = ceil($num_total / $itens_por_pagina);
            if ($num > 0) {

                do {
                    //NOME CATEGORIA
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
                    
                    echo'
                

                    
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            
                            <a href="produto.php?id='.$produto['id'].'" target="_top"><img src="./_doacao/crud/fotos/' . $produto['img_padrao'] . '"  alt=""  > </a>
                        </div>
                    </div>    
                                       
               ';
                } while ($produto = $execute->fetch(PDO::FETCH_ASSOC));
            }
                     
                    
                 
             
            ?>
                
            <!--<img width="300px" height="200px" >-->

               


                <!--Tem que ver isso direito de paginação-->
                <div class="col-md-9 " >
                    <nav aria-label="Page navigation ">
                        <ul class="pagination">
                                            <li>
                                                <a href="index.php?pagina=0" aria-label="Previous">
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
                                                <li <?php echo $estilo; ?>><a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i + 1; ?></a></li>
                                            <?php } ?>
                                            <li>
                                                <a href="index.php?pagina=<?php echo $num_paginas - 1; ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                    </nav>
                </div>


            </div><!--Final do conteúdo-->
        </div>
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