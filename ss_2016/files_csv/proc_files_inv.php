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
	$nssM = array('2_AM_L133.csv', '2_BM_L133.csv', '2_CM_L133.csv', '2_DM_L133.csv', '2_EM_L133.csv', '2_FM_L133.csv');
	
	$nsssAV = file('2_AV_1VS.csv');
	$nsssBV = file('2_BV_1VS.csv');
	$nsssCV = file('2_CV_1VS.csv');
	$nsssDV = file('2_DV_1VS.csv');
	$nsssEV = file('2_EV_1VS.csv');
	$nsssFV = file('2_FV_1VS.csv');
	$nsssGV = file('2_GV_1VS.csv');
	$nsssHV = file('2_HV_1VS.csv');
	$nsssIV = file('2_IV_1VS.csv');
	$nssV = array('2_AV_1VS.csv', '2_BV_1VS.csv', '2_CV_1VS.csv', '2_DV_1VS.csv', '2_EV_1VS.csv', '2_FV_1VS.csv', '2_GV_1VS.csv', '2_HV_1VS.csv', '2_IV_1VS.csv');
	
	$countFind = 0; $countAsp = 0; $result = '';
	for($a = 0; $a < count($gpec); $a++){ //recorremos los 5 archivos de para escolares
		$gpecTmp = file($gpec[$a]);
		$countGPEC = 0; 
		foreach($gpecTmp as $linea_num => $lineaGPEC){ //recorremos el archivo buscando al aspirante
			if($countGPEC < 2){ $countGPEC++; continue;}
			$banExiste = false; 
			$lineaGPEC = utf8_encode($lineaGPEC);
			$datosGPEC = explode(",", $lineaGPEC);
				if(count($datosGPEC) < 3) continue; 
				$nameGPEC = trim($datosGPEC[3]);
				$nameGPECTmp = explode(" ", $nameGPEC);
				$nameGPEC1 = $nameGPECTmp[0];
				$apGPEC = trim($datosGPEC[1]);
				$apGPECTmp = explode(" ", $apGPEC);
				$apGPEC1 = $apGPECTmp[0];
				$amGPEC = trim($datosGPEC[2]);
				$amGPECTmp = explode(" ", $amGPEC);
				$amGPEC1 = $amGPECTmp[0];
				$countAsp++;
				$countAspTmp = 0;
			foreach($aspirantes as $linea_num2 => $lineaAsp){
				if($countAspTmp < 11){ $countAspTmp++; continue;}
				$lineaAsp = utf8_encode($lineaAsp);
				$datosAsp = explode(",",$lineaAsp);
				if(count($datosAsp) < 6) continue;
				$nameAsp = trim($datosAsp[4]);
				$nameAspTmp = explode(" ", $nameAsp);
				$nameAsp1 = $nameAspTmp[0];
				$apAsp = trim($datosAsp[5]);
				$apAspTmp = explode(" ", $apAsp);
				$apAsp1 = $apAspTmp[0];
				$amAsp = trim($datosAsp[6]);
				$amAspTmp = explode(" ", $amAsp);
				$amAsp1 = $amAspTmp[0];
				if($nameAsp1 == $nameGPEC1 && $apAsp1 == $apGPEC1 && $amAsp1 == $amGPEC1){
					$countFind++;
					//echo $countAsp.'--'.$countFind.'--'.$nameGPEC.'--'.$apGPEC.'--'.$amGPEC.'<br>';
					$result .= $countFind.','.$datosAsp[2].','.utf8_decode($nameGPEC).','.utf8_decode($apGPEC).','.utf8_decode($amGPEC).','.$datosAsp[11].','.$datosAsp[7].','.$datosAsp[13].','.$datosAsp[14].',0'.$datosAsp[16].',0'.$datosAsp[14].',00'.$datosAsp[16].','.$datosAsp[18].','.$datosAsp[21].','.$datosAsp[20].','.$datosAsp[22].','.$datosAsp[23].','.$datosAsp[23].','.$datosAsp[24].','.$datosAsp[35].','.$datosAsp[36].','.$datosAsp[37];
					$banExiste = true;
					break;
				}else{
					continue;
				} 
			}//end foreach Aspirantes
			if(!$banExiste){ 
				echo utf8_decode($nameGPEC).','.utf8_decode($apGPEC).','.utf8_decode($amGPEC).'<br>';
				continue;
			}
			else{//Si, si existe
				$banNss = false;
				$banExisteNss = false; 
				for($b = 0; $b < count($nssM); $b++){
					$nssMat = file($nssM[$b]);
					$countNssM = 0; 
					foreach($nssMat as $linea_num => $lineaNssM){ //recorremos el archivo buscando al aspirante
						if($countNssM < 2){ $countNssM++; continue;}
						$lineaNssM = utf8_encode($lineaNssM);
						$datosNssM = explode(",", $lineaNssM);
						if(count($datosNssM) < 4) continue;
						$nameNssM = trim($datosNssM[3]);
						$nameNssMTmp = explode(" ", $nameNssM);
						$nameNssM1 = $nameNssMTmp[0];
						$apNssM = trim($datosNssM[1]);
						$apNssMTmp = explode(" ", $apNssM);
						$apNssM1 = $apNssMTmp[0];
						$amNssM = trim($datosNssM[2]);
						$amNssMTmp = explode(" ", $amNssM);
						$amNssM1 = $amNssMTmp[0];
						$mNSS = ($datosNssM[4] == "") ? "NSS_Generico M" : $datosNssM[4];
						if($nameAsp == $nameNssM && $apAsp == $apNssM && $amAsp == $amNssM){
							$result .= ','.$mNSS.'<br>';
							$banNss = true;
							$banExisteNss = true;
							break;
						}else{
							continue;
						}
					}//end recorrido archivo matutino
					if($banNss){
						break;
					}else{
						continue;
					}
				}//end for recorrido matutinos
				if(!$banNss){//si no lo encontramos en los matutinos, buscamos en los vespertinos
					$banNss2 = false;
					for($b = 0; $b < count($nssV); $b++){
						$nssVes = file($nssV[$b]);
						$countNssV = 0; 
						foreach($nssMat as $linea_num => $lineaNssV){ //recorremos el archivo buscando al aspirante
							if($countNssV < 1){ $countNssV++; continue;}
							$lineaNssV = utf8_encode($lineaNssV);
							$datosNssV = explode(",", $lineaNssV);
							if(count($datosNssV) < 4) continue;
							$nameNssV = trim($datosNssV[3]);
							$nameNssVTmp = explode(" ", $nameNssV);
							$nameNssV1 = $nameNssVTmp[0];
							$apNssV = trim($datosNssV[1]);
							$apNssVTmp = explode(" ", $apNssV);
							$apNssV1 = $apNssVTmp[0];
							$amNssV = trim($datosNssV[2]);
							$amNssVTmp = explode(" ", $amNssV);
							$amNssV1 = $amNssVTmp[0];
							$vNSS = ($datosNssV[4] == "") ? "NSS_Generico V" : $datosNssV[4];
							if($nameAsp == $nameNssV && $apAsp == $apNssV && $amAsp == $amNssV){
								$result .= ','.$vNSS.'<br>';
								$banNss2 = true;
								$banExisteNss = true;
								break;
							}else{
								continue;
							}
						}//end recorrido archivo matutino
						if($banNss2){
							break;
						}else{
							continue;
						}
					}//end for recorrido matutinos
				}//end if recorrido vespertino
				if(!$banExisteNss) $result .= ',NSS_Generico X<br>'; 
			}//end else (si existe)
		}//end foreach GPEC
	}//end for gpec

	//echo $result;
	
?>