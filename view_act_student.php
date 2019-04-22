<!DOCTYPE HTML>
<?php
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
	
	 if(!empty($_GET)){
		  $query="select * from  actividad_profesor v where v.id_actividad='".$_GET['id']."'";
		  $result = $conexion->query($query);
		  $row = $result->fetch_assoc();
		  $act_id =$row['id_actividad'];
		  $act_prof =$row['codigo_profesor'];
		  $act_nombre =comprueba($row['nom_acti']);
		 
		  $act_obra=comprueba($row['imagenes']);
		  $act_pregunta=comprueba($row['pregunta']);
		  $act_respuesta=comprueba($row['respuesta']);
		  
	  }
	
}else{
	
	
	
}

function comprueba($valor){
	
	$noticia = "Dato no disponible..";
	
	if(!empty($valor)){
		$noticia = $valor;
	}
	
	return $noticia;
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
							<li><a href="my_student_profile.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Opciones</a>
								<ul>
									<li>
										<a href="#">Perfil</a>
										<ul>
										<?php
											echo "<li><a href='modify_user.php'>Modificar</a></li>";
											
											echo "<li><a href='modify_User.php'>Eliminar</a></li>";
											
											
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
						<p>Actividad Disponible.</p>
					</header>
					<div class="row">
						<div class="col-12">

							<!-- Museos -->
								<!-- Form -->
								<section class="box">
										<div  class="col-12">
										<?php
											
												echo "<header>";
												echo "<h3 style='text-align:center'>".$act_nombre."</h3>";
												echo "</header>";
												
											?>
										
										</div>
										<div class="row gtr-uniform gtr-50">
											<div class="col-6 col-12-mobilep">
											
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
												echo "<header>";
												echo "<h3 aling='center'>".$act_pregunta."</h3>";
												echo "</header>";
												?>
											</div>
											
											<header>
											<p>Respuesta: ?</p>
											</header>
											
											<?php
											echo "<input type='hidden' id='id' name='id' value='".$_GET['id']."'>";
											?>
											
											
											<div class="col-12">
											<hr>
											
											<?php
											
											echo "<div class='col-12'>";
											echo "<a href='confirma_act.php?id=".$act_id."&id_profe=".$act_prof."' class='button special fit'>Realizar Actividad</a>";
											echo "</div>";
											
											
											?>
												
											</div>
										</div>
									

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