<?php

	include ('../config/conexion.php');
	
	$sqlGetCurp = "SELECT id, curp FROM $tAlums WHERE sexo='' ";
	$resGetCurp = $con->query($sqlGetCurp);
	if($resGetCurp->num_rows > 0){
		while($rowGetCurp = $resGetCurp->fetch_assoc()){
			$id = $rowGetCurp['id'];
			$curp = $rowGetCurp['curp'];
			$year = ($curp{4} == 0) ? '20'.$curp{4}.$curp{5} : '19'.$curp{4}.$curp{5};
			$month = $curp{6}.$curp{7};
			$day = $curp{8}.$curp{9};
			$fecha = $year.'-'.$month.'-'.$day;
			$sex = $curp{10};
			$sqlUpdAlum = "UPDATE $tAlums SET sexo='$sex', fecha_nac='$fecha' WHERE id='$id' ";
			if($con->query($sqlUpdAlum) === TRUE){
				echo $id.".-".$fecha.", ".$sex."<br>";
				continue;
			}else{
				echo "Error en el registro: ".$id.", error: ".$con->error;
			}
		}
	}else{
		echo "Ya no hay registros vacios.";
	}

?>