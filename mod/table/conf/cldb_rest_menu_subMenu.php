<?php
	/****************************************************************************************************************
	[INFO] Proceso para la consulta de la base de datos y llenado de tabla dinámica
	[AUTO] Omar Vicente Villalobos Castro
	*****************************************************************************************************************/
	session_start();	// SESIÓN CREADA PARA LA CONSULTA DE INFORMACIÓN
	include( "../../../include/cnf_conect_db.php" );
	
	$rowno_rest_menu = $_SESSION["rowno_rest_menu"];

	//#Conectamos a la base de datos (connection String)
	$connect = mysql_connect( $hostname, $username, $password ) or die ( "Could not connect: " . mysql_error() );
	//Seleccionamos la base de datos
	mysql_select_db( $database, $connect );
	//Select The database
	$bool = mysql_select_db( $database, $connect );
	if ( $bool === False ){ print "can't find $database"; }
	// get data and store in a json array
	//$from   = 0;
	//$to     = 30;
	//$query  = "SELECT * FROM cl_submenu WHERE rowno_menu_sumenu = ".$rowno_rest_menu." LIMIT ".$from.",".$to;
	$query  = "SELECT * FROM cl_submenu WHERE rowno_menu_sumenu = ".$rowno_rest_menu.";";
	$result = mysql_query($query) or die ("SQL Error 1: " . mysql_error());
	
	while( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) ) {
	$customers[] = array(
		'rowno'  => $row['rowno'],
		'str_descripcion' => utf8_encode($row['str_descripcion']),
		'fo_costo'  => $row['fo_costo'],
		'status'=> utf8_encode($row['status'])
	  );
	}
	//Regresamos el valor de JSON
	echo json_encode($customers);	
?>