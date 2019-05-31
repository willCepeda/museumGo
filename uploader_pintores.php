<!DOCTYPE HTML>
<?php
require_once( "sparqllib.php" );
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "museo";
$tb_name = "profesor";
session_start();

if(!empty($_SESSION['pass']) && !empty($_SESSION['user'])){
	$conexion = new mysqli($host_db, $user_db,$pass_db, $db_name);
	$conexion->set_charset("utf8");
	if($conexion->connect_error){
		die("La conexion falló: ".$conexion->connect_error);
	}
	/*
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
	$_SESSION['s_last_name']=$oneLastName[1];*/
	 
}else{
	
	
	
}

	  function isEmpty($value){
		  
		  if(empty($value))
			  return NULL;
		  else
			  return $value;
	  }
	  
		function parcer($value,$key,&$campos){
		$bodytag_="";
		$bodytag="";
		switch($key){
			case "uri":
				$porcion = explode("entity",$value);
				$length = count($porcion);
				
				if($length == 1){
					
					//$bodytag_ = str_replace("'", "´", $value);	
					//echo "bodytag_".$bodytag_."<br>";
					if(empty($value)){
						$campos["imagen"] =NULL;
					}else{
						$campos["imagen"] =  isEmpty($value);
						
					}	
				}else{
					$cad_length = strlen ( $porcion[$length-1] );
					
					$campos["codigo"] =  substr($porcion[$length-1],1,$cad_length);
					
									
				}
			break;
			
			case "literal":
				
				if(empty($campos["nombre"])){
					
					$bodytag = str_replace("'", "´", $value);
					
					
					if(empty($bodytag)){
						$campos["nombre"] =  isEmpty($value);
					}else{
						$campos["nombre"] =  isEmpty($bodytag);
						
					}	
					
					
				}else if(empty($campos["nacimiento"])){
					
					$campos["nacimiento"] =  isEmpty($value);
					
				}else if(empty($campos["genero"])){
					
					if(empty($value)){
						$campos["genero"] =NULL;
					}else{
						$campos["genero"] =  isEmpty($value);
						
					}	
					
					
				}
				
				
			break;
			
			default:
			break;
	
		}
		
	}  
function limpiarCampos(&$campos){
	
	$campos["nombre"]="";
	 $campos["codigo"]="";
	 $campos["imagen"]="";
	 $campos["nacimiento"]="";
	 $campos["genero"]="";
 }	
	
	
 
 
 function recorrerCampos(&$campos,&$concat_query){
	 
	$concat_query.="'".$campos["codigo"]."', '".$campos["nombre"]."','".$campos["nacimiento"]."','".$campos["genero"]."','".$campos["imagen"]."'),";
	
	//echo "imagen".$campos["imagen"]."<br>";
	limpiarCampos($campos);
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
							<li><a href="index_user.php" class="button">Cerrar Sesión</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2><img src="images/LOGO/LOGO.png"/></h2>
						<p>Cargar fichero de Pintores.</p>
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
									
									
									
									
									
									$campos = array('codigo','nombre','nacimiento','genero','imagen');
									$endpoint = "https://query.wikidata.org/sparql";
									$concat_query="";
										$sql_sparql = " INSERT INTO pintores(id_pintor, codigo_pintor, nombre, nacimiento, genero,imagen) VALUES (NULL,";
							
								
									$data = sparql_get($endpoint,$query);
									if( !isset($data) )
									{
										print "<p>Error: ".sparql_errno().": ".sparql_error()."</p>";
									}								
									
									######Aqui realizamos el recorrido del archivo json_decode
									
									if(count($data) >0 ){
										//print "numero de datos: ".count($data)."<br>";
										
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
										}
									
					
									}
									
									$length= strlen ($concat_query);
										$sql_sparql.=substr($concat_query,0,$length-7);
										
										//echo $sql_sparql;
										$result_ = $conexion->query($sql_sparql);
									
										//#Eliminamos los datos que se encuentran duplicado en la tabla
										$sql_delete = "DELETE t1 FROM pintores t1 INNER JOIN pintores t2 WHERE t1.id_pintor > t2.id_pintor AND t1.codigo_pintor = t2.codigo_pintor";
										$result_ = $conexion->query($sql_delete);
										echo"<header>
		
										<p>Se ha realizado <b>la carga de los Pintores correctamente</b></p>
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