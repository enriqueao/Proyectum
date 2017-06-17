loadingEliminar = new Loading('perf-lat','loadingEliminar');

function eliminar(idProyecto){
	if(confirm("¿Está seguro de eliminar el proyecto?")){
		eliminarOk(idProyecto);
	}
}

function eliminarOk(idProyecto){
	loadingEliminar.load(1);
	var url = config.url+"Usuario/eliminarProyecto";
  	var datos = "idPublicacion=" + idProyecto;
	cargar = new XMLHttpRequest();
	cargar.open("POST", url ,true);
	cargar.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	cargar.send(datos);
	cargar.onreadystatechange = function (){
		if (cargar.readyState == 4) {
			if(parseInt(cargar.responseText)==1){
				alertP("Proyecto eliminado.","El proyecto fue eliminado exitosamente",1);
				location.reload();
			}else{
				alertP("Error.","Ocurrió una errror al eliminar el proyecto. Intente más tarde.");
			}
			loadingEliminar.load(0);
		}
	}
}