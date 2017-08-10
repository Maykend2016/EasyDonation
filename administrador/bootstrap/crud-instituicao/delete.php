select.php<?php
/**
 * Created by PhpStorm.
 * User: mayke
 * Date: 22/03/2017
 * Time: 11:41
 */

try{
    $con = new PDO ("mysql:host=localhost;dbname=easy_donation","root","");

    $del_id = $_GET['inst_id'];


    $DELETE = $con->prepare("DELETE FROM easy_instituicao WHERE inst_id = '$inst_id'");
    $DELETE->execute();
    header("location:gerenciar-doacao.php");



}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}

?>