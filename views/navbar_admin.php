<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SRA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
						<li><a href="aspirantes.php">Aspirantes Generales</a></li>
						<li><a href="aspirantes_validados.php">Aspirantes Validados</a></li>
          </ul>
					
					<ul class="nav navbar-nav navbar-right">
						<?php
							$cadWelcome="";
							if(isset($_SESSION['sessU'])  AND $_SESSION['sessU'] == "true"){
								$cadWelcome.='<li><a href="#">Bienvenido '.$_SESSION['userName'].'</a></li>';
								$cadWelcome.= '<li><a href="../controllers/proc_destroy_login.php">Salir</a></li>';
							}else{
								$cadWelcome.='<li><a href="servesc_login.php">Iniciar Sesión</a></li>';
							}
							echo $cadWelcome;
						?>
					</ul>
        </div>
      </div>
    </nav>