<!DOCTYPE HTML>
<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";
$tb_name = "estudiantes";
session_start();

if(!empty($_SESSION['pass']) && !empty($_SESSION['user'])){
	$conexion = new mysqli($host_db, $user_db,"", $db_name);
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}
$sql ="";	
$msg_students="";	
	 
	 if(!empty($_GET)){
		 if(!empty($_GET['id'])){
		$id_user = $_GET['id'];
		$sql = "DELETE FROM estudiantes  WHERE estudiantes.id = '".$id_user."';";
		$result = $conexion->query($sql);
		
		$msg_students = "Se ha eliminado a un estudiante correctamente.";		
		
		 }
		 
		 
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
							<li><a href="my_admin_profile.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Opciones</a>
								<ul>
									<li>
										<a href="#">Perfil</a>
										<ul>
										<?php
											echo "<li><a href='modify_user.php?user=".$_SESSION['user']."'>Modificar</a></li>";
											//<li><a href="modify_user.php?user="..">Modificar</a></li>
											echo "<li><a href='modify_User.php?user=".$_SESSION['user']."'>Eliminar</a></li>";
											//<li><a href="#">Eliminar</a></li>
											
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
									<!--<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									-->
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
						<p>Lista de Estudiantes.</p>
					</header>
					<div class="row">
						<div class="col-12">

							<!-- Text -->
								<section class="box">
									<div class="row">
						<div class="col-12">

							<!-- Table -->
								<section class="box">
									
									<div >
										<table >
											<thead>
												<tr>
													<th>Indice</th>
													<th>Nombre</th>
													<th>Eliminar</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$index = 1;
												$button_disable="";
												$activate_all="";
												$result = $conexion->query("SELECT * FROM estudiantes");
												
												$count = mysqli_num_rows($result);
												if($count != 0){
												
												while($row = $result->fetch_assoc()){
													echo "<tr>";
													echo "<td>".$index."</td>";
													echo "<td><b>".$row["nombre"]." ".$row['apellidos']."</b></td>";
													
													echo "<td>";
													
													echo "<a href='delete_students.php?id=".$row['id']."' ><input type='button' value ='Sí' name='boton' /></a>";
													//$activate_all.="profesor.id=".$row['id']." or ";
													echo"</td>";
													
													echo "</tr>";
													$index++;
												}
												
												
												
												}else{
													//$button_disable ="disabled='true'";
													echo"<tfoot>
												<tr>
													<td colspan='3'>No hay estudiantes registrados</td>
													
												</tr>
											</tfoot>";
													
												}
												$result->free();
												?>
											</tbody>
											
										</table>
									</div>
									<div class="col-12">
												<?php
												
												echo "<p style='color:#FE2E2E'>".$msg_students."<p>";
												
												?>
												<!--
												<ul class="actions">
												<?php
													echo"
													//<li><a href='activate_teacher.php?activate=".$activate_all."' ><input type='button' ".$button_disable." value='Activar a Todos' name='boton' /></li></a>
													";
												?>
												</ul>
												-->
									</div>
								
								</section>

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