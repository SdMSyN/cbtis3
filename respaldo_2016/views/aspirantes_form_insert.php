<?php session_start(); ?>
<?php
	include ('header.php');
	include('../config/conexion.php');
	include('../config/variables.php');
?>

<title><?=$tit;?></title>
<meta name="author" content="Luigi Pérez Calzada (GianBros)" />
<meta name="description" content="Descripción de la página" />
<meta name="keywords" content="etiqueta1, etiqueta2, etiqueta3" />
<?php
	include ('navbar.php');
	include ('navbar_admin.php');
	
	include ('navbar.php');
	if (!isset($_SESSION['sessU'])){
		echo '<div class="row><div class="col-sm-12 text-center"><h2>No tienes permiso para entrar a esta sección</h2></div></div>';
	}else {
	
?>

	<div class="container">
			<h1 class="page-header">Aspirantes</h1>
			<div class="col-sm-12 msg"></div>
			<form id="formAddReg" name="formAddReg" method="POST" >
				<div class="modal-body">
				<!-- contenido documento -->
				<?php
					$arrName=array("No.","Plantel","CCT","Ficha","Nombre", "Apellido paterno", "Apellido Materno", "CURP","Beca Prospera","Prospera Folio","Otra beca","Fecha de nacimiento","Sexo","Estado Civil","ID Estado","Estado Radicación","ID Municipio","Municipio radicación","ID Localidad","Localidad radicación","Domicilio","Colonia","CP","Teléfono","Email","Nombre Tutor","CURP Tutor","Grado Tutor","Ocupación del tutor","Escuela de procedencia","CCT Escuela de procedencia","Ciclo Escolar de Egreso","Estado Escuela Procedencia","Municipio Escuela Procedencia","Tipo de Escuela","Especialidad 1","Especialidad 2","Especialidad 3","Especialidad 4","Especialidad 5","ID","Validación de Ficha","Ficha Interna","Documentación","Aprobado por","VSE","VSEH","Horario Examen","Aula Examen");
					$arrInputName=array("No","Plantel","Cct","Ficha","Nombre","Ap","Am","Curp","prospera_beca","prospera_folio","otra_beca","fecha_nacimiento","sexo","estado_civil","id_estado","estado_radicacion","id_municipio","municipio_radicacion","id_localidad","localidad_radicacion","domicilio","colonia","cp","telefono","email","tutor_nombre","tutor_curp","tutor_grado","tutor_ocupacion","escuela_procedencia","cct_escuela_procedencia","ciclo_escolar_egreso","estado_escuela_procedencia","municipio_escuela_procedencia","tipo_escuela","especialidad_1","especialidad_2","especialidad_3","especialidad_4","especialidad_5","Id","validacion_ficha","ficha_interna","documentacion","aprobado_por","vse","vseH","horario_exam","aula_exam");
					$arrTypeInput=array("text","text","text","text","text","text","text","text", "text", "text", "text", "date", "text", "text", "text", "text", "text", "text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text");
					
					// Recorremos la información del usuario
					$data='';
					for($i=0; $i<count($arrName); $i++){
						$data.='<div class="form-group">';
							$data.='<label for="input'.$arrInputName[$i].'" >'.$arrName[$i].'</label>';
							if($arrInputName[$i] == "Plantel") $data.='<input type="'.$arrTypeInput[$i].'" class="form-control" id="input'.$arrInputName[$i].'" name="input'.$arrInputName[$i].'" readonly value="CBTIS 003 - TLAXCALA">';
							else if($arrInputName[$i] == "Cct") $data.='<input type="'.$arrTypeInput[$i].'" class="form-control" id="input'.$arrInputName[$i].'" name="input'.$arrInputName[$i].'" readonly value="29DCT0144I">';
							else if($arrInputName[$i] == "estado_civil") $data.='<input type="'.$arrTypeInput[$i].'" class="form-control" id="input'.$arrInputName[$i].'" name="input'.$arrInputName[$i].'" readonly value="SOLTERO(A)">';
							else if($arrInputName[$i] == "id_estado") $data.='<input type="'.$arrTypeInput[$i].'" class="form-control" id="input'.$arrInputName[$i].'" name="input'.$arrInputName[$i].'" readonly value="29">';
							else if($arrInputName[$i] == "estado_radicacion") $data.='<input type="'.$arrTypeInput[$i].'" class="form-control" id="input'.$arrInputName[$i].'" name="input'.$arrInputName[$i].'" readonly value="TLAXCALA">';
							else if($arrInputName[$i] == "estado_escuela_procedencia") $data.='<input type="'.$arrTypeInput[$i].'" class="form-control" id="input'.$arrInputName[$i].'" name="input'.$arrInputName[$i].'" readonly value="Tlaxcala">';
							else if($arrInputName[$i] == "Id" || $arrInputName[$i] == "validacion_ficha" || $arrInputName[$i] == "ficha_interna" || $arrInputName[$i] == "documentacion" || $arrInputName[$i] == "aprobado_por" || $arrInputName[$i] == "vse" || $arrInputName[$i] == "vseH" || $arrInputName[$i] == "horario_exam" || $arrInputName[$i] == "aula_exam") $data.='<input type="'.$arrTypeInput[$i].'" class="form-control" id="input'.$arrInputName[$i].'" name="input'.$arrInputName[$i].'" readonly >';
							
							else $data.='<input type="'.$arrTypeInput[$i].'" class="form-control" id="input'.$arrInputName[$i].'" name="input'.$arrInputName[$i].'" >';
						$data.='</div>';
					}

					echo $data;
				?>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary enviar">Añadir</button>
				</div>
			</form>
			
	</div>


	<script type="text/javascript">
		$(document).ready(function(){

		
			$("#formAddReg .enviar").click(function(){
            //alert("Hope");
                $.ajax({
                    type: 'POST',
                    url: '../controllers/insert_new_aspirante.php',
                    data: $('form#formAddReg').serialize(),
                    success: function(msg){
                        alert(msg);
                        if (msg == "true") {
                            $('.msg').css({color: "#77DD77"});
                            $('.msg').html("Se añadio con éxito.");
                                setTimeout(function () {
                                  location.href = 'aspirantes_form_insert.php';
                                }, 3000);
                        } else {
                            $('.msg').css({color: "#FF0000"});
                            $('.msg').html(msg);
                        }
                    }
								});
        });
				
		});
	</script>
<?php
	} // end if sessión
	include ('footer.php');
?>