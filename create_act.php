<!DOCTYPE HTML>
<?php
include("getMuseos.php");
include("getObras.php");
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
	
}else{
	
	
	
}
?>
<html>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	
	var isMuseum="";
	var numPintores=0;
	var numObras=0;
	var arrayObra= new Array();
	var arrayPintores= new Array();
	function museos(value){
		// variable donde se alamcena la consulta sparql completa
		//inicializar_XHR();
		isMuseum = value;
		//alert(value);
		//var selectBox = document.getElementById("museum");
		//var option=select.options[select.selectedIndex];
		//var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	
	
	}
	
	$(document).ready(function(){
  
  var boton_rut;
  
  boton_rut = $('#rut_check');
  
  boton_rut.on('click', function(){
    
     var valor_input, valor_rut;
	 var valor_nombre,nombre;
    valor_input = $('#pregunta');
    valor_rut = valor_input.val();
    
	valor_nombre = $('#nameAct');
	nombre =valor_nombre.val();
    if(valor_rut === ''){
      alert('No tiene relleno el campo Pregunta');
	  return false;
    }
    
	 if(nombre === ''){
      alert('No tiene relleno el campo Nombre');
	  return false;
    }
  }); 
  
});
	

	
	function loadActividad(){
		
		if(document.getElementById('museum').value !=""){
		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url="getObras_act.php?museo="+isMuseum;
		var asynchronous = true;
		
		ajax.open(method,url, asynchronous);
		
		//sending ajax request
		ajax.send();
		
		//receiving response from data.php
		ajax.onreadystatechange= function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				
				//converting JSON back to array
				var data = JSON.parse(this.responseText);
				console.log(data);
				//html value for div
				
				var pinters_img ="";
				
				for(var i=0; i < data.length; i++)
				{
					var id_obras =data[i].id_obra;
					var image= data[i].imagen;
					var name = data[i].nombre;
					var id_pintores= data[i].codigo_pintor;
					arrayObra[i]= id_obras;
					arrayPintores[i]= id_pintores;
					//var cod_painter=data[i].codigo_pintor;
					//var genero=data[i].gener;
					var url_imagen="";
					//arrayPintores[cod_painter]=name;
					
					pinters_img+="<div class='col-4' align='center'><span class='image fit'><img src='"+image+"' alt='"+name+"'  width='50' height='300'/><br>";
					//pinters_img+="<img value ='"+cod_painter+"' src='"+image+"' alt='"+name+"' width='50' height='300'>";
					
					/*pinters_img+="<input type='checkbox' value='"+cod_painter+"' id='pintor"+i+"' name='pintores' >";
					pinters_img+="<label for='pintor"+i+"'>"+name+"</label>";*/
					pinters_img+="<p>"+name+"</p>";
					pinters_img+="</span></div>";
				}
					numPintores=i;
					i=0;
				
				//replacing the div for the data
				document.getElementById("divAct").innerHTML=pinters_img;
				
				
			}
	
			//isMuseum="";
		}
			
			
			
			
			
			
		}else{
			
			alert("Debe elegir un Museo");
			
		}
		
		
		
	}
	
	function verificarDatos(){
		var obras="";
		var pintores="";
		for(var p=0; p < 3; p++){
			obras+=arrayObra[p]+",";
			pintores+=arrayPintores[p]+",";
		}
		document.getElementById("obras_museo").value = obras;
		document.getElementById("pint_museo").value = pintores;
	}
	</script>
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
							<li><a href="my_teacher_profile.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Opciones</a>
								<ul>
									<li>
										<a href="#">Perfil</a>
										<ul>
										<?php
											
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
						<h2><img src="images/LOGO/LOGO.png"/></h2>
						<p>Crear una nueva actividad.</p>
					</header>
					<!--<div class="row">
						<div class="col-12">-->
					<div class="row">
						<div class="col-12">

							<!-- Form -->
								<section class="box">
									<header>
									<h3>Rellene los campos requeridos</h3>
									</header>
									<form method="post" action="load_actividad.php">
										<div class="row gtr-uniform gtr-50">
											<header>
											<h4><b>Nombre de la Actividad:</b></h4>
					
											</header>
											<div class="col-6 col-12-mobilep">
												<input type="text" name="nameAct" id="nameAct" value="" placeholder="" />
											</div>
											
											
										
											
											
											<div class="col-12">
											<header>
											<p><h4><b>Museo:</b></h4></p>
					
											</header>
											<?php
												$museos= "SELECT codigo,nombre from museos";
												$mus_sql =$conexion->query($museos);
												$count = mysqli_num_rows($mus_sql );
												if($count == 0){
													echo "Lo sentimos no hay museos cargados en la BD..";
													
												}else{
													
													echo "<select name='museum' id='museum' onChange='museos(value)'>";
												
													echo "<option value=''>- Elegir el museo -</option>";
													while($rmus = $mus_sql->fetch_assoc()){
														
														echo "<option value='".$rmus["codigo"]."'>".$rmus["nombre"]."</option>";
														
													}
													
													
													echo"</select>";
													
												}
												
												
												?>
											</div>
											
											</section>
											
											</div>
											<div class="col-12">
											<section class="box">
											<header>
											<p><input type="button"  class="button alt small" onClick="loadActividad()" value ="Generar Imagenes" ></p>
											</header>
											<div class="box alt">
												<div class="row gtr-50 gtr-uniform" id="divAct">
											
												</div>
											</div>

											
											</section>
											
											
											
											
											</div>
											
											
											<div class="col-12">
											<section class="box">
											<header>
											<p>Escribe la pregunta o Cuestion:&nbsp;&nbsp;&nbsp;<em>Ej:Que pintor creo la pintura "La Anunciación"?</em></p>
											<input type="text" name="pregunta" id="pregunta" value="" placeholder="" />
											</header>
											
											<header>
											<p>Escribe la respuesta:&nbsp;&nbsp;&nbsp;<em>Ej:(rellenar con el nombre del pintor)</em></p>
											<input type="text" name="respuesta" id="name" value="" placeholder="" />
											</header>
											
											
											
											<input type="hidden" id="el_pub" name="publicado" value="0">
											<input type="hidden" id="pint_museo" name="rsPintores" value="">
										
											<input type="hidden" id="obras_museo" name="rsObra" value="">
											
											
											
											
											</section>
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" id="rut_check" value="Crear Actividad"  onClick="verificarDatos()"/></li>
													<li><input type="reset" value="Reset" class="alt" onClick="location.reload();" /></li>
												</ul>
											</div>
											</div>
											
									
										
											
											
										</div>
										
										
										
										
									</form>

									<hr />

								

						</div>
					</div>

					<!--
						</div>
					</div>
					-->
				
					
					<?php
					mysqli_close($conexion);
					?>
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