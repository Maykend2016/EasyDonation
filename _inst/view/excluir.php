<?php
	header( 'Cache-Control: no-cache' );
	//header( 'Content-type: application/xml; charset="utf-8"', true );

	$pdo = new PDO('mysql:host=localhost;dbname=easy_donation', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$cod_id =  $_POST['cod_id'] ;

	$cidades = array();

	$stmt = $pdo->prepare("DELETE FROM easy_doacao WHERE id = :id ");
	$stmt->bindParam(':id', $cod_id);
        $stmt->execute();
        
       
   ?>
