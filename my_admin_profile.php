<!DOCTYPE HTML>
<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";
session_start();

if(!empty($_SESSION['pass']) && !empty($_SESSION['user'])){
	$conexion = new mysqli($host_db, $user_db,"", $db_name);
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}
	
	$sql="SELECT * FROM administradores where usuario='".$_SESSION['user']."' and contrasenia='".$_SESSION['pass']."'";
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
							<li><a href="my_admin_profile.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Opciones</a>
								<ul>
									<li>
										<a href="#">Perfil</a>
										<ul>
										<?php
											echo "<li><a href='modify_user_admin.php'>Modificar</a></li>";
											
											echo "<li><a href='modify_user_admin.php'>Eliminar</a></li>";
											
										?>	
										</ul>
									</li>
									<li>
									<a href="#">Activar</a>
										<ul>
											<li><a href="activate_teacher.php">Profesor</a></li>
										</ul>
										
									</li>
									
									<li>
									<a href="#">Eliminar</a>
										<ul>
											<li><a href="delete_teacher.php">Profesor</a></li>
											<li><a href="delete_students.php">Estudiantes</a></li>
										</ul>
										
									</li>
									
									<li>
									<a href="#">Modificar</a>
										<ul>
											<li><a href="modifyAdmin_teacher.php">Perfil. Profesor</a></li>
											<li><a href="modifyAdmin_students.php">Perfil. Estudiantes</a></li>
										</ul>
										
									</li>
								
									<li>
									<a href="#">ActualizarBD</a>
										<ul>
											<li><a href="updateAdmin_museum.php">Añadir Museos</a></li>
											<li><a href="updateAdmin_obras.php">Añadir Obras</a></li>
											<li><a href="updateAdmin_pintores.php">Actualizar Pintores</a></li>
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
						<p>Todo un mundo por explorar.</p>
					</header>
					<div class="row">
						<div class="col-12">

							<!-- Text -->
								<section class="box">
									<h3>Maneras de utilizar la aplicación</h3>
									<p>
									Esta aplicación trata de que el administrador puedan llevar a cabo su gestión de los usuarios que van a manejar la aplicación. 
									
									</p>
									<!--
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									-->
									<hr />

									<header>
										<h3>Opciones</h3>
										<p>El administrador tiene estas funcionalidades que le seran de utilidad para el correcto manejo de la aplicación:</p>
										<ul>
										<li>Eliminar usuarios (profesor, estudiantes)</li>
										<li>Cargar script con los museos del repositorio</li>
										<li>Cargar obras de arte de los museos del repositorio</li>
										<li>Cargar pintores</li>
										</ul>
										
									</header>

									

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