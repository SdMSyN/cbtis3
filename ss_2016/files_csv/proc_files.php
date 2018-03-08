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
	
	$nssAM = file('2_AM_L133.csv');
	$nssBM = file('2_BM_L133.csv');
	$nssCM = file('2_CM_L133.csv');
	$nssDM = file('2_DM_L133.csv');
	$nssEM = file('2_EM_L133.csv');
	$nssFM = file('2_FM_L133.csv');
	
	$nsssAV = file('2_AV_1VS.csv');
	$nsssBV = file('2_BV_1VS.csv');
	$nsssCV = file('2_CV_1VS.csv');
	$nsssDV = file('2_DV_1VS.csv');
	$nsssEV = file('2_EV_1VS.csv');
	$nsssFV = file('2_FV_1VS.csv');
	$nsssGV = file('2_GV_1VS.csv');
	$nsssHV = file('2_HV_1VS.csv');
	$nsssIV = file('2_IV_1VS.csv');
	
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
						$countFind++;
						echo $countAsp.'--'.$countFind.'--'.$datos[4].'--'.$datos[5].'--'.$datos[6].'<br>';
						$banExiste = true;
						break;
					}else{
						continue;
					} 
				}//end foreach
			}//end for gpec
			/*
			//Recorremos todos los archivos de los paraescolares
			$iC = 0;
			foreach($cgpec as $linea_num => $lineaC){
				if($iC > 1){
					$lineaC = utf8_encode($lineaC);
					$datosC = explode(",", $lineaC);
					$nameC = $datosC[3];
					$apC = $datosC[1];
					$amC = $datosC[2];
					//echo $nameC.'--'.$apC.'--'.$amC.'<br>';
					if($nameAsp == $nameC && $apAsp == $apC && $amAsp == $amC){
						//echo $countAsp.'--'.$datos[4].'--'.$datos[5].'--'.$datos[6].'<br>';
						$banExiste = true;
						break;
					}else{ continue; }
					$iC++;
				}else{ $iC++; }
			}*/
			
			
			/*
			//Si, si hallamos el aspirante en los grupos paraescolares
			if($banExiste){
				//Recorremos los archivos buscando el número de segúridad social
				$iAMNSS = 0;
				foreach($nssAM as $linea_num => $lineaNssAM){
					if($iAMNSS > 1){
						$lineaNssAM = utf8_encode($lineaNssAM);
						$datosNssAM = explode(",", $lineaNssAM);
						$nameNssAM = $datosNssAM[3];
						$apNssAM = $datosNssAM[1];
						$amNssAM = $datosNssAM[2];
						$amNSS = ($datosNssAM[4] == "") ? "NSS_Generico" : $datosNssAM[4];
						//echo $nameC.'--'.$apC.'--'.$amC.'<br>';
						if($nameAsp == $nameNssAM && $apAsp == $apNssAM && $amAsp == $amNssAM){
							echo $countAsp.'--'.$datos[4].'--'.$datos[5].'--'.$datos[6].'--'.$amNSS.'<br>';
							//$banExiste = true;
							break;
						}else{ continue; }
						$iAMNSS++;
					}else{ $iAMNSS++; }
				}
			}*/
			
			$i++;
		}else $i++;
	}

?>