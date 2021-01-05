<?php
unset($_SESSION['app_id'], $_SESSION['quantidade_usuarios'], $_SESSION['users']);
header('location: ?view=index');
?>