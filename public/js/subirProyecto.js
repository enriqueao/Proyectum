var textarea = document.getElementById("inputDescLarga");
var textarea2 = document.getElementById("inputDescCorta");

textarea.oninput = function(){
	textarea.style.height = "";
    textarea.style.height = 'height:auto';
    textarea.style.height = textarea.scrollHeight + "px";
  };

textarea2.oninput = function(){
	textarea2.style.height = "";
    textarea2.style.height = 'height:auto';
    textarea2.style.height = textarea2.scrollHeight + "px";
  };

function baseName(str){
	str=str.toString()
   var base = new String(str).substring(str.lastIndexOf('\\') + 1); 
    // if(base.lastIndexOf(".") != -1)       
    //     base = base.substring(0, base.lastIndexOf("."));
   return base;
}

var objCategoria = document.forms.subirProyecto.categoria;
var colorCategoria = objCategoria.style.backgroundColor;

var objTitulo = document.forms.subirProyecto.titulo;
var colorTitulo = objTitulo.style.borderColor;

var objDescCorta = document.forms.subirProyecto.descCorta;
var colorDesc = objDescCorta.style.borderColor;

var objDescLarga = document.forms.subirProyecto.descLarga;
var objImgs = Array.from(document.forms.subirProyecto.img);
var colorImg = objImgs[0].nextSibling.nextSibling.style.borderColor;

function subir(){
	var categoria = objCategoria.value;
	var titulo = objTitulo.value;
	var descCorta = objDescCorta.value;
	var descLarga = objDescLarga.value;

	if (categoria=="") {
		objCategoria.style.backgroundColor="red";
		alert("Seleccione una categoria para su proyecto");
		return;
	}
	if (titulo=="") {
		objTitulo.style.borderColor="red";
		alert("Escriba un título para su proyecto");
		return;
	}

	var imgs = objImgs.map(input=>input.value);
	imgs = imgs.map(baseName);
	cont=0;
	for (var i = imgs.length - 1; i >= 0; i--) {
		if (imgs[i]!="") {
			if (imgs[i].indexOf(".jpeg")==-1 && imgs[i].indexOf(".jpg")==-1 && imgs[i].indexOf(".png")==-1){
				objImgs[i].nextSibling.nextSibling.style.borderColor = "red";
				alert("El archivo "+(i+1)+" no tiene un formato de imagen soportado (jpg, jpeg o png).");
				return;
			}
		}
		else{
			cont+=1;
		}
	}
	if (cont==5) {
		for (var i = objImgs.length - 1; i >= 0; i--) {
			objImgs[i].nextSibling.nextSibling.style.borderColor = "red";
		}
		alert("Seleccione al menos una imagen para su proyecto");
		return;
	}

	if (descCorta=="") {
		objDescCorta.style.borderColor="red";
		alert("Escriba una descripción corta para su proyecto");
		return;
	}
	if (descLarga=="" || descLarga.length < 150) {
		objDescLarga.style.borderColor="red";
		alert("Escriba una descripción completa para su proyecto de al menos 150 caracteres");
		return;
	}

	var data = "categoria="+categoria+"&titulo="+titulo+"&descCorta="+descCorta+"&descLarga="+descLarga+"&imgs="+imgs;
  	var url = config['url']+"Usuario/subirProyecto";
  	alert(data);
  	proyecto = new XMLHttpRequest();
    proyecto.open("POST", url ,true);
    proyecto.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    proyecto.send(data);

    proyecto.onreadystatechange = function (){
      if (proyecto.readyState == 4) {
        console.log(proyecto.responseText)
        if (parseInt(proyecto.responseText)==0) {
        	alert('Proyecto registrado exitosamente');
        }else{
        	alert("Ocurrió un problema al registrar su proyecto. Por favor intente más tarde.");
        }
      }
    }

}

function estCat(){
	objCategoria.style.backgroundColor=colorCategoria;
}
function estTit(){
	objTitulo.style.borderColor=colorTitulo;
}
function estImg(){
	// for (var i = objImgs.length - 1; i >= 0; i--) {
	// 	objImgs[i].nextSibling.nextSibling.style.borderColor = colorImg;
	// }
	var imgs = objImgs.map(input=>input.value);
	imgs = imgs.map(baseName);
	console.log(imgs);
	cont=0;
	for (var i = imgs.length - 1; i >= 0; i--) {
		if (imgs[i]!="") {
			if (imgs[i].indexOf(".jpeg")==-1 && imgs[i].indexOf(".jpg")==-1 && imgs[i].indexOf(".png")==-1){
				objImgs[i].nextSibling.nextSibling.style.borderColor = "red";
				alert("El archivo "+(i+1)+" no tiene un formato de imagen soportado (jpg, jpeg o png).");
				return;
			}
			else{
				objImgs[i].nextSibling.nextSibling.style.borderColor = colorImg;
			}
		}
		else{
			cont+=1;
		}
	}
	if (cont==5) {
		for (var i = objImgs.length - 1; i >= 0; i--) {
			objImgs[i].nextSibling.nextSibling.style.borderColor = "red";
		}
		alert("Seleccione al menos una imagen para su proyecto");
		return;
	}
	else{
		for (var i = objImgs.length - 1; i >= 0; i--) {
			objImgs[i].nextSibling.nextSibling.style.borderColor = colorImg;
		}
	}
}
function estDC(){
	objDescCorta.style.borderColor=colorDesc;
}
function estDL(){
	objDescLarga.style.borderColor=colorDesc;
}
