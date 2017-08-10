<?php
require_once('../class/db.class.php');
require_once('../class/valida.class.php');
require_once('../class/usuario.class.php');

// Somente o administrador pode ter acesso a esta página.
// O administrador é o primeiro usuário cadastrado, ou seja, o usuário com id = 1
// Protege a página
require_once('../protege.php');
///////////////////

if (@$_SESSION['idusuario'] != 1)
    header('Location: ../login.php');

if ($_GET['idusuario'] != 1) {
    $id = $_GET['idusuario'];
    $usuario = new usuario;
    if ($usuario->deletarUsuario($id))
        echo "Usuario com id = $id foi removido com sucesso!";
    else
        echo "Erro ao deletar usuário";
} else
    echo "Não é permitido deletar a conta de Administrador";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuário Deletado</title>
    </head>
    <body>
    </body>
</html>