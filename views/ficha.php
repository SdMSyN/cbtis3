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
	
	$curp = $_GET['id'];
	$cadData = '';
	$sqlGetInfoUser = "SELECT ficha, Nombre, Ap, Am, Curp, fecha_nacimiento, sexo FROM $tAsp WHERE curp='$curp' ";
	$resGetInfoUser = $con->query($sqlGetInfoUser);
	$ban = true;
	if($resGetInfoUser->num_rows > 0){
		$rowGetInfoUser = $resGetInfoUser->fetch_assoc();
		$msgWelcome = ($rowGetInfoUser['sexo']=="MASCULINO") ? "Bienvenido " : "Bienvenida ";
		$msgWelcome .= $rowGetInfoUser['Nombre'];
	}else{
		$cadData = "De alguna manera lograste entrar, pero no existes en el Sistema.";
		$ban = false;
	}
	
?>

<?php if($ban){ ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12"><h3>Hola <?= $msgWelcome; ?></h3><h4>¿Eres tu?</h4></div>
			<div class="col-sm-12">
				<p>Comprueba que tus datos sean correctos, de ser correctos por favor imprime tu ficha interna del Centro de Bachillerato Tecnologico Indistrial y de Servicios No. 3, con esta ficha interna, la ficha de la USET y tu boucher de pago, podrás presentarte en las oficinas de Servicios Escolares para continuar con tu tramite, para poder presentar el examen.</p>
			</div>
			<div class="col-sm-12">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputName" disabled value="<?= $rowGetInfoUser['Nombre']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Apellido paterno</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputName" disabled value="<?= $rowGetInfoUser['Ap']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Apellido materno</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputName" disabled value="<?= $rowGetInfoUser['Am']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">CURP</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputName" disabled value="<?= $rowGetInfoUser['Curp']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Fecha de nacimiento</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputName" disabled value="<?= $rowGetInfoUser['fecha_nacimiento']; ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<a href="print_ficha.php?curp=<?= $rowGetInfoUser['Curp']; ?>" class="btn btn-primary">Imprimir <span class="glyphicon glyphicon-print"></span></a>
							<a href="index.php" class="btn btn-default">Regresar <span class="glyphicon glyphicon-home"></span></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php 
} //end if
else{
	echo '<div class="container"><div class="row"><div class="col-sm-12"><h1>'.$cadData.'</h1></div></div></div>';
}
?>
	<script type="text/javascript">
		$(document).ready(function(){

		});
	</script>
<?php
	include ('footer.php');
?>