var textarea = document.getElementById("nuevoComentComent");
var divComentarios = document.getElementById('comentarios');
var noHayComents = document.getElementById('noHayComents');
var comentario = "";
var idPublicacion = document.forms.nuevoComentario.idPublicacion.value;
var idTipoReaccion = "";
var divComents = document.getElementById('divComents');

textarea.oninput = function(){
	textarea.style.height = "";
    textarea.style.height = 'height:auto';
    textarea.style.height = textarea.scrollHeight + "px";
  };


  var objComentario = document.forms.nuevoComentario.comentario;
  var colorComentario = document.forms.nuevoComentario.comentario.style.color;
  var objTipoReaccion = document.forms.nuevoComentario.reaccion;
  // var idTipoReaccion = objTipoReaccion.value;
  var colorObjReaccion = objTipoReaccion[0].nextSibling.style.borderColor;

function comentar() {
  comentario = objComentario.value;
  idTipoReaccion = objTipoReaccion.value;

  if(comentario=="") {
    objComentario.style.transitionDuration = "1s";
    objComentario.style.borderColor="red";
  	// alert("Comentario vacío.");
  	return;
  }else{
    objComentario.style.borderColor=colorComentario;
  }
  if (idTipoReaccion=="") {
    for (var i = objTipoReaccion.length - 1; i >= 0; i--) {
      objTipoReaccion[i].nextSibling.style.borderColor="red";
    }
  	// alert('Escoja una reaccion para el proyecto.');
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
        // console.log(coment.responseText)
        if (parseInt(coment.responseText)==0) {
          agregarComent();
        	alert('ok');
        	// renderComentario();
        }else{
          agregarComent();
        	alert("Ocurrió un problema al registrar su evaluación. Por favor intente más tarde.");
        }
      }
    }
}
function agregarComent(){
  document.forms.nuevoComentario.innerHTML = "<p>Proyecto ya evaluado</p>";
  foo='<div id="comentario"><div id="calificacion"><img src='+idTipoReaccion+' alt=""></div><div id="contenido"><h3>'+idTipoReaccion+' | @'+idTipoReaccion+'</h3><p>'+comentario+'</p></div></div>';
  if (noHayComents==null) {
    divComents.innerHTML += foo;
  }
  else{
    divComents.innerHTML = foo;
  }
}

function regresarEstilo(){
  for (var i = objTipoReaccion.length - 1; i >= 0; i--) {
    console.log(colorObjReaccion);
    objTipoReaccion[i].nextSibling.style.borderColor=colorObjReaccion;
  }
}
