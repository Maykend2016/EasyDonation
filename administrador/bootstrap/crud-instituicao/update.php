<?php
/**
 * Created by PhpStorm.
 * User: mayke
 * Date: 22/03/2017
 * Time: 11:42
 */


try{
    $con = new PDO ("mysql:host=localhost;dbname=easy_admin","root","");

    $edit_id = $_GET['edit_id'];


    $select = $con->prepare("SELECT * FROM usuario where id='$edit_id' ");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();
    if(isset($_POST['done']))
    {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $telefone = $_POST['telefone'];
        $link = $_POST['link'];
        $logotipo = $_POST['logotipo'];


        $update = $con->prepare("UPDATE usuario SET nome=:nome, email=:email ,senha=:senha,telefone=:telefone,link=:link,logotipo=:logotipo where id='$edit_id'");
        $update->bindParam(':nome',$nome);
        $update->bindParam(':email',$email);
        $update->bindParam(':senha',$pass);
        $update->bindParam(':telefone',$telefone);
        $update->bindParam(':link',$link);
        $update->bindParam(':logotipo',$logotipo);
        $update->execute();
        header("location:gerenciar-doacao.php");
    }
}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}
?>
<form method="post">
    <input type="text" name="nome" placeholder="Nome" value="<?php echo $data['nome'] ?>">
    <input type="text" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
    <input type="text" name="pass" placeholder="Informe uma nova senha" value="<?php echo $data['senha'] ?>">
    <input type="text" name="telefone" placeholder="Insira um telefone" value="<?php echo $data['telefone'] ?>">
    <input type="text" name="link" placeholder="link para o site" value="<?php echo $data['link'] ?>">
    <input type="text" name="logotipo" placeholder="Insira uma imagem" value="<?php echo $data['logotipo'] ?>">
    <input type="submit" name="done" >
</form>