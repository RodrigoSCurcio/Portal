<?php
function LostPassTemplate($user, $link){
$HTML = '
  <html>
  <body style="background: #FFFFFF;font-family: Verdana; font-size: 14px;color:#1c1b1b;">
  <div style="">
      <h2>Olá '.$user.'</h2>
      <p style="font-size:17px;">Solicitação de mudança de senha.</p>
    <p>No dia '. date('d/m/Y', time()).' foi gerado uma solicitação para mudar sua senha. <br /> Se não solicitou a troca de senha ignore essa mensagem.</p>
    <p style="padding:15px;background-color:#ECF8FF;">
        Para modificar sua senha basta <a style="font-weight:bold;color: #2BA6CB;" href="'.$link.'" target="_blank">clicar aqui &raquo;</a>
    </p>
      <p style="font-size: 9px;">&copy; '. date('Y',time()) .' '.APP_TITLE.'. Todos os direitos reservados.</p>
  </div>
  </body>
  </html>
  ';

      return $HTML;
}

?>