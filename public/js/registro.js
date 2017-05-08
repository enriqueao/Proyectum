function registrar() {
  var nomc = document.getElementById('nombreCompleto').value;
  var username = document.getElementById('user').value;
  var correo = document.getElementById('correo').value;
  var pass = document.getElementById('pass').value;

console.log(username);
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

        }else{

        }
      }
    }
}
