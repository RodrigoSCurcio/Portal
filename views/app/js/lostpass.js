function goLostPass(){
  var connect, form, response, result, email;
  email = __('email_lostpass').value;
  
  form = 'email=' + email;

  if(email != ''){
     connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function(){
    if(connect.readyState == 4 && connect.status == 200){
      if(connect.responseText == 1){
        result = '<div class="alert alert-dismissible alert-success">';
            result += '<h4>Sucesso!</h4>';
            result += '<p><strong>Enviando confirmação para o email...</strong></p>';
            result += '</div>';
          __('_AJAX_LOSTPASS_').innerHTML = result;
          location.reload();
         }else{
          __('_AJAX_LOSTPASS_').innerHTML = connect.responseText;
         }

    }else if(connect.readystate != 4){
    result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Estamos Tentando Recuperar a senha....</strong></p>';
      result += '</div>';
      __('_AJAX_LOSTPASS_').innerHTML = result;
    }
  }
  connect.open('POST', 'ajax.php?mode=lostpass', true);
  connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  connect.send(form);
  }else{
    result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Erro...</h4>';
      result += '<p><strong>O campo email tem que está preenchido....</strong></p>';
      result += '</div>';
      __('_AJAX_LOSTPASS_').innerHTML = result;
  }
  
 
}


function runScriptLostPass(e){
  if(e.keyCode == 13){
    goLostPass();
  }
}