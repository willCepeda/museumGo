<!DOCTYPE HTML>
<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";

$table_name ="";
$sql =" INSERT INTO ";
?>
<html>
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
  
  var boton_rut;
  
  boton_rut = $('#rut_check');
  
  boton_rut.on('click', function(){
    
     var valor_input, valor_rut;
	 var valor_nombre,nombre;
    valor_input = $('#roles');
    valor_rut = valor_input.val();
    
    if(valor_rut === ''){
      alert('No has seleccionado un Rol');
	  return false;
    }
    
	
  }); 
  
});
	
	
	</script>
	<head>
		<title>Sign UP - Museum GO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Sign UP</a> Museum GO</h1>
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
					<?php
						$conexion = new mysqli($host_db, $user_db,$pass_db, $db_name);
						
						if($conexion->connect_error){
							die("La conexion falló: ".$conexion->connect_error);
						}
						
						$from_user = $_POST['user'];
						$from_pass = $_POST['password'];
						$from_repet_pass = $_POST['repeat-pass'];
						$from_rol = $_POST['roles'];
						$from_name = $_POST['name'];
						$from_lastname =$_POST['apellido'];
						if($from_rol =="estudiantes"){
							$sql.=$from_rol." (id, usuario, contrasenia, nombre, apellidos) VALUES (NULL,'".$from_user."','".$from_pass."','".$from_name."','".$from_lastname."');";
							
							//echo $sql;
							echo "<h2>" . "Estudiante Creado Exitosamente!" . "</h2>";

							//$result = $conexion->query($sql);
							//echo"<h2>Estudiante registrado correctamente.</h2>";
						
						
						
						
						}else if ($from_rol =="profesor"){
							$sql.= $from_rol."(id, usuario, contrasenia, nombre, apellidos) VALUES (NULL,'".$from_user."','".$from_pass."','".$from_name."','".$from_lastname."');";
							echo"<h2>Profesor Creado Exitosamente! </h2>";
							
						}else{
							echo"<h2>Registrate !</h2>";
							echo"<p>Rellena todos los campos, para mayor seguridad de los datos.</p>";	
						}
					?>
					</header>
					<div class="box">
					
					<?php
						if($from_rol == ""){
					?>		
						
						<form method="post" action="registrar-usuario.php">
							<div class="row gtr-50 gtr-uniform">
								<div class="col-6 col-12-mobilep">
								
								<?php
									
									echo "<input type='text' name='name' id='name' value='".$from_name."' placeholder='Nombres' />";
								
								?>
								</div>
								<div class="col-6 col-12-mobilep">
								<?php
									
									echo "<input type='text' name='apellido' id='apellido' value='".$from_lastname."' placeholder='Apellidos' />";
								
								?>
									
								</div>
								<div class="col-12">
								<?php
									
									echo "<input type='email' name='user' id='subject' value='".$from_user."' placeholder='Usuario(Email)' />";
								
								?>
								
									
								</div>
								<div class="col-6 col-12-mobilep">
								<?php
									
									echo "<input type='text' name='password' id='name' value='".$from_pass."' placeholder='Contraseña' />";
								
								?>
									
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="password" name="repeat-pass" id="repeat-pass" value="" placeholder="Repetir Contraseña" />
								</div>
								<!--  Rol del usuario  -->
								<div class="col-12" >
									<select name="roles" id="roles"  style='color:#FE2E2E'>
									<option value=""  >Elige un Rol</option>
									<option value="estudiantes">Estudiante</option>
									<option value="profesor">Profesor</option>
									</select>
								</div>
								<!--
								 //atributos que tenia email type="email" name="email" id="email"
								 //esto es texArea para otras sugerencias
								<div class="col-12">
									<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
								</div>-->
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" id="rut_check" value="Registrarse" /></li>
									</ul>
								</div>
							</div>
						</form>
				
							
						</form>
						<?php
						}else{
							
							 if ($conexion->query($sql) === TRUE) {

							
							echo "<p style='text-align:center'>" . "Bienvenido <b>" . $from_name . "</b></p>";
							//echo "<h5>" . "Hacer Login: " . "<a href='login.html'>Login</a>" . "</h5>";
								echo "<div class='col-12'>
									<ul class='actions special'>
										<li><a href='log_in.php'><input type='submit' value='Hacer Log In' /></a></li>
									</ul>
								</div>";
							 
							 }
							
							
						}
					?>
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