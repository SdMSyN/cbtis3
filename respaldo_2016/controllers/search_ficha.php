<?php
    include ('../config/conexion.php');
    $ficha = $_POST['inputFicha'];
    
		$cadError=''; 
		$curp='';
		$ban = false;
		
    $sqlGetUser="SELECT curp FROM $tAsp WHERE Ficha='$ficha' ";
    $resGetUser=$con->query($sqlGetUser);
    if($resGetUser->num_rows > 0){
        $rowGetUser=$resGetUser->fetch_assoc();
        $curp = $rowGetUser['curp'];
				$ban = true;
    }
    else{
        $cadError = "El número de ficha no existe en la USET.";
				$ban = false;
    }
    
		if($ban)
			echo json_encode(array("error"=>0, "msgErr"=>$cadError, "curp"=>$curp));
		else
			echo json_encode(array("error"=>1, "msgErr"=>$cadError, "curp"=>$curp));
?>