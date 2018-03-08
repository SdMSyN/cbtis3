<?php

	replaceEnie('nombre');
	replaceEnie('paterno');
	replaceEnie('materno');
	
	function replaceEnie($campo){
		include ('../config/conexion.php');
		$sqlGetEnie = "SELECT id, $campo as campo FROM $tAlums WHERE $campo LIKE '%?%' ";
		$resGetEnie = $con->query($sqlGetEnie);
		if($resGetEnie->num_rows > 0){
			while($rowGetEnie = $resGetEnie->fetch_assoc()){
				$id = $rowGetEnie['id'];
				$replace = str_replace("?", "Ñ", $rowGetEnie['campo']); //remplazamos el signo por la Ñ, en la cadena 'x'
				$sqlUpdEnie = "UPDATE $tAlums SET $campo='$replace' WHERE id='$id' ";
				if($con->query($sqlUpdEnie) === TRUE){
					echo $rowGetEnie['campo'].'-->'.$replace.'<br>';
				}else{
					echo "No se pudo sustituir por el error: ".$con->error.'<br>';
				}
			}
		}else{
			echo "Ya no hay más Eñes.";
		}
	}
	
?>