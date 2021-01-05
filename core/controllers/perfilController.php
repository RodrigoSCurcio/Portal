<?php

if(isset($_GET['id']) and array_key_exists($_GET['id'], $users)){
	$id_usuario = intval($_GET['id']);
	$db = new Conexion();

	$sql = $db->query("SELECT COUNT(id) FROM temas WHERE id_dono='$id_usuario';");

	include(HTML_DIR . 'perfil/perfil.php');

}


$db->close();
?>