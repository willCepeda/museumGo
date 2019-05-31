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
		  $query="select m.nombre,m.imagen,v.codigo_pintor,v.codigo_obra,v.comentarios,v.publicado,v.nombre_visita 
		  from museos m, visitas_profesor v where m.codigo = v.codigo_museo and v.id_visita='".$_GET['id']."'";
		  $result = $conexion->query($query);
		  $row = $result->fetch_assoc();
		  
		  $mus_img=comprueba($row['imagen']);
		  $mus_nom=comprueba($row['nombre']);
		  $vis_nombre =comprueba($row['nombre_visita']);
		  $vis_pint=comprueba($row['codigo_pintor']);
		  $vis_obra=comprueba($row['codigo_obra']);
		  $vis_comentario=comprueba($row['comentarios']);
		  $vis_estado=comprueba($row['publicado']);
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
											//echo "<li><a href='modify_teacher.php?user=".$_SESSION['user']."'>Modificar</a></li>";
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
							<li><a href="index_user.php" class="button">Cerrar Sesión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2><img src="images/LOGO/LOGO.png"/></h2>
						<p>Ver visitas.</p>
					</header>
					<div class="row">
						<div class="col-12">

							<!-- Text -->
								<section class="box">
									<div class="row">
							<div class="col-12">
								<h4>Observador de Vistas</h4>
								<?php
						
									echo "<p><span class='image left'><img src='".$mus_img."' alt='' width='560' height='500'/></span>";
									echo "<header>";
									
									echo "<p><b>Lugar: &nbsp;</b>".$mus_nom."</p>";
									echo "</header>";
									echo "<header>
										<h4>Nomre de la visita: &nbsp;<b>". $vis_nombre."</b></h4>
										<p>Estado: ". getEstado($vis_estado)."</p>
										</header>";
									echo "<header>";
									echo "<p><b>Obras a vistar:</b>&nbsp;".$vis_obra."</p>";
									echo "<p><b>Pintores relacionados:</b>&nbsp;". $vis_pint."</p>";
									echo "<p><b>comentarios:</b>&nbsp;".$vis_comentario."</p>";
									echo "</header>";
									
									echo "</p>";
								?>
									
							

							</div>
								</div>


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