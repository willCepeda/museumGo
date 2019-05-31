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
	$conexion->set_charset("utf8");
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
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
									<li>
									<a href="#">Actividades</a>
										<ul>
											<li><a href="act_available.php">Disponibles</a></li>
											<li><a href="my_act.php">Mis Actividades</a></li>
											<li><a href="my_act_cal.php">Calificaciones</a></li>
										</ul>
										
									</li>
									<!--<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									-->
								</ul>
							</li>
							<li><a href="index_user.php" class="button">Cerrar Sesión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2><img src="images/LOGO/LOGO.png"/></h2>
						<p>Visitas Disponibles.</p>
					</header>
					<div class="row">
						<div class="col-12">

							<!-- Museos -->
								<section class="box">
									<header>
									<h3 ><em><b>Datos del Museo</b></em></h3>
									</header>
								<?php
								
								$query ="select m.nombre, m.imagen,m.fecha_origen,v.comentarios,v.codigo_museo ,v.id_visita,v.nombre_visita,v.codigo_pintor,v.codigo_obra,p.nombre as nom_profe , v.codigo_profe from visitas_profesor v, museos m, profesor p where m.codigo = v.codigo_museo and p.id = v.codigo_profe and v.id_visita='".$_GET['id']."'";
								$rs=$conexion->query($query);
								$row = $rs->fetch_assoc();
								
								$mus_nombre= comprueba($row['nombre']);
								$mus_image = comprueba($row['imagen']);
								$mus_create = comprueba($row['fecha_origen']);
								$mus_coment = comprueba($row['comentarios']);
								$mus_profe = comprueba($row['nom_profe']);
								$vis_nombre = comprueba($row['nombre_visita']);
								$vis_obra = comprueba($row['codigo_obra']);
								$vis_pint=comprueba($row['codigo_pintor']);
								$vis_cod_mus=comprueba($row['codigo_museo']);
								$vis_profe = $row['codigo_profe'];
								$vis_id = $row['id_visita'];
								$array_mes= array("01"=>"De Enero de",
												  "02"=>"De Febrero de",
												  "03"=>"De Marzo de",
												  "04"=>"De Abril de",
												  "05"=>"De Mayo de",
												  "06"=>"De Junio de",
												  "07"=>"De Julio de",
												  "08"=>"De Agosto de",
												  "09"=>"De Septiembre de",
												  "10"=>"De Octubre de",
												  "11"=>"De Noviembre de",
												  "12"=>"De Diciembre de",
								
								
								);
									echo "<header><h4><b>".$mus_nombre."</b></h4></header>";			
									
									if($mus_image=="Dato no disponible.."){
										echo "<span class='image fit'><p>".$mus_image."</p></span>";
									}else{
										echo "<span class='image fit'><img src='".$mus_image."' alt=''  height='500' width='550' /></span>";
									}
									if($mus_create=="Dato no disponible.."){
									echo "<p><span class='image left'>Este museo fue creado: ".$mus_create."</span></p><BR>";
									
									}else{
										$fecha = explode("-",$mus_create);
										$dia = $fecha[2];
										$mes = $fecha[1];
										$anio = $fecha[0];
										echo "<p><span class='image left'>Este museo fue creado: ".$dia." ".$array_mes[$mes]." ".$anio."</span></p><BR>";
										
									}
									
									echo "<p><h3 ><em><b>Datos de la Visita</b></em></h3></p>";
									echo "<p>";
									echo "<header><p><b>Nombre: </b>".$vis_nombre."</p></header>";
									echo "</p>";
									
									
									echo "<header><p><b>Pintores relacionados:</p></header>";
									echo "<div class='box alt'>
										<div class='row gtr-50 gtr-uniform'>";
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
															}
														}
														
														
													
													
													
												
														
										
										
										
										
										
									echo "		</div>
											</div>
										";	
									
									echo "<p>";
									echo "<header><h4><p><b>Obras a visitar: </p></h4></header>";
													
									echo "</p>";
									
										echo "<div class='box alt'>
										<div class='row gtr-50 gtr-uniform'>";
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
										
										
										echo "		</div>
											</div>
										";	
									echo "<header>
											<p>Instrucciones:</p>
											</header>
												<div class='col-12'>
												
												<textarea name='comentario' id='message'  rows='6'  disabled>".
												$mus_coment."
												</textarea>
											
									</div>";
									
								
									
									
									
									echo "<p>";
									echo "<header><h4><p><b>Profesor Asignado: </b>".$mus_profe."</p></h4></header>";
													
									echo "</p>";
									echo "<p >";
									echo "<header><h4><p align='center' ><b style='color:#5FB404';>Disfruta tú Visita !!!</b></p></h4></header>";
													
									echo "</p>";
									
									
									echo "<hr>";
										
												
								
								
								
								?>
									
								
								
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