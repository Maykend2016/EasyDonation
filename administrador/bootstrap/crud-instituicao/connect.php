delete.php<?php
/**
 * Created by PhpStorm.
 * User: mayke
 * Date: 22/03/2017
 * Time: 11:41
 */

try{
    $con = new PDO ("mysql:host=localhost;dbname=easy_admin","root","");
    echo "connected";
}
catch(PDOException $e)
{
    echo "error:".$e->getMessage();
}

?>