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
        <img src="<?=IMG.Session::getValue('imagenPerfil')?>">
        <div class="top-perfil">
            <a href="#proyectos"><?=Session::getValue('nombreUsuario')?></a>
            <a href="" onclick="cerrarSesion()">Cerrar Sesión</a>
          </div>
      </div>
</div>
