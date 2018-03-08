<?php
	include ('header.php');
	include('../config/variables.php');
?>

<title><?=$tit;?></title>
<meta name="author" content="Luigi Pérez Calzada (GianBros)" />
<meta name="description" content="Sistema de Ficha del Centro de Estudios Tecnologicos Industrial y de Servicios No. 3, Tlaxcala por la empresa Softlutions." />
<meta name="keywords" content="etiqueta1, etiqueta2, etiqueta3" />
<link href="../assets/css/login.css" rel="stylesheet">
<?php
	include ('navbar.php');
?>

	<div class="container">
		<h1 class="text-center">Sistema Fichas CBTis 03, 2017</h1>
		<div class="row">
			<div class="col-sm-12">
				<form class="form-signin" method="POST" id="formFicha">
					<h2 class="form-signin-heading">Busca con tu ficha</h2>
					<!--<div class="text-center"><img src="assets/obj/carousel_0.jpg" alt="" width="75%" class="img-rounded"/></div>-->
					<div class="col-sm-12 msgFicha"></div>
					<label for="inputFicha" class="sr-only">Usuario</label>
					<input type="text" id="inputFicha" name="inputFicha" class="form-control" placeholder="TLXEMS17/######" >
					<button class="btn btn-lg btn-primary btn-block" type="submit">Buscar ficha</button>
				</form>
			</div>
		</div>
		<h5 style="color: #FF0000;" class="text-center">Presentarse en el plantel para validación de documentos y examen los días y horarios señalados en la ficha. <br>Favor de cumplir con fecha y hora señalada</h5>
		<hr size="2px" color="black">
		<div class="row">
			<div class="col-sm-12">
				<form class="form-signin" method="POST" id="formName">
					<h2 class="form-signin-heading">Busca con tu nombre</h2>
					<!--<div class="text-center"><img src="assets/obj/carousel_0.jpg" alt="" width="75%" class="img-rounded"/></div>-->
					<div class="col-sm-12 msgName"></div>
					<label for="inputName" class="sr-only">Usuario</label>
					<input type="text" id="inputName" name="inputName" class="form-control" placeholder="Nombre" >
					<label for="inputAP" class="sr-only">Apellido paterno</label>
					<input type="text" id="inputAP" name="inputAP" class="form-control" placeholder="Apellido paterno" >
					<button class="btn btn-lg btn-primary btn-block" type="submit">Buscar nombre</button>
				</form>
			</div>
		</div>
		<h3 class="text-center">Servicios Escolares CBTis 03</h3>
		<!-- <div class="row">
			<div class="col-sm-12">
				<blockquote><p class="text-danger"><b>Nota: </b>Por problemas técnicos generados en la base de datos de la USET, se extiende el periodo de validación y pagos hasta el día 10 de mayo del año en curso.</p></blockquote>
				<p class="text-center">ATENTAMENTE<br>CBTis 03, Tlaxcala, Tlax.</p>
				<p class="text-center"><img src="../assets/obj/dgeti.png" class=""></p>
			</div>
		</div> -->

	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#formFicha').validate({
				rules: {
					inputFicha: {required: true, regx: /^T{1}L{1}X{1}E{1}M{1}S{1}1{1}7{1}\/{1}\d{6}$/ }
				},
				messages: {
					inputFicha:{ 
						required: "Número de ficha obligatorio",
						regx: "Formato de ficha incorrecto"
					}
				},
				tooltip_options: {
					inputFicha: {trigger: "focus", placement: 'right'}
				},
				beforeSend: function(){
					$('.msgFicha').html('loading...');
				},
				submitHandler: function (form) {
					$.ajax({
						type: "POST",
						url: "../controllers/search_ficha.php",
						data: $('form#formFicha').serialize(),
						success: function (msg) {
							//alert(msg);
							var msg=jQuery.parseJSON(msg);
							if(msg.error == 0){ //éxito
								location.href = "ficha.php?id=" + msg.curp;
							} else {
								$('.msgFicha').css({color: "#FF0000"});
								$('.msgFicha').html(msg.msgErr);
							}
						},
						error: function () {
							alert("Error al buscar nombre del usuario");
						}		
					});
				}
			});
			//Añadimos función para validar patrón
			$.validator.addMethod("regx", function(value, element, regexpr) {          
				return regexpr.test(value);
			}, "Please enter a valid pasword.");


			$('#formName').validate({
				rules: {
					inputName: {required: true},
					inputAP: {required: true}
				},
				messages: {
					inputName: "Nombre obligatorio",
					inputAP: "Apellido paterno obligatoria"
				},
				tooltip_options: {
					inputName: {trigger: "focus", placement: 'right'},
					inputAP: {trigger: "focus", placement: 'right'}
				},
				beforeSend: function(){
					$('.msgName').html('loading...');
				},
				submitHandler: function (form) {
					$.ajax({
						type: "POST",
						url: "../controllers/search_name.php",
						data: $('form#formName').serialize(),
						success: function (msg) {
							//alert(msg);
							var msg=jQuery.parseJSON(msg);
							if(msg.error == 0){ //éxito
								location.href = "ficha.php?id=" + msg.curp;
							} else {
								$('.msgName').css({color: "#FF0000"});
								$('.msgName').html(msg.msgErr);
							}
						},
						error: function () {
							alert("Error al buscar nombre del usuario");
						}		
					});
				}
			});
		});
	</script>
<?php
	include ('footer.php');
?>