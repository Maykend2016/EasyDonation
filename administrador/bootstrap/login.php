<?php
/**
 * Created by PhpStorm.
 * User: mayke
 * Date: 15/03/2017
 * Time: 14:12
 */
require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $usuario = new usuario();
    $usuario->validaLogin($_POST);
    if(@$_SESSION['logado']){
        header ('Location: index.php');
        //header ('Location: listagem.php');


    }
    else

        $erro = "Login inválido!";
}
?>

<!DOCTYPE html>
<!--importante pesquisar a documentação :
http://blog.masterdaweb.com/programacao-1/linguagem-php/mw-login-v2-0-script-em-phpmysql-para-autenticacao-de-usuarios/
-->
<html lang="pt-br">
<head>
    <meta charset="utf-8">

    <title>&Epsilon;&alpha;s&upsih; Do&eta;&alpha;tio&eta; | Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/login.css">

    <link rel="icon" href="img/favicon_login.ico" type="image/x-ic"/>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="#" class="active" id="login-form-link">&Epsilon;&alpha;s&upsih; Do&eta;&alpha;tio&eta; | Login Administrativo</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" method="post" role="form" style="display: block;" class="pure-form pure-form-stacked" >
                                <div class="form-group">
                                    <p style="color: red"><b><?php echo @$erro; ?></b></p>
                                    <input id="email" name="email" type="email" placeholder="Email" class="form-control" value="<?= @$_POST['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control"  >
                                </div>
                                <div class="form-group text-center">
                                    <!--<input type="checkbox" tabindex="3" class="" name="remember" id="remember">-->
                                    <!--label for="remember"> Remember Me</label>-->
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button type="submit" class="form-control btn btn-login">Entrar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <!--<a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p lang="pt-br"> Deseja voltar ao site ?  <a href="../../index.php" target="_parent">Easy Donation</a></p>
</footer>


<script type="text/javascript">
</script>
</body>
</html>
