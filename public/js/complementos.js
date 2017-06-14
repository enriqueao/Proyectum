/**
*
* @author Enrique Aguilar Orozco
*
*/
window.addEventListener('load',function() {
	var favicon = document.createElement('link');
	favicon.rel='shortcut icon';
	favicon.href=config['url']+'favicon.ico';
	document.head.appendChild(favicon);

	var iniciarSesion = document.createElement("script");
	iniciarSesion.src = config['url']+"public/js/iniciarSesion.js";
	iniciarSesion.type="text/javascript";
	document.head.appendChild(iniciarSesion);

	var click = document.createElement("script");
	click.src = config['url']+"public/js/click.js";
	click.type="text/javascript";
	document.head.appendChild(click);

	var buscador = document.createElement("script");
	buscador.src = config['url']+"public/js/buscador.js";
	buscador.type="text/javascript";
	buscador.setAttribute("defer", "defer");
	document.head.appendChild(buscador);
},false);

function addFunctionWindowOnload(callback){
      if(window.addEventListener){
          window.addEventListener('load',callback,false);
      }else{
          window.attachEvent('onload',callback);
      }
}

window.addEventListener('load',function(){
	localStorage.setItem('activadorAlertas','0');
},false);

window.addEventListener('load',function() {
	window.addEventListener('online',onOnline,false);;
	window.addEventListener("offline", offline, false);
},false);

function onOnline() {
	var notificacion = document.querySelector('#notificacion');
	var backBlack = document.querySelector('#blackBack');
	if(notificacion != 'undefined' && backBlack != 'undefined' && notificacion != null && backBlack != null){
		notificacion.remove();
		backBlack.remove();
		localStorage.activadorAlertas = '0';
	}
	alertFlotante('Tu conexión se ha restablecido, sigue trabajando con normalidad',1);
}

function offline() {
	var notificacion = document.querySelector('#notificacion');
	var backBlack = document.querySelector('#blackBack');
	if(notificacion != 'undefined' && backBlack != 'undefined' && notificacion != null && backBlack != null){
		notificacion.remove();
		backBlack.remove();
		localStorage.activadorAlertas = '0';
	}
	alertFlotante('Actualmente te encuentras sin Conexión, Verifica tu conexión o espera un momento',3);
}
