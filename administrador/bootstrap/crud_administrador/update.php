
<?php
/**
 * Created by PhpStorm.
 * User: mayke
 * Date: 15/03/2017
 * Time: 23:26
 */
require_once('../class/db.class.php');
require_once('../class/valida.class.php');
require_once('../class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
require_once('../protege.php');
///////////////////

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

?>


<?php
/**
 * Created by PhpStorm.
 * User: Helder
 * Date: 22/03/2017
 * Time: 11:42
 */


try{
    $con = new PDO ("mysql:host=localhost;dbname=easy_donation","root","");

    $edit_id = $_GET['edit_id'];


    $select = $con->prepare("SELECT * FROM usuario where id='$edit_id' ");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();
    if(isset($_POST['done']))
    {

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];


        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $telefone = $_POST['telefone'];



        $update = $con->prepare("UPDATE usuario SET nome=:nome, sobrenome=:sobrenome, email=:email, cidade=:cidade, estado=:estado, cep=:cep, telefone=:telefone  where id='$edit_id'");
        $update->bindParam(':nome',$nome);
        $update->bindParam(':email',$email);

        $update->bindParam(':nome',$nome);
        $update->bindParam(':email',$email);

        $update->bindParam(':nome',$nome);
        $update->execute();
        header("location:gerenciar-user.php");
    }
}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}
?>
<form method="post">
    <input type="text" name="nome" placeholder="Nome" value="<?php echo $data['nome'] ?>">
    <input type="text" name="sobrenome" placeholder="sobrenome" value="<?php echo $data['sobrenome'] ?>">
    <input type="text" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
    <input type="text" name="cidade" placeholder="cidade" value="<?php echo $data['cidade'] ?>">
    <input type="text" name="estado" placeholder="estado" value="<?php echo $data['estado'] ?>">
    <input type="text" name="cep" placeholder="cep" value="<?php echo $data['cep'] ?>">
    <input type="text" name="telefone" placeholder="telefone" value="<?php echo $data['telefone'] ?>">

    <input type="submit" name="done" >
</form>