<?php
  #Include the connect.php file
  //include('connect.php');
  include('../../../include/cnf_conect_db.php'); 
  #Connect to the database
  //connection String
  $connect = mysql_connect($hostname, $username, $password)
  or die('Could not connect: ' . mysql_error());
  //select database
  mysql_select_db($database, $connect);
  //Select The database
  $bool = mysql_select_db($database, $connect);
  if ($bool === False){
  print "can't find $database";
  }
  // get data and store in a json array
  $query = "SELECT * FROM cl_cust";
  //$from = 0; 
  //$to = 30;
  //$query .= " LIMIT ".$from.",".$to;

  $result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	//$nombreCompleto = $row['nombre']." ".$row['apellido'];
  $customers[] = array(
		'rowno'  => $row['rowno'],
        'nombre' => utf8_encode($row['nombre_completo']),
        'email' => utf8_encode($row['email']),
		'fecha_cumple' => $row['fecha_cumple'],
		'userid' => utf8_encode($row['userid']),
		'str_sexo' => $row['str_sexo'],
		'status' => $row['status']
      );
  }

  echo json_encode($customers);
?>