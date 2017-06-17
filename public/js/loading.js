function Loading (parentId,newId) {
	this.loadingId = newId;
	this.objParent = document.getElementById(parentId);
	this.objParent.innerHTML+='<div class="cont-spinner" id="'+this.loadingId+'"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>';
    this.load = function(option){
    	// alert(document.getElementById(this.loadingId));
    	if (parseInt(option)==1) {
			document.getElementById(this.loadingId).style.display="flex";
		}else{
			document.getElementById(this.loadingId).style.display="none";
		}
	};
 }