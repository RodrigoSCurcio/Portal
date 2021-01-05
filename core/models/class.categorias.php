<?php 



Class Categorias{
	private $db;
	private $id;
	private $nome;

	public function __construct(){
		$this->db = new Conexion();
	}


	public function Errors($url){
		try {
			if(empty($_POST['nome'])){
				throw new Exception(1);
			}else{
				$this->nome = $this->db->real_escape_string($_POST['nome']);
			}
		} catch (Exception $error) {
			header('location: ' .$url. $error->getMessage());
			exit;
		}
	}

	public function Add(){
		$this->Errors('?view=categorias&mode=add&error=');
		$this->db->query("INSERT INTO categorias (nome) VALUES ('$this->nome');");
		header('location: ?view=categorias&mode=add&success=true');

	}

	public function Edit(){
		$this->id = intval($_GET['id']);
		$this->Errors('?view=categorias&mode=edit&id='.$this->id.'$error=');
		$this->db->query("UPDATE categorias SET nome='$this->nome' WHERE id='$this->id';");
		header('location: ?view=categorias&mode=edit&id='.$this->id.'&success=true');
	}

	public function Delete(){
		$this->id = intval($_GET['id']);
		$q = "DELETE FROM categorias WHERE id='$this->id';";
		$q .= "DELETE FROM foruns WHERE id_categoria='$this->id';";
		$sql = $this->db->query("SELECT id FROM foruns WHERE id_categoria='$this->id';");
		if($this->db->rows($sql) > 0){
			while($data = $this->db->recorrer($sql)){
				$id_forum = $data[0];
				$q .= "DELETE FROM temas WHERE id_forum='$id_forum';";

			}
		}

		$this->db->liberar($sql);
		$this->db->multi_query($q);
		header('location: ?view=categorias');

	}



	public function __destruct(){
		$this->db->close();
	}
}

 ?>

