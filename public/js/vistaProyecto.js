loadingComent = new Loading('nuevoComentario','loadingComent');

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
  var colorObjReaccion = objTipoReaccion[0].nextSibling.style.borderColor;

function comentar() {
  var objBtn = document.getElementById('nuevoComentSend');
  objBtn.disabled = true;
  comentario = objComentario.value;
  idTipoReaccion = objTipoReaccion.value;
  if(comentario=="") {
    objComentario.style.borderColor="red";
  	alertP("Comentario vacío","El campo para el comentario de su evaluación está vacío.");
    objBtn.disabled = false;
  	return;
  }else{
    objComentario.style.borderColor=colorComentario;
  }
  if (idTipoReaccion=="") {
    for (var i = objTipoReaccion.length - 1; i >= 0; i--) {
      objTipoReaccion[i].nextSibling.style.borderColor="red";
    }
  	alertP("Reacción no seleccionada",'Escoja una reacción que represente su opinión acerca del proyecto.');
  	objBtn.disabled = false;
    return;
  }
  loadingComent.load(1);
  var data = "comentario="+comentario+"&idPublicacion="+idPublicacion+"&idTipoReaccion="+idTipoReaccion;
  var url = config['url']+"Usuario/comentar";
  coment = new XMLHttpRequest();
    coment.open("POST", url ,true);
    coment.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    coment.send(data);

    coment.onreadystatechange = function (){
      if (coment.readyState == 4) {
        if (parseInt(coment.responseText)==0) {
          location.reload();
          //agregarComent(idTipoReaccion);
        	//alertP('Evaluación registrada','Muchas gracias por evaluar este proyecto.',1);
        }else{
          objBtn.disabled = false;
        	alertP("Error al evaluar","Ocurrió un problema al registrar su evaluación. Por favor intente más tarde.");
        }
        loadingComent.load(0);
      }
    }
}

function agregarComent(idTipoReaccion){
  var nombreCompleto = document.forms.nuevoComentario.nombreCompleto.value;
  var username = document.forms.nuevoComentario.nombreCompleto.value;
  var src = document.getElementById(idTipoReaccion).nextSibling.children[0].src;
  console.log(src);
  foo='<div id="comentario"><div id="calificacion"><img src='+src+' alt=""></div><div id="contenido"><h3>'+nombreCompleto+' | @'+username+'</h3><p>'+comentario+'</p></div></div>';
  if (noHayComents==null) {
    divComents.innerHTML += foo;
  }
  else{
    divComents.innerHTML = foo;
  }
  document.getElementById("nuevoComentario").innerHTML = "<p>Ya has evaluado este proyecto</p>";  
}

function regresarEstilo(){
  for (var i = objTipoReaccion.length - 1; i >= 0; i--) {
    objTipoReaccion[i].nextSibling.style.borderColor=colorObjReaccion;
  }
}
