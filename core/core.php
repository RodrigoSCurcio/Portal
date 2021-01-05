<?php

session_start();

date_default_timezone_set('America/Fortaleza');

//CHAMADA DAS CLASSES OU ARQUIVOS
require('vendor/autoload.php');
require('core/models/class.Conexion.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');
require('core/bin/functions/Categorias.php');
require('core/bin/functions/Foruns.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/LostPassTemplate.php');
require('core/bin/functions/UrlAmigavel.php');
require('core/bin/functions/BBcode.php');
require('core/bin/functions/OnlineUsers.php');
require('core/bin/functions/GetUserStatus.php');
require('core/bin/functions/Visitas.php');

//CONSTANTES PARA DIRETÓRIOS
define('HTML_DIR', 'html/');
define('APP_TITLE', 'Portal Freitas');
define('APP_URL', 'http://portaldenoticias-cc.umbler.net/');


//CONSTANTES PARA O BD LOCAL
//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASS', '');
//define('DB_NAME', 'portal');


//CONSTANTES PARA O BD HOSPEDADO NA UMBLER
define('DB_HOST', 'mysql796.umbler.com');
define('DB_USER', 'hugoportal');
define('DB_PASS', 'HugoNoticias');
define('DB_NAME', 'portalnoticias');


//CONSTANTES PARA TAMANHO DE CARACTERES
define('MIN_TITULO_TEMAS', 8);
define('MIN_CONTEUDO_TEMAS', 50);


//CONSTANTES PARA PHPMAILER
define('PHPMAILER_HOST', 'smtp-mail.outlook.com');
define('PHPMAILER_USER', 'cadastroportalfreitas2@hotmail.com');
define('PHPMAILER_PASS', 'PortalFreitas');
define('PHPMAILER_PORT', 587);



$users = Users();
$_categorias = Categorias();
$_foruns = Foruns();
?>