<?php

	if(isset($_SESSION['sessU'])  AND $_SESSION['sessU'] == "true"){
		$cadMenuNavbar='';
		if($_SESSION['perfil'] == "2"){//administrador
			//$cadMenuNavbar .= '<li><a href="../views/transportista_form_sel_ruta.php">Ver rutas</a></li>';
			$cadMenuNavbar .= '<li><a href="reports.php">Reportes de localización</a></li>';
		} else if($_SESSION['perfil'] == "3"){//capturista
			$cadMenuNavbar .= '';
		}else{
			$cadMenuNavbar .= '<li>¿Cómo llegaste hasta acá?</li>';
		}
		echo $cadMenuNavbar;
	}
	
?>