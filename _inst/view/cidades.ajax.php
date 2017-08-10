<?php
	header( 'Cache-Control: no-cache' );
	//header( 'Content-type: application/xml; charset="utf-8"', true );

	$mysqli = new mysqli("localhost", "root", "",  "easy_donation");

	$cod_estados =  $_REQUEST['cod_estados'] ;

	$cidades = array();

	$res = $mysqli->query( "SELECT cod_cidades, nome FROM cidades WHERE estados_cod_estados = $cod_estados ORDER BY nome" );
	
        while ( $row =   $res->fetch_object() ) {
  
		$cidades[] = array(
			'cod_cidades'	=> $row->cod_cidades,
			'nome'			=> (utf8_encode($row->nome)),
		);
        }
   

	echo( json_encode( $cidades ) );