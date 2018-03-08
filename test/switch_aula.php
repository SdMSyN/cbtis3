<?php 

	$countFichas = 782;
	$aulaExamen = 0;
			$countAula = 0;
			switch($countFichas){
				case ($countFichas >= 1 && $countFichas <= 50): $aulaExamen = 1; break;
				case ($countFichas >= 51 && $countFichas <= 100): $aulaExamen = 2; break;
				case ($countFichas >= 101 && $countFichas <= 150): $aulaExamen = 3; break;
				case ($countFichas >= 151 && $countFichas <= 200): $aulaExamen = 4; break;
				case ($countFichas >= 201 && $countFichas <= 250): $aulaExamen = 5; break;
				case ($countFichas >= 251 && $countFichas <= 300): $aulaExamen = 6; break;
				case ($countFichas >= 301 && $countFichas <= 350): $aulaExamen = 7; break;
				case ($countFichas >= 351 && $countFichas <= 400): $aulaExamen = 8; break;
				case ($countFichas >= 401 && $countFichas <= 450): $aulaExamen = 9; break;
				case ($countFichas >= 451 && $countFichas <= 501): $aulaExamen = 10; break;
				case ($countFichas >= 501 && $countFichas <= 550): $aulaExamen = 11; break;
				case ($countFichas >= 551 && $countFichas <= 600): $aulaExamen = 12; break;
				case ($countFichas >= 601 && $countFichas <= 650): $aulaExamen = 17; break;
				case ($countFichas >= 651 && $countFichas <= 700): $aulaExamen = 18; break;
				case ($countFichas >= 701 && $countFichas <= 750): $aulaExamen = 19; break;
				case ($countFichas >= 751 && $countFichas <= 800): $aulaExamen = 20; break;
			}
			echo $aulaExamen;

?>