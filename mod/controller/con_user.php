<?php

require_once('cnf_conect_db.php'); 
$conexion = mysql_connect($hostname, $username, $password) or die('Error al conectar con la Base de Datos: '.mysql_error());
$base     = mysql_select_db($database, $conexion) or die('Error al seleccionar la Base de Datos: '.mysql_error());	

$method  = $_POST["method"];
$request = "";

switch($method)
{
	case "insert":
	case "update":
		$inName	 	= $_POST['inName'];
		$inLastname = $_POST['inLastname'];
		$inUserid 	= $_POST['inUserid'];
		$inPassword	= $_POST['inPassword'];
		$inAdress 	= $_POST['inAdress'];
		$inPhone	= $_POST['inPhone'];
		$inEmail	= $_POST['inEmail'];
		$inStatus	= $_POST['inStatus'];
		
		if( $method == "insert" ){
			$effective 	= date("Ymd");
			$query 		= "INSERT INTO user VALUES (null, '".$inName."', '".$inLastname."', '".$inEmail."', '".$inPhone."', '".$inAdress."', '".$inUserid."', '".$inPassword."', '".$inStatus."', '".$effective."');";
		} else if( $method == "update" ){
			$rowno	  = $_POST['rowno'];
			
			$query = "UPDATE user SET name = '".$inName."', lastname = '".$inLastname."', email = '".$inEmail."', phone = '".$inPhone."', adress = '".$inAdress."', userid = '".$inUserid."', password = '".$inPassword."', status = '".$inStatus."' WHERE rowno = ".$rowno.";";
		}
		
		mysql_query("SET NAMES 'utf8'");
		
		if ( mysql_query($query) ) { $resultado = "OK"; }
		else { $resultado = "ERROR"; }
		
		$request = $resultado;
	break;
	case "consult":
		$rowno     = $_POST['rowno'];
		$resultado = "";
		
		$query = "SELECT * FROM user WHERE rowno = ".$rowno.";"; 
		if ( $consulta = mysql_query($query) )
		{
			$arrayConsulta = mysql_fetch_array($consulta);
			mysql_free_result($consulta);
			$resultado = "OK|".$arrayConsulta['rowno']."|".$arrayConsulta['name']."|".$arrayConsulta['lastname']."|".$arrayConsulta['email']."|".$arrayConsulta['phone']."|".$arrayConsulta['adress']."|".$arrayConsulta['userid']."|".$arrayConsulta['password']."|".$arrayConsulta['status'];			
		}
		else
		{
			$resultado = "ERROR";
		}
		
		$request = utf8_encode($resultado);
	break;
	default:
		
	break;
}

echo $request;
?>