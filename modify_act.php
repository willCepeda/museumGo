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
	$conexion = new mysqli($host_db, $user_db,$pass_db, $db_name);
	$conexion->set_charset("utf8");
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}

	  if(!empty($_GET)){
		  $query="select * from  actividad_profesor v where v.id_actividad='".$_GET['id']."'";
		  $result = $conexion->query($query);
		  $row = $result->fetch_assoc();
		  $act_nombre =comprueba($row['nom_acti']);
		 
		  $act_obra=comprueba($row['imagenes']);
		  $act_pregunta=comprueba($row['pregunta']);
		  $act_respuesta=comprueba($row['respuesta']);
		  
	  }
}else{
		
}
?>
<html>
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
										</ul>
										
									</li>
								</ul>
							</li>
							<li><a href="index_user.php" class="button">Cerrar Sesión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Modificar Actividad</h2>
						<p>Rellene los campos correctamente.</p>
					</header>
					<div class="row">
						<div class="col-12">

							
					<div class="row">
						<div class="col-12">

							<!-- Form -->
								<section class="box">
									<h4><b>Nombre de la Actividad:<b></h4>
									<form method="post" action="confirm_action_act.php">
										
										<div class="row gtr-uniform gtr-50">
											<div class="col-6 col-12-mobilep">
											<?php
												echo "<input type='text' name='name_act' id='name' value='".$act_nombre."' />";
											?>
											</div>
											<div class="col-6 col-12-mobilep">
											<?php
											
												echo"<input type='text' name='name_act_new' id='second_name' value=''  placeholder='Nuevo Nombre' />";
											
											?>
											</div>
											
											
											<div class="col-12">

											<!-- Gallery Painters -->
												<section class="box">
												<header>
													<p>Obras Seleccionadas</p>
												<header>	
													<div class="box alt">
													<div class="row gtr-50 gtr-uniform">
													<?php
											
											$porcion =explode(",",$act_obra);
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
											</div >
											
											
										
											<header>
											<p>Pregunta:</p>
											</header>
											<div class="col-12">
												<?php
												echo "<input type='text' name='pregunta' id='name' value='".$act_pregunta."' />";
										
												?>
											</div>
											
											<header>
											<p>Respuesta:</p>
											</header>
											<div class="col-12">
												<?php
												echo "<input type='text' name='respuesta' id='name' value='".$act_respuesta."' />";
										
												?>
											</div>
											
											
											<header>
											<p>Deseas realizar la operacion de:</p>
											</header>
											<div class="col-4 col-12-narrower">
												<input type="radio" id="priority-low" value="0" name="publicado" checked>
												<label for="priority-low">No publicar</label>
											</div>
											<div class="col-4 col-12-narrower">
												<input type="radio" id="priority-normal" value="1" name="publicado">
												<label for="priority-normal">Publicar</label>
											</div>
											<?php
											echo "<input type='hidden' id='id' name='id' value='".$_GET['id']."'>";
											?>
											
											
											<div class="col-12">
											<hr>
												<ul class="actions">
													<li><input type="submit" name="boton" id="actualiza" value="Actualizar Datos" /></li>
													<li><input type="submit" name="boton" id="elimina" value="Eliminar Actividad" class="alt" /></li>
												</ul>
											</div>
										</div>
									</form>

									<hr />
									
								</section>

						</div>
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