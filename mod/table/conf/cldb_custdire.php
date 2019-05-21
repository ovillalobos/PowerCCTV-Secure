<?php
	/****************************************************************************************************************
	[INFO] Proceso para la consulta de la base de datos y llenado de tabla dinámica
	[AUTO] Omar Vicente Villalobos Castro
	*****************************************************************************************************************/
	session_start();	// SESIÓN CREADA PARA LA CONSULTA DE INFORMACIÓN
	include( "../../../include/cnf_conect_db.php" );
	
	$rowno_cust_dire = $_SESSION["rowno_cust"];

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
	//$query  = "SELECT * FROM cl_dire WHERE rowno_cust_dire = ".$rowno_cust_dire." LIMIT ".$from.",".$to;
	$query  = "SELECT * FROM cl_dire WHERE rowno_cust_dire = ".$rowno_cust_dire.";";
	$result = mysql_query($query) or die ("SQL Error 1: " . mysql_error());
	
	while( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) ) {
	$customers[] = array(
		'rowno'  => $row['rowno'],
		'descripcion' => utf8_encode($row['descrip']),
		'calle'  => utf8_encode($row['calle']),
		'colonia'=> utf8_encode($row['colonia']),
		'ciudad' => utf8_encode($row['ciudad']),
		'estado' => utf8_encode($row['estado']),
		'codigo_postal' => $row['codigo_postal'],
		'tel' => $row['tel']
	  );
	}
	//Regresamos el valor de JSON
	echo json_encode($customers);	
?>