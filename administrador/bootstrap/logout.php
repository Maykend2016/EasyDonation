<?php
/**
 * Created by PhpStorm.
 * User: mayke
 * Date: 30/05/2017
 * Time: 12:02
 */

session_start();
unset($_SESSION['logado']);

echo 'saiu';

?>

<script>location.href='login.php';</script>