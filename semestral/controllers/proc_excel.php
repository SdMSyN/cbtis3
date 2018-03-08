<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../config/conexion.php');
include('../config/variables.php');

$excel = file('semestral_1_2016.csv');
$count = 0;
$msgErr = '';
$ban = true;
foreach ($excel as $alum => $linea) {
    $linea = utf8_encode($linea);
    $datos = explode(",", $linea);
    $count++;
    //echo $linea.'<br>';
    for ($i = 0; $i < count($datos); $i++) {
        //echo $datos[$i].'--';
        if (preg_match('/[Á|É|Í|Ó|Ú]+/', $datos[$i])) {
            $msgErr .= '<br><b>Error: El campo ' . $count . '-' . $i . ' no puede contener caracteres especiales.</b><br>';
            $ban = false;
            break;
        }
    }
}

$count = 0;
foreach ($excel as $alum2 => $linea2) {
    $linea2 = utf8_encode($linea2);
    $datos2 = explode(",", $linea2);
    $count++;
    if ($count == 1)
        continue;
    //if($count == 50) break;
    //echo $linea2.'<br>';
    //Buscamos si el alumno ya existe, si existe añadimos su materia, si no existe entonces creamos al alumno y su materia
    $noControl = $datos2[7];
    echo $noControl . '<br>';
    $sqlGetNoControl = "SELECT id FROM $tAlums WHERE no_control='$noControl' ";
    $resGetNoControl = $con->query($sqlGetNoControl);
    if ($resGetNoControl->num_rows > 0) {//existe ya el alumno
        $rowGetNoControl = $resGetNoControl->fetch_assoc();
        $idAlum = $rowGetNoControl['id'];
        $sqlInsertMat = "INSERT INTO $tMats (alumno_id, nombre_asignatura, semestre, parcial_1, parcial_2, parcial_3, calificacion, periodo, firmado, firma, asistencias_1, asistencias_2, asistencias_3, total_asistencias, tipo_acreditacion, creado, actualizado) VALUES ('$idAlum', '$datos2[12]', '$datos2[5]', '$datos2[13]','$datos2[14]','$datos2[15]','$datos2[16]','$datos2[17]','$datos2[18]','$datos2[19]','$datos2[20]','$datos2[21]','$datos2[22]','$datos2[23]','$datos2[24]','$dateNow','$dateNow')";
        if ($con->query($sqlInsertMat) === TRUE) {
            continue;
        } else {
            $msgErr .= 'Error: Al insertar materia del alumno, registro: ' . $count;
            $ban = false;
            break;
        }
    } else {//no existe el alumno, insertamos alumno y luego su materia
        $sqlInsertAlum = "INSERT INTO $tAlums "
                . "(clv_centro, plantel, carrera, generacion, turno, semestre, grupo, no_control, nombre, paterno, materno, curp, sexo, fecha_nac, creado, actualizado) "
                . "VALUES "
                . "('$datos2[0]', '$datos2[1]', '$datos2[2]', '$datos2[3]', '$datos2[4]', '$datos2[5]', '$datos2[6]', '$datos2[7]', '$datos2[8]', '$datos2[9]', '$datos2[10]', '$datos2[11]', '', '', '$dateNow', '$dateNow' ) ";
        if ($con->query($sqlInsertAlum) === TRUE) {
            $idAlum = $con->insert_id;
            $sqlInsertMat = "INSERT INTO $tMats (alumno_id, nombre_asignatura, semestre, parcial_1, parcial_2, parcial_3, calificacion, periodo, firmado, firma, asistencias_1, asistencias_2, asistencias_3, total_asistencias, tipo_acreditacion, creado, actualizado) VALUES ('$idAlum', '$datos2[12]', '$datos2[5]', '$datos2[13]','$datos2[14]','$datos2[15]','$datos2[16]','$datos2[17]','$datos2[18]','$datos2[19]','$datos2[20]','$datos2[21]','$datos2[22]','$datos2[23]','$datos2[24]','$dateNow','$dateNow')";
            if ($con->query($sqlInsertMat) === TRUE) {
                continue;
            } else {
                $msgErr .= 'Error: Al insertar materia del alumno, registro: ' . $count;
                $ban = false;
                break;
            }
        } else {
            $msgErr .= 'Error: Al insertar nuevo alumno, registro: ' . $count;
            $ban = false;
            break;
        }
    }
}

if ($ban) {
    echo '<br><h1>Éxito</h1>';
} else {
    echo $msgErr;
}
?>