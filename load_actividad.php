<!DOCTYPE HTML>
<?php
include("getMuseos.php");
include("getObras.php");
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
?>
<html>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	
	
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
						echo " <h1> ".strtoupper($_SESSION['firt_name'])." &nbsp<a href='#'>".strtoupper($_SESSION['f_last_name']);
						if(!empty($_GET)){
								
								if(!empty($_GET['visit'])) echo " &nbsp&nbsp BIENVENIDO ";
								
							}
							
						echo "</a></h1>";
					
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
							<li><a href="index_user.php" class="button">Cerrar Sessión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2><img src="images/LOGO/LOGO.png"/></h2>
						<p>Confirmación de visitas.</p>
					</header>
					<!--<div class="row">
						<div class="col-12">-->
					<div class="row">
						<div class="col-12">

							<!-- Form -->
								<section class="box">
									<header>
									
									<?php
									//$publicado=0;
									if(!empty($_POST["nameAct"])){
										
									$tam = strlen($_POST["rsPintores"]);	
									$rs = substr($_POST["rsPintores"],0,$tam-1);
									
									$tam_o =strlen($_POST["rsObra"]);
									$rs_o = substr($_POST["rsObra"],0,$tam-1);
										
									$query="INSERT INTO actividad_profesor (id_actividad, nom_acti, coleccion, tipo, respuesta, publicado, codigo_pintor, imagenes,pregunta,codigo_profesor) VALUES (NULL, '".$_POST["nameAct"]."', '".$_POST['museum']."', 'foto', '".$_POST["respuesta"]."', '".$_POST["publicado"]."', '".$rs."', '".$rs_o."','".$_POST["pregunta"]."','".$_SESSION['id']."')";
									
									//echo $query;
									 $conexion->query($query);
									echo"<p><b>Se ha añadido una visita correctamente</b></p>";
									
									}else{
										echo"<p><b>No, se ha registrado la visita</b>&nbsp;(Quedan campos por rellenar)</p>";
									}
										
									?>
									
									</header>
									

									<hr />

								</section>

						</div>
					</div>

					<!--
						</div>
					</div>
					-->
				
					
					<?php
					mysqli_close($conexion);
					?>
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