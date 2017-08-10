

<table border="2">
<tr>
<th>ID</th>
<th>NOME</th>
<th>EMAIL</th>
<th>SENHA</th>
<th>Tel</th>
<th>Link</th>
<th>Logo</th>
<th colspan="2">AÇÂO</th>

</tr>

    <?php
    /**
     * Created by PhpStorm.
     * User: mayke
     * Date: 22/03/2017
     * Time: 13:36
     */

try{
$con = new PDO ("mysql:host=localhost;dbname=easy_admin","root","");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$select = $con->prepare("SELECT * FROM usuario ");

$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
while($data=$select->fetch()){
?>


<tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['nome']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['senha']; ?></td>
    <td><?php echo $data['telefone']; ?></td>
    <td><?php echo $data['link']; ?></td>
    <td><?php echo $data['logotipo']; ?></td>
    <td><a href="update.php?edit_id=<?php echo $data['id']; ?>">EDITAR</a></td>
    <td><a href="delete.php?del_id=<?php echo $data['id']; ?>">DELETAR</a></td>


    <?php
    }
    }
    catch(PDOException $e)
    {
        echo "error:".$e->getMessage();
    }

    ?>
</tr></table>

