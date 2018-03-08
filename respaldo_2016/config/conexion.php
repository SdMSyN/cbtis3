<?php
	
	date_default_timezone_set('America/Mexico_City');
	$host="localhost";
	$user="cbtis3_servesc";
	$pass="Qh8+Ke7Qf6+";
	$db="cbtis3_aspirantes";
//	$db="laconcepcionproduccion";
	$con=mysqli_connect($host, $user, $pass, $db);
	if($con->connect_error){
		die("Connection failed: ".$con->connect_error);
	}
	//echo 'Hola';
	
	$tAsp="table_1";
	$tUser ="user";
	$tPerfil = "perfil";
	
	
?>