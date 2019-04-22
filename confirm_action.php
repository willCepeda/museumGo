<!DOCTYPE HTML>
<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";
session_start();
//$_SESSION['user'] = $_GET['user'];
//$_SESSION['pass'] = $_GET['pass'];

/*$_SESSION['firt_name'];
$_SESSION['second_name'];
$_SESSION['last_name'];
$_SESSION['second_last_n'];
*/

//echo "Hola ".$_SESSION['user'];
$conexion = new mysqli($host_db, $user_db,"", $db_name);
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}
$sql="";	
$msg_confirm ="";
$meta="";
if(!empty($_POST)){
	if($_POST['boton']=="Actualizar Datos"){
		
		$sql.= "UPDATE estudiantes SET ";
		
		if(!empty($_POST['new_password'])){
			
			$sql.="contrasenia = '".$_POST['new_password']."', ";
			
		}
		$sql.=" nombre = '".$_POST['first_name']." ".$_POST['second_name']."', apellidos = '".$_POST['first_lastname']." ".$_POST['second_lastname']."' WHERE estudiantes.usuario = '".$_SESSION['user']."';";
		
		
		
		$result = $conexion->query($sql);
		$msg_confirm ="Se han actualizado los datos correctamente!";
	}else if($_POST['boton']=="Eliminar Perfil"){
		$sql.="DELETE from estudiantes where id ='".$_SESSION['id']."'";
		$result = $conexion->query($sql);
		$meta="<meta http-equiv='refresh' content='1;URL=index_user.php'>";
		$msg_confirm ="Se ha eliminado correctamente ¡Hasta Pronto! ";
		
	}
	
}else{
	
	
	
}
?>
<html>
	<head>
		<title>Profile</title>
		<meta charset="utf-8" />
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
							<li><a href="my_student_profile.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Opciones</a>
								<ul>
									<li>
										<a href="#">Perfil</a>
										<ul>
										<?php
											echo "<li><a href='modify_user.php'>Modificar</a></li>";
											
											echo "<li><a href='modify_user.php'>Eliminar</a></li>";
											
											//<li><a href="#">Eliminar</a></li>
											
										?>	
										</ul>
									</li>
									<li>
									<a href="#">Visitas</a>
										<ul>
											<li><a href="visit_available.php">Disponibles</a></li>
											<li><a href="my_visit.php">Mis Visitas</a></li>
											
										</ul>
										
									</li>
									<!--<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									-->
									<li>
									<a href="#">Actividades</a>
										<ul>
											<li><a href="act_available.php">Disponibles</a></li>
											<li><a href="my_act.php">Mis Actividades</a></li>
											<li><a href="my_act_cal.php">Calificaciones</a></li>
										</ul>
										
									</li>
								</ul>
							</li>
							<li><a href="#" class="button">Cerrar Sessión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Opción Validada</h2>
						
					</header>
					<div class="row">
						<div class="col-12">

							
					<div class="row">
						<div class="col-12">

							<!-- Form -->
								<section class="box">
							
									<form method="post" action="#">
										
										<div class="row gtr-uniform gtr-50">
											
											<div class="col-12">
											
											<?php
											
											echo "<p style:text_align:center><b>".$msg_confirm."</b></p>";
											echo $meta;
											?>
											
											</div>
											
											
											
											<div class="col-12">
												<ul class="actions">
													
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