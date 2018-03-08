<!DOCTYPE html>
<html>
	<head>
        <title>huguidugui.wordpress.com</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	</head>
	<body>
        <div class="wrap">
            <header id="head_main">
                Generar gafetes/credenciales de registro en la BD
            </header>
            
			<section id="principal">
				<div id="info">
					Ya tenemos una base de datos con información de los usuarios:
					<ul>
						<li>Nombre</li>
						<li>Email</li>
						<li>Edad</li>
						<li>La ruta guardada de su imagen</li>
					</ul>
					Al clickar en el botón de generar gafetes, en una pestaña nueva
					se abre el PDF con los gafetes de todos los registrados en la BD
				</div>
				<div id="formulario">
					<form id="boton" action="php/pdf/gafetes.php" method="post" target="_blank">
						<button type="submit" >Generar gafetes</button>
					</form>
				</div>
			</section> 
			
		</div>
	</body>
</html>
