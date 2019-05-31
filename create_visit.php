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
	
	function loadPainters(){
		
		if(isMuseum!=""){
		//alert(isMuseum);
		//call ajax
		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url="getMuseos.php?museo="+isMuseum;
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
				if(data.length >0){
				for(var i=0; i < data.length; i++)
				{
					var image= data[i].imagen;
					var name = data[i].nombre;
					var cod_painter=data[i].codigo_pintor;
					var genero=data[i].genero;
					var url_imagen="";
					arrayPintores[cod_painter]=name;
					if(image==''){
						
						if(genero=="masculino") url_imagen="images/pintor.jpg";
						else url_imagen="images/pintora.jpg";
						
						image= url_imagen;
					}
					
					pinters_img+="<div class='col-4' align='center'><span class='image fit'><img src='"+image+"' alt='"+name+"'  width='50' height='300'/><br>";
					//pinters_img+="<img value ='"+cod_painter+"' src='"+image+"' alt='"+name+"' width='50' height='300'>";
					
					pinters_img+="<input type='checkbox' value='"+cod_painter+"' id='pintor"+i+"' name='pintores' >";
					pinters_img+="<label for='pintor"+i+"'>"+name+"</label>";
					pinters_img+="</span></div>";
				}
					numPintores=i;
					i=0;
					
				}else {
					
					pinters_img="<header><p><b>No existen pintores para este Museo</b></p></header>";
					numPintores=0;
				}
				
				//replacing the div for the data
				document.getElementById("divtPainters").innerHTML=pinters_img;
				
				
			}
	
			//isMuseum="";
		}
		}else{//Opcion que no ha elegido ningun valor
			pinters_img="<header><p><b>No ha elegido ningun Museo</b></p></header>";
			document.getElementById("divtPainters").innerHTML=pinters_img;
		}
	}	
	

	function loadObras(){
		//alert(document.getElementById('pintores').value);
		//var porNombre=document.getElementsByName("pintores")[0].checked;
		//var porNombre2=document.getElementsByName("pintores")[1].checked;
		//alert(document.getElementById('museum').value);
		var seleccionado=0;
		var pintores=new Array();
		if(numPintores!=0){
			for(var i=0;i < numPintores;i++){
				//comprobamos que haya pintores selecionado
				var check=document.getElementById("pintor"+i).checked;
				//alert(check);
				if(check){
					pintores[seleccionado]=document.getElementById("pintor"+i).value;
					seleccionado++;
					
				}
				
			}
	
			
		}
		
		
		if(document.getElementById('museum').value ==""){
			alert("No hay museo seleccionado,SE RECOMIENDA SELECCIONAR MUSEO");	
			
		}else if(seleccionado == 0 ){
			alert("No hay pintores seleccionados,SE CARGARA LA COLECCIÓN DEL MUSEO");
			var museo = document.getElementById('museum').value;
			var pint="";
			//call ajax
					var ajax_col = new XMLHttpRequest();
					var method = "GET";
					var url="getObras.php?pintor="+pint+"&coleccion="+museo;
		
					
					var asynchronous = true;
					
					ajax_col.open(method,url, asynchronous);
					
					//sending ajax request
					ajax_col.send();
						//receiving response from data.php
					ajax_col.onreadystatechange= function()
					{
						if(this.readyState == 4 && this.status == 200)
						{
							
							//converting JSON back to array
							//alert(this.responseText);
							var data_ob = JSON.parse(this.responseText);
							console.log(data_ob);
							//html value for div
							
							var obras_img ="";
							
							for(var i=0; i < data_ob.length; i++)
							{
								var image= data_ob[i].imagen;
								var name = data_ob[i].nombre;
								var cod_obra=data_ob[i].codigo_obra;
								var url_imagen="";
								if(image==''){
									
									url_imagen="images/paleta.png";
									
									
									image= url_imagen;
								}
								
								obras_img+="<div class='col-4' align='center'><span class='image fit'><img src='"+image+"' alt='"+name+"'  width='50' height='300'/><br>";
								
								obras_img+="<input type='checkbox' value='"+name+"' id='obra"+i+"' name='obras' >";
								obras_img+="<label for='obra"+i+"'>"+name+"</label>";
								obras_img+="</span></div>";
							}
								numObras=i;
								i=0;
							//replacing the div for the data
							document.getElementById("divObras").innerHTML=obras_img;
							
						}
	
			
				}
					
		
		}else{//Hay pintores selecionado
	
			var ajax_o = new XMLHttpRequest();
			var method = "GET";
			var cod_p="";
			for(var i=0;i < seleccionado;i++){
				
				cod_p+=pintores[i]+"+";
			}		
					var url="getObras.php?pintor="+cod_p+"&coleccion="+isMuseum;
	
					var asynchronous = true;
					
					ajax_o.open(method,url, asynchronous);
					
					//sending ajax request
					ajax_o.send();
								
						
					ajax_o.onreadystatechange= function()
					{
						if(this.readyState == 4 && this.status == 200)
						{
							
							//converting JSON back to array
							
							var data_rs = JSON.parse(this.responseText);
							console.log(data_rs);
							//html value for div
							
							var obras_img ="";
							var aux ="";
							for(var i=0; i < data_rs.length; i++)
							{
								var image= data_rs[i].imagen;
								var name = data_rs[i].nombre;
								var cod_obra=data_rs[i].codigo_obra;
								var url_imagen="";
								var name_pintor = data_rs[i].nom_pint;
								if(image==''){
									
									url_imagen="images/paleta.png";
									
									
									image= url_imagen;
								}
								
								if(aux==''){
									aux = name_pintor;
									obras_img+="<div class='col-12'>";
									obras_img+="<header>";
									obras_img+="<h4>Pinturas de <b>"+name_pintor+"</b></h4>";
									obras_img+="</header>";
									obras_img+="</div>";
									
								}else if( aux != name_pintor){
									obras_img+="<div class='col-12'>";
									obras_img+="<hr>";
									obras_img+="<header>";
									obras_img+="<h4>Pinturas de <b>"+name_pintor+"</b></h4>";
									obras_img+="</header>";
									obras_img+="</div>";
									
									aux = name_pintor;
								}
									//obras_img+="<div class='col-12'>";
									//obras_img+="<h4>Pinturas de <b>"+name_pintor+"</b></h4>";
									//obras_img+="</div>";
								
								
								obras_img+="<div class='col-4' align='center'><span class='image fit'><img src='"+image+"' alt='"+name+"'  width='50' height='300'/><br>";
								
								obras_img+="<input type='checkbox' value='"+name+"' id='obra"+i+"' name='obras' >";
								obras_img+="<label for='obra"+i+"'>"+name+"</label>";
								obras_img+="</span></div>";
							}
								numObras=i;
								i=0;
							//replacing the div for the data
							document.getElementById("divObras").innerHTML=obras_img;
							
						}
	
			
				}
					
				
			
			
			
		} 
		 
		
	}
	
	function verificarDatos(){
		var con_pint="";
		var con_ob="";
		if(numPintores!=0){
			for(var i=0;i < numPintores;i++){
				//comprobamos que haya pintores selecionado
				var check=document.getElementById("pintor"+i).checked;
				//alert(check);
				if(check){
					var p=document.getElementById("pintor"+i).value;
					con_pint+=arrayPintores[p]+",";
					
				}
				
			}
			var n = con_pint.length;
			con_pint = con_pint.substring(0,n-1);
			document.getElementById("pintores_museo").value = con_pint;
		}
	//Verificamos las obras seleccionadas
		if(numObras!=0){
			for(var i=0;i < numObras;i++){
				//comprobamos que haya pintores selecionado
				var check=document.getElementById("obra"+i).checked;
				//alert(check);
				if(check){
					var o=document.getElementById("obra"+i).value;
					con_ob+=o+",";
					
				}
				
			}
			var n = con_ob.length;
			con_ob = con_ob.substring(0,n-1);
			document.getElementById("obras_museo").value = con_ob;
		}
	
	}
	
	
		$(document).ready(function(){
  
  var boton_rut;
  
  boton_rut = $('#rut_check');
  
  boton_rut.on('click', function(){
    
     var valor_input, valor_rut;
	 var valor_nombre,nombre;
    valor_input = $('#nameVisit');
    valor_rut = valor_input.val();
    
    if(valor_rut === ''){
      alert('No has colocado el nombre de la visita');
	  return false;
    }
    
	
  }); 
  
});
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
						<h2><img src="images/LOGO/LOGO.png"/></h2>
						<p>Crear una nueva visita.</p>
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
									<form method="post" action="load_visit.php">
										<div class="row gtr-uniform gtr-50">
											<header>
											<h4><b>Nombre de la visita:</b></h4>
					
											</header>
											<div class="col-6 col-12-mobilep">
												<input type="text" name="nameVisit" id="nameVisit" value="" placeholder="" />
											</div>
											
											<!--<div class="col-6 col-12-mobilep">
												<input type="email" name="email" id="email" value="" placeholder="Email" />
											</div>
											
											-->
											<div class="col-12">
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
											
											<div class="col-12">
											
											<section class="box">
											<header>
											<p>Pintores &nbsp; &nbsp; <input type="button"  class="button alt small" onClick="loadPainters()" value ="Cargar pintores" ></p>
											</header>
											<div class="box alt">
												<div class="row gtr-50 gtr-uniform" id="divtPainters">
											
												</div>
											</div>

											
											</section>
											
											</div>
											
											<div class="col-12">
											<section class="box">
											<header>
											<p>Obras de los pintores &nbsp; &nbsp; <input type="button"  class="button alt small" onClick="loadObras()" value ="Cargar obras" ></p>
											</header>
											<div class="box alt">
												<div class="row gtr-50 gtr-uniform" id="divObras">
											
												</div>
											</div>

											
											</section>
											
											</div>
											
											<!--
											<div >
											<input type="checkbox" value="1" id="h1" name="h1"> 
											<label for="h1" >prueba</label>
												
											<input type="checkbox"  value="2" id="h2" name="h1"> 
											<label for="h2">prueba2</label>
											
											<input type="checkbox"  value="3" id="c" name="h3"> prueba3
											</div>
											-->
											<header>
											<p>Pasos relevantes de la visita:</p>
											</header>
											<div class="col-12">
												<textarea name="comentario" id="message" placeholder="Introduce las indicaciones para tu visita" rows="6"></textarea>
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
											<div class="col-12">
											<hr/>
											</div>
											
											<input type="hidden" id="el_museo" name="rsEmuseo" value="">
											<input type="hidden" id="pintores_museo" name="rsPintores" value="">
											<input type="hidden" id="obras_museo" name="rsMuseo" value="">
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit"  id="rut_check" value="Crear Visita" onClick="verificarDatos()" /></li>
													<li><input type="reset" value="Reset" class="alt" onClick="location.reload();" /></li>
												</ul>
											</div>
										</div>
										
										
										
										
									</form>

								

								</section>

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