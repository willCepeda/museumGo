<?php
//getting data from database
 //print "valor get: ".$_GET['coleccion'];
if(!empty($_GET)){
	
	
	$con = new mysqli("localhost","root","","museo");
	$con->set_charset("utf8");
	
	 if(!empty($_GET['museo'])){
	
		$query ="SELECT * FROM obras WHERE coleccion ='".$_GET['museo']."' and imagen !='' ORDER BY RAND() LIMIT 3";
		
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

