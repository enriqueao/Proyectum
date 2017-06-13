function iniciarSesion() {
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;

	if (username != '' && password != '') {
		if (true) {
			var url = config.url+"Usuario/iniciarSesion/";
		  var datos = "username=" + username + "&password=" + password;

			logIn = new XMLHttpRequest();
			logIn.open("POST", url ,true);
			logIn.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			logIn.send(datos);
			logIn.onreadystatechange = function (){
				if (logIn.readyState == 4) {
					console.log(logIn.responseText);
					switch(parseInt(logIn.responseText)){
            case 1:
            location.reload();
            break;

            case 2:
						alert('Verifica tu usuario y/o Contraseña');
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

function cerrarSesion() {
	var url = config.url+"Usuario/cerrarSesion/";
	logOut = new XMLHttpRequest();
	logOut.open("POST", url ,true);
	logOut.send();
	logOut.onreadystatechange = function (){
		if (logOut.readyState == 4) {
			if(logOut.responseText == '1'){
				location.reload();
			}
		}
	}
}
