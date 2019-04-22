<?php
//getting data from database
 //print "valor get: ".$_GET['coleccion'];
if(!empty($_GET)){
	
	
	$con = new mysqli("localhost","root","","museo");
	$con->set_charset("utf8");
	
	if(!empty($_GET['pintor'])){
		
		$porcion=explode(" ",$_GET['pintor'],-1);
		$str = "";
		foreach($porcion as $value){
			$str.="'".$value."',";
		}
		$tam=strlen($str);
		$rs = substr($str,0,$tam-1);
		$query="select o.nombre,o.imagen,o.codigo_obra,p.nombre as nom_pint from pintores p, obras o where p.codigo_pintor=o.codigo_pintor and o.coleccion='".$_GET['coleccion']."' and o.codigo_pintor IN(".$rs.") ORDER by p.nombre";
	
		$result = mysqli_query($con,$query);

		//storing in array
		$data =array();
		while($row = mysqli_fetch_assoc($result)){
			
			$data[] = $row;

		}
		//returning response in JSON format
		echo json_encode($data);
		
	}else if(!empty($_GET['coleccion'])){
	
		$query ="select o.nombre,o.imagen,o.codigo_obra from obras o where o.coleccion='".$_GET['coleccion']."'";
		
		$result = $con->query($query);
		//storing in array
		$data_ =array();
		while($row = mysqli_fetch_assoc($result)){
			
			$data_[] = $row;

		}
		//returning response in JSON format
		echo json_encode($data_);
		
	}
	
		mysqli_close($con);
}

?>

