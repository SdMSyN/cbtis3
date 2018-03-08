<?php
    include ('../config/conexion.php');
    include ('../config/variables.php');
    
    if($_GET['action'] == 'listar'){
        $sqlGetUsers = "SELECT id, Nombre, Ap, Am, Curp, Ficha, validacion_ficha, ficha_interna, documentacion FROM $tAsp  ";
        //$datos=array();
        //
        // Ordenar por
		$name = $_POST['nombre'];
		$ap = $_POST['ap'];
		$uset = $_POST['uset'];
		$curp = $_POST['curp'];
		$sqlGetUsers .= ($name != '' || $uset != '' || $curp != '' || $ap != '' ) ? " WHERE 1=1 " : "";
		$sqlGetUsers .= ($name != '') ? "AND Nombre LIKE '%$name%' " : "";
		$sqlGetUsers .= ($ap != '') ? "AND Ap LIKE '%$ap%' " : "";
		$sqlGetUsers .= ($uset != '') ? " AND Ficha LIKE '%$uset%' " : "";
		$sqlGetUsers .= ($curp != '') ? "AND  Curp LIKE '%$curp%' " : "";
		//$sqlGetUsers .= " 1=1 ";
        //if($est >= 0) $sqlGetCateories .= " WHERE activo='$est' ";
        
        //Ordenar ASC y DESC
		$vorder = (isset($_POST['orderby'])) ? $_POST['orderby'] : "";
		if($vorder != ''){
			$sqlGetUsers .= " ORDER BY ".$vorder;
		}
		
		if($name == '' && $uset == '' && $curp == '' && $ap == '') $sqlGetUsers .= " LIMIT 2000 ";
		else $sqlGetUsers .= " ";
		
        //echo $sqlGetUsers;
        //Ejecutamos query
        $resGetUsers = $con->query($sqlGetUsers);
        $datos = '';
        //$datos .= '<tr><td colspan="7">'.$sqlGetCateories.'</td></tr>';
		$i=0;
        while($rowGetUser = $resGetUsers->fetch_assoc()){
			$i++;
            $datos .= '<tr>';
            $idUser = $rowGetUser['id'];
						$datos .= '<td>'.$i.'</td>';
            $datos .= '<td>'.$rowGetUser['Nombre'].'</td>';
            $datos .= '<td>'.$rowGetUser['Ap'].'</td>';
            $datos .= '<td>'.$rowGetUser['Am'].'</td>';
            $datos .= '<td>'.$rowGetUser['Curp'].'</td>';
            $datos .= '<td>'.$rowGetUser['Ficha'].'</td>';
            $datos .= '<td>'.$rowGetUser['ficha_interna'].'</td>';
						$datos .= '<td><a href="print_ficha.php?curp='.$rowGetUser['Curp'].'"><span class="glyphicon glyphicon-print"></span></a></td>';
            if($rowGetUser['validacion_ficha'] == 0) 
							$datos .= '<td><button type="button" class="aprobarDocs btn" data-id="'.$rowGetUser['id'].'" disabled><span class="glyphicon glyphicon-th-list"></span></button></td>';
            else if($rowGetUser['validacion_ficha'] == 1 && $rowGetUser['documentacion'] == 0) 
							$datos .= '<td><button type="button" class="aprobarDocs btn btn-warning" data-id="'.$rowGetUser['id'].'" ><span class="glyphicon glyphicon-th-list"></span></button></td>';
            else if($rowGetUser['validacion_ficha'] == 1 && $rowGetUser['documentacion'] == 1) 
							$datos .= '<td><button type="button" class="aprobarDocs btn btn-success" data-id="'.$rowGetUser['id'].'" disabled><span class="glyphicon glyphicon-th-list"></span></button></td>';
						else
							$datos .= '<td><button type="button" class="aprobarDocs btn" data-id="'.$rowGetUser['id'].'" disabled><span class="glyphicon glyphicon-th-list"></span></button></td>';
			
            $datos .= '</tr>';
        }
        echo ($datos != "") ? $datos : "No hay coincidencias";
    }
    
?>
