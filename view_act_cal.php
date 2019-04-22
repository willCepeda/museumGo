<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";
$tb_name = "profesor";
session_start();

function comprueba($valor){
	
	$noticia = "Dato no disponible..";
	
	if(!empty($valor)){
		$noticia = $valor;
	}
	
	return $noticia;
}

function getEstado($vis_estado){
	$pub="";
	switch($vis_estado){
		case 1:
		
		$pub="<b>Publicado</b>";
		
		break;
		case 0:
		
		$pub="<b>No Publicado</b>";
		
		break;
		
	}
	
	return $pub;
	
}
if(!empty($_SESSION['pass']) && !empty($_SESSION['user'])){
	$conexion = new mysqli($host_db, $user_db,"", $db_name);
	$conexion->set_charset("utf8");
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}

	  if(!empty($_GET)){
		 
		//$query ="select a.nom_acti, a.imagenes, a.pregunta, h.respuesta_estudiante,h.id,a.respuesta,h.nota from hacer_actividad h, actividad_profesor a where h.id_actividad = a.id_actividad and h.id_profesor = '".$_SESSION['id']."' and a.id_actividad='".$_GET['id']."' and h.id='".$_GET['h']."'";
		 
		
		$query ="select e.nombre, a.nom_acti, a.imagenes, a.pregunta, h.respuesta_estudiante,h.id,a.respuesta,h.nota from hacer_actividad h, actividad_profesor a,estudiantes e  where h.id_actividad = a.id_actividad and h.id_profesor = '".$_SESSION['id']."' and a.id_actividad='".$_GET['id']."' and h.id='".$_GET['h']."' and e.id = h.id_estudiantes";
		 
		 $result = $conexion->query($query);
		  $row = $result->fetch_assoc();
		  
			$es_nom =$row['nombre'];
		  $act_id=$row['id'];
		  $act_nom=$row['nom_acti'];
		  $act_obras =$row['imagenes'];
		  $act_pregunta=$row['pregunta'];
		  $act_respuesta=$row['respuesta'];
		  $act_resp_es =$row['respuesta_estudiante'];
		  $act=$row['nota'];
	  }
}else{
		
}
?>
<html>
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function(){
  
  var boton_rut;
  
  boton_rut = $('#califi');
  
  boton_rut.on('click', function(){
    
     var valor_input, valor_rut;
	 var valor_nombre,nombre;
    valor_input = $('#cal');
    valor_rut = valor_input.val();
    
	
    if(valor_rut === ''){
      alert('No ha asignado ninguna obserevación, es importante');
	  return false;
    }
    
	 
  }); 
  
});
		
		</script>
	
	
	
	
	<head>
		<title>Profile</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		
		
		
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
				<!--Aquí se coloca el nombre del estudiante-->
				<?php
					if(!empty($_SESSION['firt_name'])){
						echo " <h1> ".strtoupper($_SESSION['firt_name'])." &nbsp<a href='#'>".strtoupper($_SESSION['f_last_name'])."</a></h1>";
					}else{
						
						echo"<h1><a href='#'>MUSEUM</a>GO</h1>";
						
					}
					
					?>
					<nav id="nav">
						<ul>
							<li><a href="my_teacher_profile.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Opciones</a>
								<ul>
									<li>
										<a href="#">Perfil</a>
										<ul>
										<?php
											
											echo "<li><a href='modify_teacher.php'>Modificar</a></li>";
											
											
										?>	
										</ul>
									</li>
										<li>
									<a href="#">Visitas</a>
										<ul>
											<li><a href="create_visit.php">Crear Visitas</a></li>
											<li><a href="pub_visit.php">Publicadas</a></li>
											<li><a href="nopub_visit.php">NO Publicadas</a></li>
											<li><a href="delete_visit.php">Eliminar Visitas</a></li>
										</ul>
										
									</li>
									<!--<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									-->
									
									<li>
									<a href="#">Actividad</a>
										<ul>
											<li><a href="create_act.php">Crear Actividad</a></li>
											<li><a href="pub_act.php">Publicadas</a></li>
											<li><a href="nopub_act.php">NO Publicadas</a></li>
											<li><a href="delete_act.php">Eliminar Actividad</a></li>
											<li><a href="cal_act.php">Calificar Actividad</a></li>
										</ul>
										
									</li>
								</ul>
							</li>
							<li><a href="index_user.php" class="button">Cerrar Sessión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2><img src="images/LOGO/LOGO.png"/></h2>
						<p>Ver actividad.</p>
					</header>
					<div class="row">
						<div class="col-12">

							<!-- Text -->
								<section class="box">
								<form method="post" action="upload_action_cal.php">
									<div class="row">
							<div class="col-12">
								<h4 align="center">Calificador de Actividades</h4>
								<?php
						
									//echo "<p>";
									
									echo "<header>
										<h4>Actividad: &nbsp;<b>". $act_nom."</b></h4>
										
										</header>";
									
									echo "<header>";
									echo "<p>Nombre del estudiante:&nbsp;&nbsp;<b> ".$es_nom."</b></p>";
									echo "</header>";
									echo "<header>";
									echo "<p><b>Opciones de obras:</b></p>";
								
									
									echo "</header>";
									
									//echo "</p>";
								
								?>
								
									<div class="col-12">
											<section class="box">
											
											
											<div class="box alt">
												<div class="row gtr-50 gtr-uniform" id="divAct">
											<?php
											
											$porcion =explode(",",$act_obras);
											$count = count($porcion);
											$ob="";
											for($i=0;$i < $count; $i++){
												
											$ob.="'".$porcion[$i]."',";	
												
											}
											$tam=strlen($ob);
											$rs = substr($ob,0,$tam-1);
											
											$query_="select * from obras o where o.id_obra IN(".$rs.")";
											$rsu =$conexion->query($query_); 
											
											$imprime ="";
											while($fila = $rsu->fetch_assoc()){
												
												$imprime.="<div class='col-4' align='center'><span class='image fit'><img src='".$fila['imagen']."' alt='".$fila['nombre']."'  width='50' height='300'/><br>";
					
												$imprime.="<p>".$fila['nombre']."</p>";
												$imprime.="</span></div>";
												
												
												
											}
											echo $imprime;
											
											?>
												</div>
											</div>

											
											</section>
											
											
											
											
											</div>
								
								

							</div>
							<?php
									
									echo "<div class='col-6 col-12-mobilep'>";
									
									
									echo "<header>";
									echo "<p><b>Pregunta:</b>&nbsp;".$act_pregunta."</p>";
									echo "<p><b>Respuesta:</b>&nbsp;".$act_respuesta."</p>";
									
									echo "</header>";
									
									
									echo "</div>";
									
									echo "<div class='col-6 col-12-mobilep'>";
									echo "<header>";
									if ($act=='0') $color = "FA370E";
									else $color = "1AEC27";
									
									echo "<p><b>Respuesta del estudiante:</b>&nbsp;".$act_resp_es."&nbsp;&nbsp; <b>Puntuación:</b>&nbsp;<strong style='color:#".$color."';><em > ". $act."</em></strong></p>";
									
									//echo "<input type='text' name='calificacion' id='cal' value='' placeholder='Aquí Calificación' />";
									echo "<textarea name='observacion' id='cal' placeholder='Añade aquí tú observación sobre el cuadro' rows='6'></textarea><header><p>-Importante rellenar este campo</p></header>";
									
									echo "</header>";
									echo "<div>";
										
									echo "
											<input type='hidden' id='id_act' name='id_act' value='".$act_id."'>";
								?>
								</div>

									
					</div>
					<div class="col-12">
											<hr>
											
											
													<input type="submit" class="button special" name="boton" id="califi" value="Calificar" />
													
											
												
						</div>
								</form>
								</section>

						</div>
						
					
				
					
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>