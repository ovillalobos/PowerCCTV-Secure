<?php
  #Include the connect.php file
  include('../../../include/cnf_conect_db.php'); 
  //include('connect.php');
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
  $query = "SELECT * FROM cl_user";
  //$from = 0; 
  //$to = 30;
  //$query .= " LIMIT ".$from.",".$to;

	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$nombreCompleto = $row['nombre']." ".$row['apellido'];
		$customers[] = array(
			'rowno'  => $row['rowno'],
			'nombre' => utf8_encode($nombreCompleto),
			'email' => utf8_encode($row['email']),
			'tel' => $row['tel'],
			'userid' => utf8_encode($row['userid']),
			'tipo' => utf8_encode($row['tipo']),
			'status' => utf8_encode($row['status'])
		);
	}

  echo json_encode($customers);
?>