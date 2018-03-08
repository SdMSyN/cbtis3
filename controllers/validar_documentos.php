<?php
    include ('../config/conexion.php');
    include ('../config/variables.php');

		$idAsp = $_POST['idAsp'];
		$idV = $_POST['idV'];
		//echo $idAsp;
		
		$sqlUpdDocs = "UPDATE $tAsp SET documentacion='1', aprobado_por='$idV' WHERE id='$idAsp' ";
		if($con->query($sqlUpdDocs) === TRUE){
			echo "true";
		}else{
			echo "Error al aprobar docuemtnación<br>".$con->error;
		}
		
?>
