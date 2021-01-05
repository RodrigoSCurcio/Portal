<?php 
if(isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1){
	$id_forum = intval($_GET['id']);
	if(array_key_exists($id_forum, $_foruns)){
		$db = new Conexion();
		$sql_anuncios = $db->query("SELECT * FROM temas WHERE id_forum = '$id_forum' AND tipo='2' ORDER BY id DESC;");

		$sql_nao_anuncios = $db->query("SELECT * FROM temas WHERE id_forum = '$id_forum' AND tipo='1' ORDER BY id DESC;");

		include(HTML_DIR . 'temas/temas.php');
		$db->liberar($sql_anuncios, $sql_nao_anuncios);
		$db->close();

	}else{
		header('location: ../index.php?view=index');
	}
}else{
	header('location: ../index.php?view=index');
}


 ?>

