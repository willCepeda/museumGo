<!DOCTYPE HTML>
<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";
$table_name ="";
session_start();
if(!empty($_POST['user']) && !empty($_POST['password'])){
	$conexion = new mysqli($host_db, $user_db,"", $db_name);
	$from_user = $_POST['user'];
	$from_password = $_POST['password'];
	
}else{
	$from_user ="";
	$from_password ="";
}
$sql =" ";
?>

<html>
	<head>
	
		<title>Log IN - Museum GO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Log IN</a> Museum GO</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Access</a>
								<ul>
									<li><a href="log_in.php">Log In</a></li>
									
								</ul>
							</li>
							<li><a href="sign_up.html" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Acceso a la Plataforma !</h2>
						<?php
									
								if(empty($from_user) && empty($from_password)){
								
						?>
						<p>Rellena los campos requeridos para acceder.</p>
						
						<?php
						
								}else{
									echo "<p>Bienvenido.</p>";
								}
						?>
					</header>
					<div class="box">
						<form method="post" action="log_in.php">
							<div class="row gtr-50 gtr-uniform">
								<?php
									
								if(empty($from_user) && empty($from_password)){
								
								?>
								<div class="col-6 col-12-mobilep">
									<input type="text" name="user" id="name" value="" placeholder="Usuario" />
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="password" name="password" id="" value="" placeholder="Contraseña" />
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" value="Iniciar Sesión" /></li>
									</ul>
								</div>
								<div class="col-12">
								<?php
								}else{
									
									//$sql="SELECT * FROM estudiantes where usuario='".$from_user."' and contrasenia='".$from_password."'";
									$sql ="SELECT * from estudiantes where usuario='".$from_user."' and contrasenia='".$from_password."'";
									
									$result = $conexion->query($sql);

									$count = mysqli_num_rows($result);
									if($count == 1){
										//Hay que redirigirlo al perfil de estudiantes
										echo "<b>Cargando área personal..</b><br>";
										echo"<p><img style:'margin:auto;text-align: center;' src='images/ajax-loader.gif'/></p>";
										//echo"<meta http-equiv='refresh' content='1;URL=my_student_profile.php?user=".$from_user."&pass=".$from_password."'>";
										echo"<meta http-equiv='refresh' content='1;URL=my_student_profile.php?visit=1'>";
										
										$_SESSION['user'] = $from_user;
										$_SESSION['pass'] = $from_password;
									}else{
										
										$sql_teacher="SELECT * FROM administradores where usuario='".$from_user."' and contrasenia='".$from_password."'";
										
										
										$result = $conexion->query($sql_teacher);
										
										$count = mysqli_num_rows($result);
										if($count == 1){
											echo "<b>Cargando área personal..</b><img align='center'  src='images/ajax-loader.gif'/>";
											///Hay que redirigirlo al perfil de administradores
											//echo"<meta http-equiv='refresh' content='1;URL=my_admin_profile.php?user=".$from_user."&pass=".$from_password."'>";
											echo"<meta http-equiv='refresh' content='1;URL=my_admin_profile.php?visit=1'>";
											
											$_SESSION['user'] = $from_user;
											$_SESSION['pass'] = $from_password;
										
										}else{
										
										$sql_teacher="SELECT * FROM profesor where usuario='".$from_user."' and contrasenia='".$from_password."' and activo ='1'";
									
										$result = $conexion->query($sql_teacher);

										$count = mysqli_num_rows($result);
										if($count == 1){
											echo "<b>Cargando área personal..</b><img align='center'  src='images/ajax-loader.gif'/>";
											///Hay que redirigirlo al perfil de profesor
											//echo"<meta http-equiv='refresh' content='1;URL=my_teacher_profile.php?user=".$from_user."&pass=".$from_password."'>";
											echo"<meta http-equiv='refresh' content='1;URL=my_teacher_profile.php?visit=1'>";
											
											$_SESSION['user'] = $from_user;
											$_SESSION['pass'] = $from_password;
										}else{
											//Usuario no existe
											
												$msg_Error="Usuario no existente o Cuenta inactiva. Porfavor intente más tarde...";
												echo"<p>".$msg_Error."</p>";
											
										}
										
										
										}
									}
									
									//Cerramos la conexión
									mysqli_close($conexion);
								}
								
								

								?>
								</div>
							</div>
						</form>
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