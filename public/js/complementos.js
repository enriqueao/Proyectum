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

	var alerta = document.createElement("script");
	alerta.src = config['url']+"public/js/alertas.js";
	alerta.type="text/javascript";
	document.head.appendChild(alerta);
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