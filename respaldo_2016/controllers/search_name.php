<?php
    include ('../config/conexion.php');
    $name = $_POST['inputName'];
    $ap = $_POST['inputAP'];
    
		$cadError=''; 
		$curp='';
		$ban = false;
		
    $sqlGetUser="SELECT curp FROM $tAsp WHERE Nombre LIKE '%$name%' AND Ap LIKE '%$ap%' ";
    $resGetUser=$con->query($sqlGetUser);
    if($resGetUser->num_rows > 0){
        $rowGetUser=$resGetUser->fetch_assoc();
        $curp = $rowGetUser['curp'];
				$ban = true;
    }
    else{
        $cadError = "A quien buscas no esta aquí.";
				$ban = false;
    }
    
		if($ban)
			echo json_encode(array("error"=>0, "msgErr"=>$cadError, "curp"=>$curp));
		else
			echo json_encode(array("error"=>1, "msgErr"=>$cadError, "curp"=>$curp));
?>