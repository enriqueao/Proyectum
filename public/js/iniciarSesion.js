loadingSesion = new Loading("capa","loadingSesion");

function iniciarSesion() {
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;

	if (username != '' && password != '') {
		if (true) {
			loadingSesion.load(1);
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
            	loadingSesion.load(0);
				alertP('Error.','Verifica tu usuario y/o contraseña.');
            break;

            default:
            	loadingSesion.load(0);
            	alertP('Error.','Verifica tu usuario y/o contraseña.');
            break;
        	}
				}
			}
		}
	} else {
		alertP('Campos vacíos.','Completa los campos para iniciar sesión.');
	}
}
