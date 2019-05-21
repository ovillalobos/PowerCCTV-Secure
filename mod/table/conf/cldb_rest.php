<?php
	/****************************************************************************************************************
	[INFO] Proceso para la consulta de la base de datos y llenado de tabla dinámica
	[AUTO] Omar Vicente Villalobos Castro
	*****************************************************************************************************************/
	//#Incluimos el archivo para conexión 
	include('../../../include/cnf_conect_db.php'); 	
	//#Conectamos a la base de datos (connection String)
	$connect = mysql_connect($hostname, $username, $password) or die('Could not connect: ' . mysql_error());	
	//Seleccionamos la base de datos
	mysql_select_db($database, $connect);
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){ print "can't find $database"; }	
	//Obtenemos la información y la almacenamos en un arreglo de JSON
	//$from 	= 0; 
	//$to 	= 30;
	//$query 	= "SELECT * FROM cl_rest LIMIT ".$from.",".$to;
	$query 	= "SELECT * FROM cl_rest ";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$customers[] = array(
			'rowno'  => $row['rowno'],
			'nombre' => utf8_encode($row['nombre']),
			'tipo' => utf8_encode($row['tipo']),
			'email' => utf8_encode($row['email']),
			'tel' => $row['tel'],
			'url_imagen' => utf8_encode($row['url_imagen']),
			'url_pagina' => utf8_encode($row['url_pagina'])
		);
	}
	//Regresamos el valor de JSON
	echo json_encode($customers);
?>