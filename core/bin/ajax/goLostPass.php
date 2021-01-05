<?php

$db = new Conexion();

$email = $db->real_escape_string($_POST['email']);
$sql = $db->query("SELECT id, user FROM users WHERE email = '$email' LIMIT 1;");
if($db->rows($sql) > 0){

	$data = $db->recorrer($sql);
	$id = $data[0];
	$user = $data[1];
	$keypass = md5(time());
	$new_pass = strtoupper(substr(sha1(time()),0,8));
	$link = APP_URL . '?view=lostpass&key=' . $keypass;

	$mail = new PHPMailer;
	 $mail->CharSet = "UTF-8";
  	 $mail->Encoding = "quoted-printable";

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = PHPMAILER_USER;                 // SMTP username
$mail->Password = PHPMAILER_PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

$mail->SMTPOptions = array(
      'tls' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  ); 

$mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to

$mail->setFrom(PHPMAILER_USER, APP_TITLE);
$mail->addAddress($email, $user);     // Add a recipient
             // Name is optional

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Recuperação de Senha';
$mail->Body    = LostPassTemplate($user, $link);
$mail->AltBody = 'Olá' . $user . 'para mudar sua senha clique aqui:' .$link;

if(!$mail->send()) {
    
    $HTML = '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>ERRO:</strong> Ocorreu um erro. ' . $mail->ErrorInfo . '
  </div>';
} else {

    $db->query("UPDATE users SET keypass = '$keypass', new_pass='$new_pass' WHERE id='$id'; ");



	$HTML = 1;
}


	

}else{
	 $HTML = '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>ERRO:</strong> Este e-mail não está registrado! 
  </div>';
}

$db->liberar($sql);
$db->close();
echo $HTML;

?>