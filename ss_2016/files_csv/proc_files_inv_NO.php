<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	$aspirantes = file('1_Aspirantes_29DCT0144I.csv');
	
	$cgpec = file('1_C_GPEC.csv');
	$egpec = file('1_E_GPEC.csv');
	$lgpec = file('1_L_GPEC.csv');
	$mgpec = file('1_M_GPEC.csv');
	$pgpec = file('1_P_GPEC.csv');
	$gpec = array('1_C_GPEC.csv', '1_E_GPEC.csv', '1_L_GPEC.csv', '1_M_GPEC.csv', '1_P_GPEC.csv');
	
	$i = 0; $countAsp = 0; $countFind = 0;
	foreach($aspirantes as $linea_num => $linea){
		if($i>11){
			$linea = utf8_encode($linea);
			$datos = explode(",", $linea);
			$countAsp++;
				$nameAsp = $datos[4];
				$nameAspTmp = explode(" ", $nameAsp);
				$nameAsp1 = $nameAspTmp[0];
				$apAsp = $datos[5];
				$apAspTmp = explode(" ", $apAsp);
				$apAsp1 = $apAspTmp[0];
				$amAsp = $datos[6];
				$amAspTmp = explode(" ", $amAsp);
				$amAsp1 = $amAspTmp[0];
			//echo $countAsp.'--'.$datos[4].'--'.$datos[5].'--'.$datos[6].'<br>';
			$banExiste = false;
			for($a = 0; $a < count($gpec); $a++){ //recorremos los 5 archivos de para escolares
				$gpecTmp = file($gpec[$a]);
				foreach($gpecTmp as $linea_num => $lineaGPEC){ //recorremos el archivo buscando al aspirante
					$lineaGPEC = utf8_encode($lineaGPEC);
					$datosGPEC = explode(",", $lineaGPEC);
						$nameGPEC = $datosGPEC[3];
						$nameGPECTmp = explode(" ", $nameGPEC);
						$nameGPEC1 = $nameGPECTmp[0];
						$apGPEC = $datosGPEC[1];
						$apGPECTmp = explode(" ", $apGPEC);
						$apGPEC1 = $apGPECTmp[0];
						$amGPEC = $datosGPEC[2];
						$amGPECTmp = explode(" ", $amGPEC);
						$amGPEC1 = $amGPECTmp[0];
					if($nameAsp1 == $nameGPEC1 && $apAsp1 == $apGPEC1 && $amAsp1 == $amGPEC1){
						//echo $countAsp.'--'.$countFind.'--'.$datos[4].'--'.$datos[5].'--'.$datos[6].'<br>';
						$banExiste = true;
						break;
					}else{
						continue;
					} 
				}//end foreach
			}//end for gpec
			if(!$banExiste){ 
				$countFind++;
				echo $countFind.','.$datos[1].','.$datos[2].','.$datos[3].','.utf8_decode($nameAsp).','.utf8_decode($apAsp).','.utf8_decode($amAsp).','.$datos[7].','.$datos[8].','.$datos[9].','.$datos[10].','.$datos[11].','.$datos[12].','.$datos[13].','.$datos[14].','.$datos[15].','.$datos[16].','.$datos[17].','.$datos[18].','.$datos[19].','.$datos[20].','.$datos[21].','.$datos[22].','.$datos[23].','.$datos[24].','.$datos[25].','.$datos[26].','.$datos[27].','.$datos[28].','.$datos[29].','.$datos[30].','.$datos[31].','.$datos[32].','.$datos[33].','.$datos[34].','.$datos[35].','.$datos[36].','.$datos[37].','.$datos[38].','.$datos[39].'<br>';
				continue;
			}
			$i++;
		}else $i++;
	}

?>