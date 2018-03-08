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
		
	// Obtenemos información de datos relevantes
	$sqlGetInfoValidacionFichas = "SELECT validacion_ficha FROM $tAsp WHERE validacion_ficha=1 ";
	$resGetInfoValidacionFichas = $con->query($sqlGetInfoValidacionFichas);
	$infoValidacionFichas = $resGetInfoValidacionFichas->num_rows;
	// documentaciones aprobadas
	$sqlGetInfoDocumentaciones = "SELECT documentacion FROM $tAsp WHERE documentacion=1 ";
	$resGetInfoDocumentaciones = $con->query($sqlGetInfoDocumentaciones);
	$infoDocumentaciones = $resGetInfoDocumentaciones->num_rows;
	//Perfil de quien validará
	$perfil = $_SESSION['perfil'];
?>

	<div class="container">
			<h1 class="page-header">Aspirantes</h1>

					<div class="row">
						<div class="col-sm-12">
							<p>Número total de alumnos que han validado e impreso su ficha: <b><?= $infoValidacionFichas; ?></b><br>
							Número total de alumnos que han entregado su documentación en Control Escolar: <b><?= $infoDocumentaciones; ?></b>
							</p>
						</div>
          </div>
					
					<div class="row">
					 <form id="frm_filtro" method="post" action="" class="form-horizontal">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-4 control-label" for="nombre">Nombre</label>
									<div class="col-sm-8"><input type="text" class="form-control" name="nombre" id="nombre"></div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="ap">Apelido paterno</label>
									<div class="col-sm-8"><input type="text" class="form-control" name="ap" id="ap"></div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-4 control-label" for="uset">Pre-Ficha USET</label>
									<div class="col-sm-8"><input type="text" class="form-control" name="uset" id="uset"></div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="curp">CURP</label>
									<div class="col-sm-8"><input type="text" class="form-control" name="curp" id="curp"></div>
								</div>
							</div>
							<div class="col-sm-offset-5 col-sm-7">
							 <button type="button" id="btnfiltrar" class="btn btn-success">Filtrar <span class="glyphicon glyphicon-filter"></span></button>
							 <!-- <a href="javascript:;" id="btncancel" class="btn btn-default" disabled>Todos</a> -->
							 <a id="btncancelNO" class="btn btn-default" disabled>Todos</a>
							</div>
					</form>
					
					</div>
		
          <h2 class="sub-header">Lista de Aspirantes</h2>
					<p class="msg"></p>
          <div class="table-responsive">
            <table class="table table-striped" id="data">
              <thead>
                <tr>
                  <th>#</th>
                  <th><span title="Nombre">Nombre</span></th>
                  <th><span title="Ap">Apellido paterno</span></th>
                  <th><span title="Am">Apellido materno</span></th>
                  <!-- <th><span title="Curp">CURP</span></th> -->
                  <th><span title="Ficha">Pre-Ficha USET</span></th>
				  <th><span title="ficha_interna">Ficha CBTis 03</span></th>
				  <th><span title="aula_examen">Aula Examen</span></th>
                  <th>Imprimir Ficha</th>
                  <th>Documentación</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
	</div>


	<script type="text/javascript">
		var ordenar = '';
		$(document).ready(function(){
			//Ordenamiento
        //filtrar();
        function filtrar(){
            $.ajax({
                type: "POST",
                data: $("#frm_filtro").serialize()+ordenar,
                url: "../controllers/select_aspirantes_validados.php?action=listar",
                success: function(msg){
                    //$("#data tbody").empty();
                    $("#data tbody").html(msg);
                }
            });
        }
        
        //Ordenar ASC y DESC header tabla
        $("#data th span").click(function(){
            if($(this).hasClass("desc")){
                $("#data th span").removeClass("desc").removeClass("asc");
                $(this).addClass("asc");
                ordenar = "&orderby="+$(this).attr("title")+" asc";
            }else{
                $("#data th span").removeClass("desc").removeClass("asc");
                $(this).addClass("desc");
                ordenar = "&orderby="+$(this).attr("title")+" desc";
            }
            filtrar();
        });
        
        //Ordenar por formulario
        $("#btnfiltrar").click(function(){ 
			if($("#frm_filtro #nombre").val() != '') filtrar();
			else if($("#frm_filtro #ap").val() != '') filtrar();
			else if($("#frm_filtro #uset").val() != '') filtrar();
			else if($("#frm_filtro #curp").val() != '') filtrar();
			else
				alert("Debes introducir un dato al menos.,");
            //alert("y ahora?");
        });
        
        // boton cancelar
				$("#btncancel").click(function(){ 
						//$("#frm_filtro #calle").find("option[value='0']").attr("selected",true);
						$("#frm_filtro #nombre").val('');
						$("#frm_filtro #ap").val('');
						$("#frm_filtro #uset").val('');
						$("#frm_filtro #curp").val('');
						filtrar() 
				});
				
				$('#data').on("click", ".aprobarDocs", function(){
					var idAsp = $(this).data('id');
					//alert(idAsp+"--"+<?=$perfil;?>);
					if(confirm("¿Apruebas su documentación?") == true){
						$.ajax({
							type: 'POST',
							url: '../controllers/validar_documentos.php',
							data:{idAsp: idAsp, idV: <?= $perfil; ?>},
							success: function(msg){
								if(msg == "true"){
									$('.msg').css({color: "#0000FF"});
									$('.msg').html("Se aprobarón los documentos.");
									setTimeout(function(){
										location.href = 'aspirantes_validados.php';
									}, 3000);
								}else{
									$('.msg').css({color: "#FF0000"});
									$('.msg').html(msg);
								}
							}
						});
					} //end confirm
				})
				
		});
	</script>
<?php
	} // end if sessión
	include ('footer.php');
?>