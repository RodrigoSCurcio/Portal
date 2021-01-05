<?php 

function Foruns(){
	$db = new Conexion();
	$sql = $db->query("SELECT * FROM foruns;");
	if($db->rows($sql) > 0){
		while($data = $db->recorrer($sql)){
			$foruns[$data['id']] = $data;
				
		}
	}else{
		$foruns = false;
	}

	$db->liberar($sql);
	$db->close();

	return $foruns;
}

 ?>