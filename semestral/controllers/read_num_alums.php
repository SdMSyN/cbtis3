<?php

    include('../config/conexion.php');
    include('../config/variables.php');

    $msgErr = '';
    $ban = false;
    
    $sqlGetNums = "SELECT COUNT(*) as number FROM $tAlums ";
    // Ordenar por
    $turn = $_POST['turno'];
    $sem = $_POST['sem'];
    $esp = $_POST['esp'];
    $sex = $_POST['sex'];
    $sqlGetNums .= ($turn != '' || $sem != '' || $esp != '' || $sex != '' ) ? " WHERE 1=1 " : "";
    $sqlGetNums .= ($turn != '') ? "AND turno='$turn' " : "";
    $sqlGetNums .= ($sem != '') ? "AND semestre='$sem' " : "";
    $sqlGetNums .= ($esp != '') ? " AND carrera='$esp' " : "";
    $sqlGetNums .= ($sex != '') ? "AND  sexo='$sex' " : "";
                
    //Ordenar ASC y DESC
    $vorder = (isset($_POST['orderby'])) ? $_POST['orderby'] : "";
    if($vorder != ''){
        $sqlGetNums .= " ORDER BY ".$vorder;
    }
                
    $resGetNums = $con->query($sqlGetNums);
    if($resGetNums -> num_rows > 0){
        $rowGetNums = $resGetNums->fetch_assoc();
        $number = $rowGetNums['number'];
        $ban = true;
    }else{
        $ban = false;
        $msgErr = 'No existen niveles   （┬┬＿┬┬） '.$con->error;
    }
    
    if($ban){
        echo json_encode(array("error"=>0, "dataRes"=>$number));
    }else{
        echo json_encode(array("error"=>1, "msgErr"=>$msgErr));
    }

?>