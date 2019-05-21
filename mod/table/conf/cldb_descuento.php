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
  $query 	= "SELECT * FROM cl_deprin";
  //$from 	= 0; 
  //$to 		= 30;
  //$query 	.= " LIMIT ".$from.",".$to;

  $result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$customers[] = array(
		'rowno'  => $row['rowno'],
        'title' => utf8_encode($row['title']),
		'estado' => utf8_encode($row['estado']),
		'ciudad' => utf8_encode($row['ciudad']),
		'url_img' => utf8_encode($row['url_img'])
     );
  }

  echo json_encode($customers);
?>