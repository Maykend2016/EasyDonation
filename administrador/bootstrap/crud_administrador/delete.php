select.php<?php
/**
 * Created by PhpStorm.
 * User: Mayke
 * Date: 28/03/2017
 * Time: 11:41
 */

try{
    $con = new PDO ("mysql:host=localhost;dbname=easy_donation","root","");

    $del_id = $_GET['del_id'];


    $DELETE = $con->prepare("DELETE FROM usuario  where idusuario='$del_id'");
    $DELETE->execute();
    header("location: gerenciar-user.php");



}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}

?>