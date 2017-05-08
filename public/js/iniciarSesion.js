function iniciarSesion() {
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;

	if (username != '' && password != '') {
		if (validarUser()) {
			var url = config['url']+"Usuario/iniciarSesion/";
		    var datos = "username=" + username + "&password=" + password;

			logIn = new XMLHttpRequest();
			logIn.open("POST", url ,true);
			logIn.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			logIn.send(datos);
			logIn.onreadystatechange = function (){
				if (logIn.readyState == 4) {
					switch(parseInt(logIn.responseText)){
		                case 0:
		                alertFlotante('La cuenta esta bloqueada',2);
		                mensaje();
		                break;

		                case 1:
		                location.reload();
		                break;

		                case 4:
		                break;

		                default:
		                alert('Verifica tu usuario y/o Contraseña');
		                break;
		        	}
				}
			}
		}
	} else {
		alert('Completa los campos');
	}
}


function validarUser() {
	var userName = document.getElementById('username').value;
	var password = document.getElementById('password').value;

	if (userName.match("[0-9]{4,6}") || userName.match("[A-Za-z]{1}[0-9]{4}") || userName.match("[A-Za-z0-9_\.\-]\@[A-Za-z0-9\-]{3,}\.[A-Za-z0-9]{2,}")) {
		return true
	} else {
		alertFlotante('Usuario o Contraseña Incorrectos',3);
	}
}

function carga() {
	var mensaje = document.getElementById('mensajeLogin');
	mensaje.innerHTML = '<img width="20%" src="'+config['url']+'/public/images/uploading.gif">';

}

function mensaje() {
	var timeoutId = setTimeout(function(){
    	var mensaje = document.getElementById('mensajeLogin');
		mensaje.innerHTML = '<button id="btnIniciarSesion" name="btnIniciarSesion" onclick="iniciarSesion()">Entrar</button>';
  },2000);
}

function primerInicio(){
	location.href = config['url']+"Usuario/index";
}
