var saltos=9;
var desde=6;
function cargarMas(){
	loading(1);
	cargarAki=document.getElementById('cargarAki');
	var url = config.url+"Index/cargarMas";
  	var datos = "desde=" + desde+"&saltos=" + saltos;

	cargar = new XMLHttpRequest();
	cargar.open("POST", url ,true);
	cargar.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	cargar.send(datos);
	cargar.onreadystatechange = function (){
		if (cargar.readyState == 4) {
			console.log(cargar.responseText);
			loading(0);
			desde+=saltos;
			cargarAki.innerHTML+=cargar.responseText;
		}
	}
}