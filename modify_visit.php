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
	$conexion = new mysqli($host_db, $user_db,"", $db_name);
	$conexion->set_charset("utf8");
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}

	  if(!empty($_GET)){
		  $query="select * from  visitas_profesor v where v.id_visita='".$_GET['id']."'";
		  $result = $conexion->query($query);
		  $row = $result->fetch_assoc();
		  $vis_nombre =comprueba($row['nombre_visita']);
		  $vis_pint=comprueba($row['codigo_pintor']);
		  $vis_obra=comprueba($row['codigo_obra']);
		  $vis_comentario=comprueba($row['comentarios']);
		  $vis_estado=comprueba($row['publicado']);
		  $vis_cod_mus=comprueba($row['codigo_museo']);
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
							<li><a href="index_user.php" class="button">Cerrar Sessión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Modificar Visitas</h2>
						<p>Rellene los campos correctamente.</p>
					</header>
					<div class="row">
						<div class="col-12">

							
					<div class="row">
						<div class="col-12">

							<!-- Form -->
								<section class="box">
									<h4><b>Nombre de Vista:<b></h4>
									<form method="post" action="confirm_action_visit.php">
										
										<div class="row gtr-uniform gtr-50">
											<div class="col-6 col-12-mobilep">
											<?php
												echo "<input type='text' name='name_visit' id='name' value='".$vis_nombre."' />";
											?>
											</div>
											<div class="col-6 col-12-mobilep">
											<?php
											
												echo"<input type='text' name='name_visit_new' id='second_name' value=''  placeholder='Nuevo Nombre' />";
											
											?>
											</div>
											
											
											
											<div class="col-12">

											<!-- Gallery Painters -->
												<section class="box">
												<header>
													<p>Pintores Seleccionados</p>
												<header>	
													<div class="box alt">
													<div class="row gtr-50 gtr-uniform">
													<?php
														$porcion = explode(",",$vis_pint);
														$count = count($porcion);
														$painters="";
														if($vis_pint =="Dato no disponible.."){
														
															echo "<header>";
															echo "<p><b>".$vis_pint."</b></p>";
															echo "</header>";
														
														}else if($count == 1){
															
															$paint_query="select * from pintores  where nombre like '%".$vis_pint."%'";
															$rs_p = $conexion->query($paint_query);
															$row_p = $rs_p->fetch_assoc();
															$painters="'".$row_p["codigo_pintor"]."',";
															echo "<div class='col-4' align='center'><span class='image fit'><img src='".$row_p["imagen"]."' alt='".$row_p['nombre']."'  width='50' height='300'/><br>";
															echo "<label >".$row_p["nombre"]."</label>";
															echo "</span></div>";
					
										
															
														}else{
															
															
															$paint_query="select * from pintores  where ";
															
															for($p=0;$p < $count;$p++){
																
																$paint_query.="nombre like '%".$porcion[$p]."%' or ";
												
															}
															
															$tam=strlen($paint_query);
															$paint_query = substr($paint_query,0,$tam-3);
															//echo $paint_query;
															
															$rs_p = $conexion->query($paint_query);
															
															$count_p = mysqli_num_rows($rs_p);
															if($count_p != 0){
												
																while($row_p = $rs_p->fetch_assoc()){
																	$painters.="'".$row_p["codigo_pintor"]."',";
																	echo "<div class='col-4' align='center'><span class='image fit'><img src='".$row_p["imagen"]."' alt='".$row_p["nombre"]."'  width='50' height='300'/><br>";
																	echo "<label >".$row_p["nombre"]."</label>";
																	echo "</span></div>";
																	
																}
															}else{
																
																
																
															}
														}
														
														
													
													
													
													?>
														
														
														
														
														
														</div>
													</div>
												
												</section>
											</div >
											
											<div class="col-12">

											<!-- Gallery Painters -->
												<section class="box">
												<header>
													<p>Obras Seleccionados</p>
												<header>	
													<div class="box alt">
													<div class="row gtr-50 gtr-uniform">
													<?php
														$porcion = explode(",",$vis_obra);
														$count = count($porcion);
														
														$tam_o= strlen($painters);
														$painters = substr($painters,0,$tam_o-1); 
														
														if( $vis_obra =="Dato no disponible.."){
														
															echo "<header>";
															echo "<p><b>".$vis_obra."</b></p>";
															echo "</header>";
														
														}else if($count == 1){
															
															$obra_query="select * from obras where coleccion='".$vis_cod_mus."'  and nombre like '%".$vis_obra."%' and codigo_pintor IN (".$painters.")";
													
															$rs_o = $conexion->query($obra_query);
															$row_o = $rs_o->fetch_assoc();
															
															echo "<div class='col-4' align='center'><span class='image fit'><img src='".$row_o["imagen"]."' alt='".$row_o['nombre']."'  width='50' height='300'/><br>";
															echo "<label >".$row_o["nombre"]."</label>";
															echo "</span></div>";
					
										
															
														}else{
															
															
															$obra_query="select * from obras where coleccion='".$vis_cod_mus."'  and ";
															
															for($p=0;$p < $count;$p++){
																
																$obra_query.="nombre like '%".$porcion[$p]."%' or ";
															}
															
															$tam=strlen($obra_query);
															$obra_query = substr($obra_query,0,$tam-3);
															
															$obra_query.=" and codigo_pintor IN(".$painters.")";
															
															
															
															$rs_o = $conexion->query($obra_query);
															
															$count_o = mysqli_num_rows($rs_o);
															if($count_o != 0){
												
																while($row_o = $rs_o->fetch_assoc()){
																	echo "<div class='col-4' align='center'><span class='image fit'><img src='".$row_o["imagen"]."' alt='".$row_o["nombre"]."'  width='50' height='300'/><br>";
																	echo "<label >".$row_o["nombre"]."</label>";
																	echo "</span></div>";
																	
																}
															}else{
																
																
																
															}
														}
														
														
													
													
													
													?>
														
														
														
														
														
														</div>
													</div>
												
												</section>
											</div >
											
											
										
											<header>
											<p>Comentario:</p>
											</header>
												<div class="col-12">
												<?php
												echo "<textarea name='comentario' id='message' placeholder='Introduce las indicaciones para tu visita' rows='6'>";
												echo  $vis_comentario;
												echo "</textarea>";
												?>
											</div>
											
											
											<header>
											<p>Deseas realizar la operacion de:</p>
											</header>
											<div class="col-4 col-12-narrower">
												<input type="radio" id="priority-low" value="0" name="publicado" checked>
												<label for="priority-low">No publicar</label>
											</div>
											<div class="col-4 col-12-narrower">
												<input type="radio" id="priority-normal" value="1" name="publicado">
												<label for="priority-normal">Publicar</label>
											</div>
											<?php
											echo "<input type='hidden' id='id' name='id' value='".$_GET['id']."'>";
											?>
											
											
											<div class="col-12">
											<hr>
												<ul class="actions">
													<li><input type="submit" name="boton" id="actualiza" value="Actualizar Datos" /></li>
													<li><input type="submit" name="boton" id="elimina" value="Eliminar Vista" class="alt" /></li>
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