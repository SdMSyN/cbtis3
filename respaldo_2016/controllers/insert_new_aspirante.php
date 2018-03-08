<?php

	include('../config/conexion.php');
	include('../config/variables.php');
	
	$arrData = array();
	
	$arrInputName = array("No","Plantel","Cct","Ficha","Nombre","Ap","Am","Curp","prospera_beca","prospera_folio","otra_beca","fecha_nacimiento","sexo","estado_civil","id_estado","estado_radicacion","id_municipio","municipio_radicacion","id_localidad","localidad_radicacion","domicilio","colonia","cp","telefono","email","tutor_nombre","tutor_curp","tutor_grado","tutor_ocupacion","escuela_procedencia","cct_escuela_procedencia","ciclo_escolar_egreso","estado_escuela_procedencia","municipio_escuela_procedencia","tipo_escuela","especialidad_1","especialidad_2","especialidad_3","especialidad_4","especialidad_5","Id","validacion_ficha","ficha_interna","documentacion","aprobado_por","vse","vseH","horario_exam","aula_exam");
	
	for($i=0; $i<49; $i++){
		if($arrInputName[$i] == "Id") $arrData[$i] = '';
		else if($arrInputName[$i] == "validacion_ficha") $arrData[$i] = "0";
		else if($arrInputName[$i] == "ficha_interna" || $arrInputName[$i] == "documentacion" || $arrInputName[$i] == "aprobado_por" || $arrInputName[$i] == "vse" || $arrInputName[$i] == "vseH" || $arrInputName[$i] == "horario_exam" || $arrInputName[$i] == "aula_exam") $arrData[$i] = "NULL";
		else $arrData[$i] = $_POST['input'.$arrInputName[$i]];
	}

	//var_dump($arrData);
	$sqlInsert0 = "INSERT INTO $tAsp "; $sqlInsert1 = ""; $sqlInsert2 = "";
	for($j =0; $j<count($arrData); $j++){
		$sqlInsert1 .= $arrInputName[$j].", ";
		$sqlInsert2 .= ($arrData[$j] == "NULL") ? "$arrData[$j], " : " '$arrData[$j]', ";
	}
	
	$sqlInsert = $sqlInsert0."(".substr($sqlInsert1, 0, -2).") VALUES (".substr($sqlInsert2,0,-2).")";
	echo $sqlInsert;
	
	if($con->query($sqlInsert) === TRUE){
		echo "true";
	}else{
		echo "Error al insertar <br>".$con->error;
	}
	
?>