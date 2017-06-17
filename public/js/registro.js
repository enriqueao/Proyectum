loadingReg = new Loading("fondo","loadingReg");
var verestado = document.getElementById('user');
verestado.addEventListener('keyup',statusUsername,true);
verestado.addEventListener('keypress',statusUsername,true);
verestado.addEventListener('keydown',statusUsername,true);
var usuarioDisponible = false;
  var objNomc = document.getElementById('nombreCompleto');
  var objUsername = document.getElementById('user');
  var objCorreo = document.getElementById('correo');
  var objDesc = document.getElementById('inputDesc');
  var objBtn = document.getElementById('botonSu');
  var objPass = document.getElementById('pass');
  var objPass2 = document.getElementById('pass2');

function est(obj){
  window[obj].style.cssText="";
}

function registrar() {
  var objNomc = document.getElementById('nombreCompleto');
  var objUsername = document.getElementById('user');
  var objCorreo = document.getElementById('correo');
  var objDesc = document.getElementById('inputDesc');
  var objBtn = document.getElementById('botonSu');
  var objPass = document.getElementById('pass');
  var objPass2 = document.getElementById('pass2');
  var desc = objDesc.value;
  var nomc = objNomc.value;
  var username = objUsername.value;
  var correo = objCorreo.value;
  var pass = objPass.value;
  var pass2 = objPass2.value;
  objBtn.disabled=true;
  if (nomc=="") {
    console.log(objNomc);
    objNomc.style.cssText="border-color: red !important";
    alertP("Nombre vacío","Escriba su nombre completo.");
    objBtn.disabled=false;
    return;
  }
  if (username=="") {
    objUsername.style.cssText="border-color: red !important";
    alertP("Nombre de usuario vacío.","Escriba un nombre de usuario.");
    objBtn.disabled=false;
    return;
  }
  if (correo=="") {
    objCorreo.style.cssText="border-color: red !important";
    alertP("Correo vacío.","Escriba su correo electrónico.");
    objBtn.disabled=false;
    return;
  }
  if (desc=="") {
    objDesc.style.cssText="border-color: red !important";
    alertP("Descripción vacía.","Escriba una descripción de usuario.");
    objBtn.disabled=false;
    return;
  }
  if (pass=="") {
    objPass.style.cssText="border-color: red !important";
    alertP("Contraseña vacía.","Escriba una contraseña.");
    objBtn.disabled=false;
    return;
  }
  if (pass2=="") {
    objPass2.style.cssText="border-color: red !important";
    alertP("Validación de contraseña vacía.","Vuelva a escribir la contraseña en el campo de validación.");
    objBtn.disabled=false;
    return;
  }
  if (pass2 != pass) {
    objPass2.style.cssText="border-color: red !important";
    alertP("Las contraseñas no coinciden.","La contraseña de verifiación es diferente a la contraseña.");
    objBtn.disabled=false;
    return;
  }
  if (usuarioDisponible) {
    loadingReg.load(1);
    var data = "nombrecompleto="+nomc+"&username="+username+"&correo="+correo+"&pass="+pass+"&descripcion="+desc;
    var url = config['url']+"Usuario/registro";
    regist = new XMLHttpRequest();
      regist.open("POST", url ,true);
      regist.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      regist.send(data);

      regist.onreadystatechange = function (){
        if (regist.readyState == 4) {
          loadingReg.load(0);
          if (parseInt(regist.responseText)==0) {
            alertP("Error.","Ocurrió un problema al registrar su cuenta. Por favor intente más tarde.");
            objBtn.disabled=false; 
          }else{
            alertP("Bienvenido a Proyectum.","Tu cuenta ha sido registrada exitósamente.",1);
            window.location.href = config['url'];
          }
        }
      }
  }
  else{
    objUsername.style.cssText="border-color: red !important";
    alertP("Usuario no disponible.","El usuario que escogió no está desponible. Intente con uno diferente.");
    objBtn.disabled=false;
  }
}

comprobar = new XMLHttpRequest();
function statusUsername(){
  usuarioDisponible = false;
  comprobar.abort();
  var username = document.getElementById('user').value;
  var status = document.getElementById('usernamecomp');
  var data = "username="+username;
  status.innerHTML = 'Verificando nombre de usuario...'
  var url = config['url']+"Usuario/statusUsername";
  if(username != '' && username.length >= 5){
    
    comprobar.open("POST", url ,true);
    comprobar.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    comprobar.send(data);

    comprobar.onreadystatechange = function (){
      if (comprobar.readyState == 4) {
        console.log(comprobar.responseText)
        if (parseInt(comprobar.responseText)==0) {
          status.innerHTML = '<p class="ocupado">No Disponible</p>';
          usuarioDisponible = false;
        }
        else{
          status.innerHTML = '<p class="disponible">Disponible</p>';
          usuarioDisponible = true;
        }
      }
    }
  } else {
    usuarioDisponible = false;
    status.innerHTML = 'Introduce tu nombre de usuario mayor a 5 caracteres';
  }
}
