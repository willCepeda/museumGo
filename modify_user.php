<!DOCTYPE HTML>
<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";
$tb_name = "profesor";
session_start();

if(!empty($_SESSION['user'])){
	$conexion = new mysqli($host_db, $user_db,$pass_db, $db_name);
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}
	
	$sql="SELECT * FROM estudiantes where usuario='".$_SESSION['user']."'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();
	$row_name =$row['nombre'];
	$row_last_name = $row['apellidos'];
	$oneName = explode(" ",$row_name);
	$_SESSION['firt_name'] = $oneName[0];
	$_SESSION['second_name'] = $oneName[1];
	$oneLastName = explode(" ",$row_last_name);
	$_SESSION['f_last_name']=$oneLastName[0];
	$_SESSION['s_last_name']=$oneLastName[1];
	$row_password =  $row['contrasenia'];
	$_SESSION['id']=$row['id'];
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
							<li><a href="index_user.php" class="button">Cerrar Sesión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Modificar Perfil</h2>
						<p>Rellene los campos correctamente.</p>
					</header>
					<div class="row">
						<div class="col-12">

							
					<div class="row">
						<div class="col-12">

							<!-- Form -->
								<section class="box">
									<h4><b>Nombres:<b></h4>
									<form method="post" action="confirm_action.php">
										
										<div class="row gtr-uniform gtr-50">
											<div class="col-6 col-12-mobilep">
											<?php
												echo "<input type='text' name='first_name' id='name' value='".$oneName[0]."' />";
											?>
											</div>
											<div class="col-6 col-12-mobilep">
											<?php
											
												echo"<input type='text' name='second_name' id='second_name' value='".$oneName[1]."'  />";
											
											?>
											</div>
											<p><b>Apellidos:</b></p>
											<div class="row gtr-uniform gtr-50">
											<div class="col-6 col-12-mobilep">
											<?php
												echo "<input type='text' name='first_lastname' id='name' value='".$oneLastName[0]."' />";
											?>
											</div>
											<div class="col-6 col-12-mobilep">
											<?php
											
												echo"<input type='text' name='second_lastname' id='second_name' value='".$oneLastName[1]."'  />";
											
											?>
											</div>
											</div>
											
											<div class="row gtr-uniform gtr-50">
											<p><b>Contraseña Actual:</b></p>
												<div class="col-6 col-12-mobilep">
													<?php
													
													echo"<input type='text' name='current_pass' id='second_name' value='".$row_password."'  />";
													?>
												</div>
												<div class="col-6 col-12-mobilep">
												<?php
												echo"<input type='text' name='new_password' id='second_name' value=''  placeholder='Nueva Contraseña' />";
												
												?>
												</div>
											</div>
											
											
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" name="boton" id="actualiza" value="Actualizar Datos" /></li>
													<li><input type="submit" name="boton" id="elimina" value="Eliminar Perfil" class="alt" /></li>
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