<?php 

if(isset($_SESSION['app_id']) and $users[$_SESSION['app_id']]['permissoes'] >= 2){

	$isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;

	require('core/models/class.configForuns.php');
	$configForuns = new ConfigForuns();

	switch(isset($_GET['mode']) ? $_GET['mode'] : null){
		case 'add':
		if($_POST){
			$configForuns->Add();
		}else{
			include(HTML_DIR . 'foruns/add_foruns.php');
			
		}
		break;

		case 'edit':
			if($isset_id and array_key_exists($_GET['id'], $_foruns)){
				if($_POST){
					
					$configForuns->Edit();
					
				}else{
				  include(HTML_DIR . 'foruns/edit_forum.php');
				}
				
			}else{
				header('location: ?view=configForuns');
			}
		break;

		case 'delete':
			if($isset_id){
				$configForuns->Delete();
				}else{
					header('location: ?view=configForuns');
				}
		break;

		default:
			
			include(HTML_DIR . 'foruns/all_foruns.php');
			
		break;

	}

}else{
	header('location: ?view=index');
}

 ?>