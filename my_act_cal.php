<!DOCTYPE HTML>
<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";

session_start();

if(!empty($_SESSION['pass']) && !empty($_SESSION['user'])){
	$conexion = new mysqli($host_db, $user_db,"", $db_name);
	$conexion->set_charset("utf8");
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}
$sql ="";	
$msg_teacher="";
	 
	 
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
							<li><a href="my_student_profile.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Opciones</a>
								<ul>
									<li>
										<a href="#">Perfil</a>
										<ul>
										<?php
											echo "<li><a href='modify_user.php'>Modificar</a></li>";
											
											
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
							<li><a href="index_user.php" class="button">Cerrar Sessión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2><img src="images/LOGO/LOGO.png"/></h2>
						<p>Mis Calificaciones de Actividades.</p>
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
													<th>titulo</th>
													<th>tipo</th>
													<th>Ver nota</th>
													<th>Eliminar actividad</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$index = 1;
												$button_disable="";
												$activate_all="";
												
												
												
												$query ="SELECT h.id, a.id_actividad, a.pregunta,a.imagenes,a.tipo,a.nom_acti FROM hacer_actividad h, actividad_profesor a where h.id_actividad = a.id_actividad and h.id_estudiantes ='".$_SESSION['id']."' and h.observacion !=''";
												
											
												$result = $conexion->query($query);
												
												
												$count = mysqli_num_rows($result);
												if($count != 0){
												
												while($row = $result->fetch_assoc()){
													echo "<tr>";
													echo "<td>".$index."</td>";
													echo "<td><b>".$row["nom_acti"]."</b></td>";
													echo "<td><b>".$row["tipo"]."</b></td>";
													echo "<td align='center'>";
													echo "<a href='cal_act_student.php?id=".$row["id_actividad"]."&id_h=".$row["id"]."' >";
													echo "<input type=image  src='images/l.png'  width='25' height='25'>";
													echo "</a>";
													echo"</td>";
													echo "<td align='center'>";
													
													echo "<a href='delete_act_student.php?id=".$row["id"]."' >";
													echo "<input type=image  src='images/x.png' width='25' height='25'>";
													echo "</a>";
													//echo "<a href='view_visit.php?id=".$row['id_visita']."' ><input type='button' value ='Sí' name='boton' /></a>";
													
													echo"</td>";
													
													echo "</tr>";
													$index++;
												}
												
												
												
												}else{
													$button_disable ="disabled='true'";
													echo"<tfoot>
												<tr>
													<td colspan='3'>No existen calificaciones... </td>
													
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
												
												echo "<p style='color:#FE2E2E'>".$msg_teacher."<p>";
												
												?>
												
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