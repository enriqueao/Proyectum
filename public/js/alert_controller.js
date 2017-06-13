objAlert = document.getElementById('alert');
objTitulo = document.getElementById('alertTitulo');
objMsg = document.getElementById('alertMsg');
objBtn = document.getElementById('alertBtn');
hideAlert();

function alertP(titulo,msg,tipo=0,btn="Ok"){
	if (tipo==0) {
		objBtn.style.background = objAlert.children[0].style.background = "-webkit-linear-gradient(left,#D31027,#EA384D)";
	}
	else{
		objBtn.style.background = objAlert.children[0].style.background = "-webkit-linear-gradient(left,#76b852,#8DC26F)";
	}
	objAlert.style.display = "flex";
	objTitulo.innerHTML = titulo;
	objMsg.innerHTML = msg;
	objBtn = btn;
}

function hideAlert(){
	objAlert.style.display = "none";
}