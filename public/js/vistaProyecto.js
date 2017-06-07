var textarea = document.getElementById("nuevoComentComent");

textarea.oninput = function(){
	textarea.style.height = "";
    textarea.style.height = 'height:auto';
    textarea.style.height = textarea.scrollHeight + "px";
  };

function comentar() {

  var comentario = document.forms.nuevoComentario.comentario.value;
  var idPublicacion = document.forms.nuevoComentario.idPublicacion.value;
  var idTipoReaccion = document.forms.nuevoComentario.reaccion.value;

  if(comentario=="") {
  	alert("Comentario vacío.");
  	return;
  }
  if (idTipoReaccion=="") {
  	alert('Escoja una reaccion para el proyecto.');
  	return;
  }

  var data = "comentario="+comentario+"&idPublicacion="+idPublicacion+"&idTipoReaccion="+idTipoReaccion;
  var url = config['url']+"Usuario/comentar";
  coment = new XMLHttpRequest();
    coment.open("POST", url ,true);
    coment.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    coment.send(data);

    coment.onreadystatechange = function (){
      if (coment.readyState == 4) {
        console.log(coment.responseText)
        if (parseInt(coment.responseText)==0) {
        	alert('ok');
        	// renderComentario();
        }else{
        	alert("Ocurrió un problema al registrar su evaluación. Por favor intenete más tarde.");
        }
      }
    }
}

