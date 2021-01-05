function __(id){
	return document.getElementById(id);
}


function DeleteItem(conteudo,url) {
  var action = window.confirm(conteudo);
  if (action) {
      window.location = url;
  }
}