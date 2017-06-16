function loading(option){
	sp=document.getElementById('cont-spinner');
	// sp.parentNode.style.position="relative";
	if (parseInt(option)==1) {
		sp.style.display="flex";
	}else{
		sp.style.display="none";
	}
}