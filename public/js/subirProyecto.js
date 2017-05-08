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
