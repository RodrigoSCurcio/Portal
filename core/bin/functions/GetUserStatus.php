<?php 

function GetUserStatus($time){
	if($time >= (time() - (60*5))){
	return 'icon-online.gif';
}else{
	return 'icon-offline.gif';
}
}

 ?>