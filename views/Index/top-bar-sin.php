<?=$this->render('Default','loading',true)?>
<div class="blanco"></div>
<div class="top-bar">
  <div class="logo-top-bar">
    <a href="<?=URL?>"><img src="<?=IMG?>logo.png"></a>
  </div>
  <div class="top-buscador">
    <div class="top-buscador-input">
      <input type="search" name="busqueda" placeholder="Buscar" id="buscador">
    </div>
  </div>
      <div class="top-SignIn">
        <a href="<?=URL;?>Index/registro">Unirme Ahora</a>
        <input type="submit" value="Iniciar Sesión" id="boton">
      </div>
      <div class="inicio-sesion" id="capa" style="display:none;">
        <input id="username" type="text" name="" value="" placeholder="Correo o Nombre de Usuario">
        <input id="password" type="password" name="" value="" placeholder="Contraseña">
        <input type="submit" id="botonSu" value="Iniciar Sesión" onclick="iniciarSesion();">
      </div>
      <div class="top-bar-caja-buscador" id="contenedorBusqueda">
        <p class="info-busqueda">Título del proyecto o nombre del usuario</p>
      </div>
</div>
