<!DOCTYPE HTML>
<?php
require_once( "sparqllib.php" );
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

	 
}else{
	
	
	
}

	  function isEmpty($value){
		  
		  if(empty($value))
			  return NULL;
		  else
			  return $value;
	  }
	  
	function parcer($value,$key,&$campos){
		
		switch($key){
			case "uri":
				$porcion = explode("entity",$value);
				$length = count($porcion);
				
				if($length == 1){
					
					$campos["imagen"] =  isEmpty($value);
				}else{
					$cad_length = strlen ( $porcion[$length-1] );
					
					$campos["codigo"] =  substr($porcion[$length-1],1,$cad_length);
				}
			break;
			
			case "literal":
				$porcion = explode("Museo",$value);
				$length = count($porcion);
				
				if($length == 1){
					
					$time = explode("T",$value);
					$campos["fecha_origen"] = isEmpty($time[0]);
					
				}else{
					
					$campos["nombre"] =  isEmpty($value);
				}
				
			break;
			
			default:
			break;
	
		}
		
	}  
 
 
 function recorrerCampos(&$campos,&$concat_query){
	 
	 $concat_query.="'".$campos["codigo"]."', '".$campos["nombre"]."','".$campos["fecha_origen"]."','".$campos["imagen"]."'),";
	 
	 $campos["nombre"]="";
	 $campos["codigo"]="";
	 $campos["fecha_origen"]="";
	 $campos["imagen"]="";
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
											<li><a href="updateAdmin_pintores.php">Actualizar Pintores</a></li></ul>
										
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
						<p>Cargar fichero de Museos.</p>
					</header>
					<div class="row">
						<div class="col-12">

							<!-- Text -->
								<section class="box">
								
								<?php
								
								$uploadedfileload="true";
								$msg="";
								$uploadedfile_size=$_FILES['uploadedfile']['size'];
								if ($_FILES['uploadedfile']['size']>200000)
								{		
								$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
								$uploadedfileload="false";
								
								}
								 //echo $_FILES['uploadedfile']['type'];
								if (!($_FILES['uploadedfile']['type'] =="text/plain"))
								{
									
								$msg=$msg." Tu archivo tiene que ser TXT. Otros archivos no son permitidos<BR>";
								$uploadedfileload="false";
								}

								$file_name=$_FILES['uploadedfile']['name'];

								if($uploadedfileload=="true"){
									
									$file =fopen($_FILES['uploadedfile']['tmp_name'],"r") or die ("Error");
									$query ="";
									while(!feof($file)){
										
										$query .= fgets($file);
										
									}
									fclose($file);
									$campos = array('codigo','nombre','fecha_origen','imagen');
									$endpoint = "https://query.wikidata.org/sparql";
									$concat_query="";
									$sql_sparql = " INSERT INTO museos(id_museo, codigo, nombre, fecha_origen, imagen) VALUES (NULL,";
							
								
									$data = sparql_get($endpoint,$query);
									if( !isset($data) )
									{
										print "<p>Error: ".sparql_errno().": ".sparql_error()."</p>";
									}								
									
									######Aqui realizamos el recorrido del archivo json_decode
									foreach( $data as $row )
{

										foreach( $data->fields() as $field )
										{
											if(!empty(@$row["$field.type"])){
												
												if(!empty($row[$field])){
													parcer($row[$field],@$row["$field.type"],$campos);
												}
												
											}
										
										}
										recorrerCampos($campos,$concat_query);
										$concat_query.="(NULL,";
										print "</tr>";
									}
									$length= strlen ($concat_query);
									$sql_sparql.=substr($concat_query,0,$length-7);
									
									$result = $conexion->query($sql_sparql);
									
									$delete_repe= "delete FROM museos WHERE nombre=''";
									
									$conexion->query($delete_repe);
									
									echo"<header>
		
										<p>Se ha realizado <b>la carga de las Museos correctamente</b></p>
									</header>";
									
		
								}else{echo $msg;}
								
							
								//Cerramos la conexión
									mysqli_close($conexion);
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