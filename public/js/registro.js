var verestado = document.getElementById('user');
verestado.addEventListener('keyup',statusUsername,true);
verestado.addEventListener('keypress',statusUsername,true);
verestado.addEventListener('keydown',statusUsername,true);


function registrar() {
  var nomc = document.getElementById('nombreCompleto').value;
  var username = document.getElementById('user').value;
  var correo = document.getElementById('correo').value;
  var pass = document.getElementById('pass').value;

  var data = "nombrecompleto="+nomc+"&username="+username+"&correo="+correo+"&pass="+pass;

  var url = config['url']+"Usuario/registro";
  regist = new XMLHttpRequest();
    regist.open("POST", url ,true);
    regist.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    regist.send(data);

    regist.onreadystatechange = function (){
      if (regist.readyState == 4) {
        console.log(regist.responseText)
        if (parseInt(regist.responseText)) {
            alert("registro correcto");
        }else{
          alert("El correo ya estan en uso, intenta nuevamente con otro correo");
        }
      }
    }
}

function statusUsername(){
  var username = document.getElementById('user').value;
  var status = document.getElementById('usernamecomp');
  var data = "username="+username;

  var url = config['url']+"Usuario/statusUsername";
  if(username != '' && username.length >= 5){
    comprobar = new XMLHttpRequest();
    comprobar.open("POST", url ,true);
    comprobar.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    comprobar.send(data);

    comprobar.onreadystatechange = function (){
      if (comprobar.readyState == 4) {
        status.innerHTML = comprobar.responseText;
      }
    }
  } else {
    status.innerHTML = 'Introduce tu nombre de usuario mayor a 5 caracteres'
  }
}
