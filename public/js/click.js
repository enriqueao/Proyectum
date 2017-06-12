var div = document.getElementById('capa');
var but = document.getElementById('boton');
var u = document.getElementById('username');
var p = document.getElementById('password');
var b = document.getElementById('botonSu');

//la funcion que oculta y muestra
function showHide(e){
e.preventDefault();
e.stopPropagation();
if(div.style.display == "none"){
  div.style.display = "block";
  } else if(div.style.display == "block"){
  div.style.display = "none";
  }
}
//al hacer click en el boton
but.addEventListener("click", showHide, false);

//funcion para cualquier clic en el documento
document.addEventListener("click", function(e){
  //obtiendo informacion del DOM para
  var clic = e.target;
  if(div.style.display == "block" && clic != div && clic != u && clic != p && clic != b){
    div.style.display = "none";
  }
}, false);

var lastScrollTop = 0;
window.addEventListener("scroll", function(){
   var st = window.pageYOffset || document.documentElement.scrollTop;
   if (st > lastScrollTop){
     div.style.display = "none";
   } else {
     div.style.display = "none";
   }
   lastScrollTop = st;
}, false);
