var buscador = document.getElementById('buscador');
var contenedorBusqueda = document.getElementById('contenedorBusqueda');
// var buscarLoading = new Loading("tpBuscador","buscarLoading");

buscador.addEventListener('keydown',buscar,true);

buscador.addEventListener('focus',function(){
  contenedorBusqueda.style.opacity = 1;
},true);

buscador.addEventListener('blur',function(){
  contenedorBusqueda.style.opacity = 0;
},true);

function buscar(){
  contenedorBusqueda.innerHTML = '<p class="info-busqueda">Buscando...</p>';
  var search = document.getElementById('buscador').value;
  search = (search == '') ? '{' : search;
  var data = "search="+search;
  var url = config['url']+"Usuario/buscar";
    busqueda = new XMLHttpRequest();
    busqueda.open("POST", url ,true);
    busqueda.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    busqueda.send(data);
    busqueda.onreadystatechange = function (){
      if (busqueda.readyState == 4) {
        contenedorBusqueda.innerHTML = busqueda.responseText;
      }
    }
}
