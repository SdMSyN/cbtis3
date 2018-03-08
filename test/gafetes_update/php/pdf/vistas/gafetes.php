<?php
	require_once'../myDBC.php';
	$obj = new myDBC();
	
	$numero_registros = $obj->contar_registros();
	$registros = $obj->seleccionar_datos();
?>
<style>
<!--
#encabezado {padding:10px 0; margin-bottom: 20px; border-top: 1px solid; border-bottom: 1px solid; width:100%;}
#encabezado .fila #columna {text-align:center; width: 100%}

.contenedor0 {margin-top: 30px; border:1px solid #666;  width:50%;}
.left0 {  border:1px solid #fff; width: 40%;}
.right0 { width: 60%;}
.down0 {text-align:center; width: 100%;}

.contenedor1 {border:1px solid #666; position:absolute; top:30px; left: 250px; margin-left:120px;  width:50%;}
.left1 { border:1px solid #fff;  width: 40%;}
.right1 { width: 60%;}
.down1 { width: 100%;}


.contenedor2 {border:1px solid #666; position:absolute; top:500px; margin-top: 40px;  width:50%;}
.left2 { border:1px solid #fff;  width: 40%;}
.right2 { width: 60%;}
.down2 { width: 100%;}


.contenedor3 {border:1px solid #666; position:absolute; top:500px; margin-top: 40px; left: 250px; margin-left:120px; width:50%;}
.left3 {  border:1px solid #fff; width: 40%;}
.right3 { width: 60%;}
.down3 { width: 100%;}

.foto {border:1px solid; height:90px; width:100px; text-align:center}
.recuadro {border:1px solid; padding:5px 0; margin:5px 0; text-align:center;}
-->
</style>

<!-- page define la hoja con los márgenes señalados -->
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="20mm">
   
    
    <?php
    //Posición de cada gafete. Ver imagen de posiciones
    $posicion = 0;
 
	//Se itera por todos los registros
    for($i = 0; $i < $numero_registros; $i++)
    {	
		//posición comienza en cero
		//Y entra en el primer case del switch
        switch($posicion)
        {
			case 0:?>
			<table class="contenedor0">
			  <tr>
				<td class="left0">
					<div class="foto">
						<img style=" width:100%" src="../../<?php echo $registros[$i]["ruta"];?>">
					</div>
				</td>
				<td class="right0">
					<div>Nombre:</div>
					<div class="recuadro"><?php echo $registros[$i]["nombre"];?></div>
					<div>Mail:</div>
					<div class="recuadro" ><?php echo $registros[$i]["email"];?></div>
					<div>Edad:</div>
					<div class="recuadro"><?php echo $registros[$i]["edad"];?></div>
				</td>
			  </tr>
			  <tr>
				<td class="down0" colspan="2">
					<img style="width:100%;" src="../../imagenes/expo.jpg">
				</td>
			  </tr>
			</table>
			
			<?php $posicion++; break; //Aquí posición vale 1
			case 1: ?>
				<table class="contenedor1">
			  <tr>
				<td class="left1">
					<div class="foto">
						<img style=" width:100%" src="../../<?php echo $registros[$i]["ruta"];?>">
					</div>
				</td>
				<td class="right1">
					<div>Nombre:</div>
					<div class="recuadro"><?php echo $registros[$i]["nombre"];?></div>
					<div>Mail:</div>
					<div class="recuadro" ><?php echo $registros[$i]["email"];?></div>
					<div>Edad:</div>
					<div class="recuadro"><?php echo $registros[$i]["edad"];?></div>
				</td>
			  </tr>
			  <tr>
				<td class="down1" colspan="2">
					<img style="width:100%;" src="../../imagenes/expo.jpg">
				</td>
			  </tr>
			</table>
			<?php $posicion++; break; //Aquí posición vale 2
			case 2: ?>
			<table class="contenedor2">
			  <tr>
				<td class="left2">
					<div class="foto">
						<img style=" width:100%" src="../../<?php echo $registros[$i]["ruta"];?>">
					</div>
				</td>
				<td class="right2">
					<div>Nombre:</div>
					<div class="recuadro"><?php echo $registros[$i]["nombre"];?></div>
					<div>Mail:</div>
					<div class="recuadro" ><?php echo $registros[$i]["email"];?></div>
					<div>Edad:</div>
					<div class="recuadro"><?php echo $registros[$i]["edad"];?></div>
				</td>
			  </tr>
			  <tr>
				<td class="down2" colspan="2">
					<img style="width:100%;" src="../../imagenes/expo.jpg">
				</td>
			  </tr>
			</table>
			<?php $posicion++; break; //Aquí posición vale 3
			case 3: 
				$posicion = 0; //Cuando llega a 3 se regresa al valor 0 para comenzar de nuevo?>
			<table class="contenedor3">
			  <tr>
				<td class="left3">
					<div class="foto">
						<img style=" width:100%" src="../../<?php echo $registros[$i]["ruta"];?>">
					</div>
				</td>
				<td class="right3">
					<div>Nombre:</div>
					<div class="recuadro"><?php echo $registros[$i]["nombre"];?></div>
					<div>Mail:</div>
					<div class="recuadro" ><?php echo $registros[$i]["email"];?></div>
					<div>Edad:</div>
					<div class="recuadro"><?php echo $registros[$i]["edad"];?></div>
				</td>
			  </tr>
			  <tr>
				<td class="down3" colspan="2">
					<img style="width:100%;" src="../../imagenes/expo.jpg">
				</td>
			  </tr>
			</table>
			<?php break;
			}// Fin switch
		
		} //Fin for?>
</page>
