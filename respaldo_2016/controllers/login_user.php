<?php
    session_start();
    include ('../config/conexion.php');
    $user = $_POST['inputUser'];
    $pass = $_POST['inputPass'];
    
    $sqlGetUser="SELECT id, user, pass, perfil_id FROM $tUser WHERE $tUser.user='$user' AND $tUser.pass='$pass' ";
    $resGetUser=$con->query($sqlGetUser);
    if($resGetUser->num_rows > 0){
        $rowGetUser=$resGetUser->fetch_assoc();
       
        $_SESSION['sessU'] = true;
				$_SESSION['userId'] = $rowGetUser['id'];
				$_SESSION['userName'] = $rowGetUser['user'];
        $_SESSION['perfil'] = $rowGetUser['perfil_id'];
        
        echo $_SESSION['perfil'];
        
    }
    else{
        $_SESSION['sessU']=false;
        //echo "Error en la consulta<br>".$con->error;
        echo "Usuario incorrecto";
    }
    
?>