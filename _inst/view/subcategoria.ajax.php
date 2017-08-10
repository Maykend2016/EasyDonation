<?php
	header( 'Cache-Control: no-cache' );
	//header( 'Content-type: application/xml; charset="utf-8"', true );

	$mysqli = new mysqli("localhost", "root", "",  "easy_donation");

	$cod_categoria =  $_REQUEST['cod_categoria'] ;

	$subcategoria = array();

	$res = $mysqli->query( "SELECT id, titulo_sub FROM easy_subcategoria WHERE id_cat = $cod_categoria ORDER BY titulo_sub" );
	
        while ( $row =   $res->fetch_object() ) {
  
		$subcategoria[] = array(
			'id'	=> $row->id,
			'titulo_sub'			=> (utf8_encode($row->titulo_sub)),
		);
        }
   

	echo( json_encode( $subcategoria ) );