<?php
//getting data from database
if(!empty($_GET)){
	$conn = mysqli_connect("localhost","root","","museo");
	if(!empty($_GET['museo'])){
		
		//getting data from employe table
		/*$query ="select p.codigo_pintor,p.nombre,p.imagen,p.genero from museo_cn_pintor m, pintores p where m.codigo_museo='".$_GET['museo']."' and m.codigo_pintor =p.codigo_pintor ";*/
		
		$query="select  DISTINCT p.codigo_pintor,p.nombre,p.genero,p.imagen from pintores p, obras o where p.codigo_pintor=o.codigo_pintor and o.coleccion='".$_GET['museo']."'";
		$result = mysqli_query($conn,$query);

		//storing in array
		$data =array();
		while($row = mysqli_fetch_assoc($result)){
			
			$data[] = $row;

		}
		//returning response in JSON format
		echo json_encode($data);
		
	}/*else{
		$query ="select p.codigo_pintor,p.nombre,p.imagen,p.genero from museo_cn_pintor m, pintores p where m.codigo_museo='' and m.codigo_pintor =p.codigo_pintor ";
		$result = mysqli_query($conn,$query);

		//storing in array
		$data =array();
		while($row = mysqli_fetch_assoc($result)){
			
			$data[] = $row;

		}
		
		echo json_encode($data);
	}*/
	mysqli_close($conn);
}

?>