<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";
session_start();

if(!empty($_SESSION['user'])){
	$conexion = new mysqli($host_db, $user_db,"", $db_name);
	$conexion->set_charset("utf8");
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}
	
}else{
	
	
	
}

function comprueba($valor){
	
	$noticia = "Dato no disponible..";
	
	if(!empty($valor)){
		$noticia = $valor;
	}
	
	return $noticia;
}


?>
<html>
<head>
		<title>Pdf</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<body class="is-preload">

	<div id="page-wrapper">
	<div  style="background-color:black">
	<h4 style="color:white">&nbsp;&nbsp;&nbsp;MUSEUM GO - &nbsp;&nbsp;&nbsp;Datos de la Visita. </h4>
	</div>
	<h2 align="center"><img  src="images/LOGO/LOGO.png"/></h2>
		
		<h3 ><em>Datos del Museo</em></h3>
		
	<?php
								$get_id=$_SESSION['id_visit'];
								$query ="select m.nombre, m.imagen,m.fecha_origen,v.comentarios,v.codigo_museo ,v.id_visita,v.nombre_visita,v.codigo_pintor,v.codigo_obra,p.nombre as nom_profe , v.codigo_profe from visitas_profesor v, museos m, profesor p where m.codigo = v.codigo_museo and p.id = v.codigo_profe and v.id_visita='".$get_id."'";
								$rs=$conexion->query($query);
								$row = $rs->fetch_assoc();
								
								$mus_nombre= comprueba($row['nombre']);
								$mus_image = comprueba($row['imagen']);
								$mus_create = comprueba($row['fecha_origen']);
								$mus_coment = comprueba($row['comentarios']);
								$mus_profe = comprueba($row['nom_profe']);
								$vis_nombre = comprueba($row['nombre_visita']);
								$vis_obra = comprueba($row['codigo_obra']);
								$vis_pint=comprueba($row['codigo_pintor']);
								$vis_cod_mus=comprueba($row['codigo_museo']);
								$vis_profe = $row['codigo_profe'];
								$vis_id = $row['id_visita'];
								$array_mes= array("01"=>"De Enero de",
												  "02"=>"De Febrero de",
												  "03"=>"De Marzo de",
												  "04"=>"De Abril de",
												  "05"=>"De Mayo de",
												  "06"=>"De Junio de",
												  "07"=>"De Julio de",
												  "08"=>"De Agosto de",
												  "09"=>"De Septiembre de",
												  "10"=>"De Octubre de",
												  "11"=>"De Noviembre de",
												  "12"=>"De Diciembre de",
								
								
								);
									
									echo "<h4><b>".$mus_nombre."</b></h4>";	
									
									if($mus_image=="Dato no disponible.."){
										echo "<p>".$mus_image."</p>";
									}else{
										
										$img = file_get_contents($mus_image);
										file_put_contents('download/imagen.jpg', $img);
										
										
										echo "<h2 align='center'><img  src='download\imagen.jpg' alt=''  height='300' width='450' /></h2>";
									}
									
									
									
									if($mus_create=="Dato no disponible.."){
									echo "<p >Este museo fue creado: ".$mus_create."</p>";
									
									}else{
										$fecha = explode("-",$mus_create);
										$dia = $fecha[2];
										$mes = $fecha[1];
										$anio = $fecha[0];
										echo "<p><span class='image left'>Este museo fue creado: ".$dia." ".$array_mes[$mes]." ".$anio."</span></p>";
										
									}
									
									echo "<h3 ><em><b>Datos de la Visita</b></em></h3>";
									echo "<p><b>Nombre: &nbsp;&nbsp; </b>".$vis_nombre."</p>";
									echo "<p><b>Pintores relacionados: &nbsp;&nbsp;</b>".$vis_pint."</p>";
									echo "<p><b>Obras a visitar:&nbsp;&nbsp;</b>".$vis_obra."</p>";
									echo "<div class='col-12'>";
									echo"<p>Instrucciones:</p><textarea name='comentario' id='message' cols='80'>&nbsp;&nbsp;".
												$mus_coment."
												</textarea>";
												
									echo"</div>";
									
									echo "<p><b>Profesor asignado: &nbsp;&nbsp;</b>".$mus_profe."</p>";
									$_SESSION['id_visit'] ="";
								?>
								
							
	
	
	
	</div>
	</body>
</html>