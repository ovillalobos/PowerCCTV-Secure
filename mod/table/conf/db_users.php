<?php
include('../../controller/cnf_conect_db.php'); 
$connect = mysql_connect( $hostname, $username, $password )or die( "Could not connect: " . mysql_error() );
mysql_select_db($database, $connect);

$bool = mysql_select_db($database, $connect);
if ($bool === False){ print "Can't find ".$database; }

$query = "SELECT * FROM user";
$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
$request[] = array(
		'rowno'  => $row['rowno'],
		'name' => utf8_encode($row['name']),
		'lastname' => utf8_encode($row['lastname']),
		'email' => utf8_encode($row['email']),
		'phone' => utf8_encode($row['phone']),
		'adress' => utf8_encode($row['adress']),
		'userid' => utf8_encode($row['userid']),
		'password' => utf8_encode($row['password']),
		'effective' => utf8_encode($row['effective']),
		'status' => utf8_encode($row['status'])
	);
}

echo json_encode( $request );
?>