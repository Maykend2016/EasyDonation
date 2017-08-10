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


$usuario = new usuario;
$dados = $usuario->todosUsuariosInfo();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Administração</title>
        <link rel="stylesheet" href="../css/pure-min.css">
        
    </head>

    <body>

        <div style="margin-left: 20%; margin-right: 20%;">
            <h3> Administração</h3>
            <hr> </hr>

            <table class="pure-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Último Acesso</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
<?php $i = 0;
foreach ($dados as $usuario): ?>
                        <?php if ($i == 0): $i++ ?>
                            <tr class="pure-table-odd">
                                <td><?= $usuario['idusuario'] ?></td>
                                <td><?= $usuario['nome'] ?></td>
                                <td><?= $usuario['sobrenome'] ?></td>
                                <td><?= $usuario['email'] ?></td>
                                <td><?= $usuario['ultimoAcesso'] ?></td>
                                <td><a href="../editar.php?idusuario=<?= $usuario['idusuario'] ?>"> <img src="../img/editar.png" /> </a> <a href="deletar.php?idusuario=<?= $usuario['idusuario'] ?>" class="confirmacao"> <img src="../img/remover.png" /> </a></td>
                            </tr>
                        <?php else: $i-- ?>

                            <tr>
                                <td><?= $usuario['idusuario'] ?></td>
                                <td><?= $usuario['nome'] ?></td>
                                <td><?= $usuario['sobrenome'] ?></td>
                                <td><?= $usuario['email'] ?></td>
                                <td><?= $usuario['ultimoAcesso'] ?></td>
                                <td><a href="../editar.php?idusuario=<?= $usuario['idusuario'] ?>"> <img src="../img/editar.png" /> </a> <a href="deletar.php?idusuario=<?= $usuario['idusuario'] ?>" class="confirmacao"> <img src="../img/remover.png" /> </a></td>
                            </tr>

                        <?php endif; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
            
            <script type="text/javascript">
            var elems = document.getElementsByClassName('confirmacao');
            var confirmIt = function (e) {
            if (!confirm('Tem certeza ?')) 
                e.preventDefault();
            };
            for (var i = 0, l = elems.length; i < l; i++) {
                elems[i].addEventListener('click', confirmIt, false);
            }
            </script>

            <hr> </hr>
            


        </div>




    </body>
</html>