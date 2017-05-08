<div class="blanco"></div>
<div class="top-bar">
  <div class="logo-top-bar">
    <a href="<?=URL?>"><img src="<?=IMG?>logo.png"></a>
  </div>
  <div class="top-buscador">
    <div class="top-buscador-input">
      <input type="search" name="busqueda" placeholder="Buscar">
    </div>
  </div>
      <div class="top-SignIn">
          <a href="<?=URL;?>Index/registro">Únirme Ahora</a>
          <input type="submit" value="Iniciar Sesión" id="boton">
      </div>
</div>
<div class="inicio-sesion" id="capa" style="display:none;">
  <label for="username">Correo o Nombre de Usuario</label>
  <input id="username" type="text" name="" value="">
  <label for="password">Constraseña</label>
  <input id="password" type="password" name="" value="">
  <input type="submit" id="botonSu" value="Iniciar Sesión" onclick="iniciarSesion();">
</div>
