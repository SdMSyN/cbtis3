<?php
    include ('../config/conexion.php');
    include ('../config/variables.php');
    
		$curp = $_GET['curp'];
		$sqlGetNumFichaInt = "SELECT id, "
			."ficha_interna, "
			."CONCAT(Nombre,' ',Ap,' ',Am) as name, "
			."Ficha, "
			."SUBSTRING(especialidad_1, 1, 13) as especialidad_1, "
			."SUBSTRING(especialidad_2, 1, 13) as especialidad_2, "
			."SUBSTRING(especialidad_3, 1, 13) as especialidad_3, "
			."SUBSTRING(especialidad_4, 1, 13) as especialidad_4, "
			."SUBSTRING(especialidad_5, 1, 13) as especialidad_5, "
			."vse, vseH, horario_exam, aula_exam, creado "
			."FROM $tAsp "
			."WHERE curp='$curp' ";
		$resGetNumFichaInt = $con->query($sqlGetNumFichaInt);
		$rowGetNumFichaInt = $resGetNumFichaInt->fetch_assoc();
		$fichaInt = 0;
		if($rowGetNumFichaInt['ficha_interna'] == NULL){
			$idAsp = $rowGetNumFichaInt['id'];
			$sqlGetNumFichas = "SELECT COUNT(ficha_interna) as countFichas FROM $tAsp WHERE ficha_interna is not NULL ";
			$resGetNumFichas = $con->query($sqlGetNumFichas);
			$rowGetNumFichas = $resGetNumFichas->fetch_assoc();
			$countFichas = $rowGetNumFichas['countFichas'] + 1;
			// Generamos 0000's 
			$sizeCountFichas = strlen($countFichas);
			$ceroFicha = '';
			for($i=4; $i>$sizeCountFichas; $i--){
				$ceroFicha .= '0';
			}
			$ceroFicha .= $countFichas;
			//Añadimos el año, mes y día
			//$fecha = date("Ymd").''.$ceroFicha;
			//Número de Ficha Final
			//$fichaInt = $fecha;
			$fichaInt = 'C03-'.$ceroFicha;
			
			//servicios escolares
			$vse = 0;
			$vseH = '';
			if($countFichas >= 1 && $countFichas <= 270){ 
				$vse = 22;
				if($countFichas >= 1 && $countFichas <= 68) $vseH = "9:00 a 10:00 ";
				else if($countFichas >= 69 && $countFichas <= 136) $vseH = "10:00 a 11:00 ";
				else if($countFichas >= 137 && $countFichas <= 204) $vseH = "11:00 a 12:00 ";
				else $vseH = "12:00 a 13:00 ";
			}
			else if($countFichas >= 271 && $countFichas <= 540){ 
				$vse = 23;
				if($countFichas >= 271 && $countFichas <= 339) $vseH = "9:00 a 10:00 ";
				else if($countFichas >= 340 && $countFichas <= 407) $vseH = "10:00 a 11:00 ";
				else if($countFichas >= 408 && $countFichas <= 475) $vseH = "11:00 a 12:00 ";
				else $vseH = "12:00 a 13:00 ";
			}
			else if($countFichas >= 541 && $countFichas <= 810){ 
				$vse = 24;
				if($countFichas >= 541 && $countFichas <= 609) $vseH = "9:00 a 10:00 ";
				else if($countFichas >= 610 && $countFichas <= 676) $vseH = "10:00 a 11:00 ";
				else if($countFichas >= 677 && $countFichas <= 744) $vseH = "11:00 a 12:00 ";
				else $vseH = "12:00 a 13:00 ";
			}
			else if($countFichas >= 811 && $countFichas <= 1080){ 
				$vse = 25;
				if($countFichas >= 811 && $countFichas <= 879) $vseH = "9:00 a 10:00 ";
				else if($countFichas >= 880 && $countFichas <= 947) $vseH = "10:00 a 11:00 ";
				else if($countFichas >= 948 && $countFichas <= 1015) $vseH = "11:00 a 12:00 ";
				else $vseH = "12:00 a 13:00 ";
			}
			else if($countFichas >= 1081 && $countFichas <= 1350){ 
				$vse = 26;
				if($countFichas >= 1081 && $countFichas <= 1149) $vseH = "9:00 a 10:00 ";
				else if($countFichas >= 1150 && $countFichas <= 1217) $vseH = "10:00 a 11:00 ";
				else if($countFichas >= 1217 && $countFichas <= 1285) $vseH = "11:00 a 12:00 ";
				else $vseH = "12:00 a 13:00 ";
			}
			else $vse = 29;
		
			// Horario y aula de examen
			$aulaExamen = '';
			$horarioExam = ($countFichas <= 675) ? "Acceso por puerta A " : "Acceso por puerta B ";
			switch($countFichas){
				case ($countFichas >= 1 && $countFichas <= 50): $aulaExamen = '1'; break;
				case ($countFichas >= 51 && $countFichas <= 100): $aulaExamen = '2'; break;
				case ($countFichas >= 101 && $countFichas <= 150): $aulaExamen = '3'; break;
				case ($countFichas >= 151 && $countFichas <= 200): $aulaExamen = '4'; break;
				case ($countFichas >= 201 && $countFichas <= 250): $aulaExamen = '5'; break;
				case ($countFichas >= 251 && $countFichas <= 300): $aulaExamen = '6'; break;
				case ($countFichas >= 301 && $countFichas <= 350): $aulaExamen = '7'; break;
				case ($countFichas >= 351 && $countFichas <= 400): $aulaExamen = '8'; break;
				case ($countFichas >= 401 && $countFichas <= 450): $aulaExamen = '9'; break;
				case ($countFichas >= 451 && $countFichas <= 500): $aulaExamen = '10'; break;
				case ($countFichas >= 501 && $countFichas <= 550): $aulaExamen = '11'; break;
				case ($countFichas >= 551 && $countFichas <= 600): $aulaExamen = '12'; break;
				case ($countFichas >= 601 && $countFichas <= 650): $aulaExamen = '14'; break;
				case ($countFichas >= 651 && $countFichas <= 700): $aulaExamen = '15'; break;
				case ($countFichas >= 701 && $countFichas <= 750): $aulaExamen = '16'; break;
				case ($countFichas >= 751 && $countFichas <= 800): $aulaExamen = '17'; break;
				case ($countFichas >= 801 && $countFichas <= 850): $aulaExamen = '18'; break;
				case ($countFichas >= 851 && $countFichas <= 900): $aulaExamen = '19'; break;
				case ($countFichas >= 901 && $countFichas <= 950): $aulaExamen = '20'; break;
				case ($countFichas >= 951 && $countFichas <= 1000): $aulaExamen = '21'; break;
				case ($countFichas >= 1001 && $countFichas <= 1050): $aulaExamen = 'LAB ING 1'; break;
				case ($countFichas >= 1051 && $countFichas <= 1100): $aulaExamen = 'LAB ING 2'; break;
				case ($countFichas >= 1101 && $countFichas <= 1150): $aulaExamen = 'LAB ELECTR'; break;
				case ($countFichas >= 1151 && $countFichas <= 1200): $aulaExamen = 'TALLER MANT'; break;
				case ($countFichas >= 1201 && $countFichas <= 1250): $aulaExamen = 'LAB FISICA'; break;
				case ($countFichas >= 1251 && $countFichas <= 1300): $aulaExamen = 'BIBLIOTECA'; break;
				case ($countFichas >= 1301 && $countFichas <= 1350): $aulaExamen = 'CC 1'; break;
				case ($countFichas >= 1351 && $countFichas <= 1400): $aulaExamen = 'CC 2'; break;
				case ($countFichas >= 1401 && $countFichas <= 1450): $aulaExamen = 'CC 3'; break;
				case ($countFichas >= 1451 && $countFichas <= 1500): $aulaExamen = 'CC 4'; break;
			}
			//Fecha de creación
			$fecha = $dateNow.' a las '.$timeNow;
			
			//Update
			$sqlUpdFichaInt = "UPDATE $tAsp SET ficha_interna='$fichaInt', validacion_ficha='1', vse='$vse', vseH='$vseH', horario_exam='$horarioExam', aula_exam='$aulaExamen', creado='$dateNow $timeNow' WHERE id='$idAsp' ";
			if($con->query($sqlUpdFichaInt) === FALSE){
				echo "Error al actualizar número de ficha<br>".$con->error;
			}
			
		}else{
			$fichaInt = $rowGetNumFichaInt['ficha_interna']; //Cambiar generación de número de ficha interna
			$vse = $rowGetNumFichaInt['vse']; 
			$vseH = $rowGetNumFichaInt['vseH']; 
			$horarioExam = $rowGetNumFichaInt['horario_exam']; 
			$aulaExamen = $rowGetNumFichaInt['aula_exam']; 
			$fecha = $rowGetNumFichaInt['creado']; 
		}
		
          //fpdf
    require('../fpdf/fpdf.php');
    class PDF extends FPDF{
			// Cabecera de página
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','I',9);
			$this->Cell(0,10,'Sistema de Registro Interno CBTis 03 desarrollado por Softlutions | http://softlutions.biz/v2 ','T',0,'C');
		}
	 
		function Header(){
			$this->SetFont('Arial','B',9);

			$this->Line(10,10,206,10);
			$this->Line(10,35.5,206,35.5);

			//$this->Cell(ancho celda, alto celda, texto, borde 0=no:1=si, salto de línea 0=no:1=si, texto centrado);
			//http://www.desarrolloweb.com/articulos/funciones-fpdf.html
			
			//$this->Cell(50,25,'',0,0,'C',$this->Image('../assets/obj/seplogo.png',20,12,40));
			$this->Cell(50,25,'',0,0,'C',$this->Image('../assets/obj/dgeti.png',20,12,25));
			$this->Cell(100,7,utf8_decode('SECRETARIA DE EDUCACIÓN PÚBLICA'),0,1,'C');
			$this->Cell(200,5,utf8_decode('CBTIS 003 EN EL ESTADO DE TLAXCALA'),0,1,'C');
			$this->SetFont('Arial','',7.5);
			$this->Cell(200,5,utf8_decode('FICHA DE SOLICITUD PARA EL EXAMEN DE INGRESO A LA'),0,1,'C');
			$this->Cell(200,5,utf8_decode('EDUCACIÓN MEDIA SUPERIOR TECNOLÓGICA, CICLO ESCOLAR 2017-2018'),0,0,'C');
			$this->Cell(40,25,'',0,0,'C',$this->Image('../assets/obj/foto_perfil_2.jpg', 175, 12, 19));
			
			$this->Ln(15);
		}
    }//Fin class PDF
    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AddPage('P', 'Letter');
		
		// Número de Ficha de la USET
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(50);
		$pdf->Cell(100, 7, utf8_decode("Datos del aspirante"), 1, 1, 'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(75, 7, utf8_decode("Número de pre-ficha de la USET: "), 0, 0, 'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(100, 7, utf8_decode($rowGetNumFichaInt['Ficha']), 0, 1, 'L');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(75, 7, utf8_decode("Número Ficha del CBTis 03: "), 0, 0, 'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(100, 7, utf8_decode($fichaInt), 0, 1, 'L');
		
		// Nombre del aspirante
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(75, 7, "Nombre del aspirante: ", 0, 0, 'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(100, 7, utf8_decode($rowGetNumFichaInt['name']), 0, 1, 'L');
		
		// Especialidades por orden
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(150, 7, "Especialidad solicitada en orden de prioridad por el aspirante: ", 0, 1, 'L');
		$pdf->SetFont('Arial','',9.5);
		$pdf->Cell(35, 7, utf8_decode("(1) ".$rowGetNumFichaInt['especialidad_1']), 0, 0, 'L');
		$pdf->Cell(35, 7, utf8_decode("(2) ".$rowGetNumFichaInt['especialidad_2']), 0, 0, 'L');
		$pdf->Cell(35, 7, utf8_decode("(3) ".$rowGetNumFichaInt['especialidad_3']), 0, 0, 'L');
		$pdf->Cell(35, 7, utf8_decode("(4) ".$rowGetNumFichaInt['especialidad_4']), 0, 0, 'L');
		$pdf->Cell(35, 7, utf8_decode("(5) ".$rowGetNumFichaInt['especialidad_5']), 0, 1, 'L');

		// El examen se llevará a cabo el día...
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(50);
		$pdf->Cell(100, 7, utf8_decode("Información del examen"), 1, 1, 'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(75, 7, utf8_decode("Tu examen se llevará acabo en: "), 0, 0, 'L');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(100, 7, utf8_decode("El aula ".$aulaExamen." en un horario de 9:00 - 12:00, ".$horarioExam."  "), 0, 1, 'L');
		
		// Lugar del examen
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(75, 7, utf8_decode("El examen será en las instalaciones de éste plantel el día lunes 19 de junio de acuerdo al horario indicado."), 0, 1, 'L');
		//$pdf->SetFont('Arial','B',10);
		//$pdf->Cell(115, 7, utf8_decode("Av. Universidad No. 2, La Loma Xicohténcatl, 90070, Tlaxcala"), 0, 1, 'L');
		
		// Requisitos
		$pdf->SetFont('Arial','I',12);
		$pdf->Cell(195, 7, utf8_decode("Presentarse una hora antes del inicio del examen, con los siguientes requisitos: "), 0, 1, 'L');
		$pdf->SetFont('Arial','BI',12);
		$pdf->MultiCell(200, 7, utf8_decode("         - La presente ficha con fotografía tamaño infantil y sello de validación del plantel \n         - Lápiz del número 2 \n         - Sacapuntas y goma "), 0, 'L', 0);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(150, 7, utf8_decode("No se permitirá el uso de ningún tipo de dispositivo electrónico (calculadora y/o teléfono celular)"), 0, 1, 'L');
		
		//Información de pago
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(50);
		$pdf->Cell(100, 7, utf8_decode("Información de ficha de pago"), 1, 1, 'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(150, 7, utf8_decode("El pago deberá de generarse en el siguiente enlace en el período del 15 al 19 de mayo de 2017: "), 0, 1, 'L');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(115, 7, utf8_decode("http://148.208.122.92:8085/"), 0, 1, 'L');
		$pdf->SetFont('Arial','I',12);
		$pdf->Cell(120, 7, utf8_decode("Tu número de matrícula para realizar tu pago es tu CURP"), 0, 1, 'L');
		
		//Requisitos de validación
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(50);
		$pdf->Cell(100, 7, utf8_decode("Información de validación"), 1, 1, 'C');
		$pdf->SetFont('Arial','I',12);
		$pdf->Cell(195, 7, utf8_decode("Requisitos de validación: "), 0, 1, 'L');
		$pdf->SetFont('Arial','BI',12);
		$pdf->MultiCell(200, 7, utf8_decode("         - Constancia alumnos regulares \n         - Boucher de pago \n         - Preficha SEP, Tlaxcala \n        - Presente ficha interna en 2 tantos con fotografía autoadherible en cada una "), 0, 'L', 0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(115, 7, utf8_decode("El día ".$vse." de mayo en un horario de ".$vseH." horas"), 0, 1, 'L');
		
		//Notas
		$pdf->SetFont('Arial','B',11);
		$pdf->MultiCell(180, 7, utf8_decode("\nNOTA: EL COMPROBANTE DE PAGO DE LA PRESENTE FICHA DEBERÁ PRESENTARSE EN LA FECHA DE VALIDACIÓN Y EN EL EXAMEN\n "), 0, 'L', 0);
		
		//Servicios Escolares
		$pdf->Cell(50);
		$pdf->SetFont('Arial', 'I', 11);
		$pdf->Cell(100, 7, utf8_decode("Servicios Escolares CBTis 03"), 0, 1, 'C');
		
		//Fecha de creación
		$pdf->Cell(130);
		$pdf->SetFont('Arial', 'I', 9);
		$pdf->Cell(50, 7, utf8_decode("Fecha de creación: ".$fecha), 0, 1, 'C');
		
    $pdf->Output();
?>
