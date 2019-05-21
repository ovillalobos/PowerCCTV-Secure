<?php
  session_start();	// SESIÓN CREADA PARA LA CONSULTA DE INFORMACIÓN
  include('../../../include/cnf_conect_db.php'); 
  $customers = array();
  
  $rowno_esta_ciud = $_SESSION["nombre_estado"];
  
  $connect = mysql_connect($hostname, $username, $password) or die('Could not connect: ' . mysql_error());
  
  mysql_select_db($database, $connect);
  
  $bool = mysql_select_db($database, $connect);
  if ($bool === False){ print "can't find $database"; }
  
  $query = "SELECT * FROM cl_ciud WHERE nomestado = '".$rowno_esta_ciud."';";
  mysql_query("SET NAMES 'utf8'");
  $result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
  
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$customers[] = array(
		'rowno'  => $row['rowno'],
        'nombre' => $row['nombre']
     );
  }
  
  echo json_encode($customers);
?>