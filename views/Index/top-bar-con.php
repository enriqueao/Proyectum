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
        <img src="<?=IMG.Session::getValue('imagenPerfil')?>">
        <div class="top-perfil">
            <a href="" id="boton"><?=Session::getValue('nombreUsuario')?></a>
            <a href="<?=URL?>Usuario/cerrarSesion">Cerrar Sesión</a>
          </div>
      </div>
      <div class="inicio-sesion perfil-menu" id="capa" style="display:none;">
        <ul>
          <li><a href="<?=URL?>Usuario/Perfil">Mi Perfil</a></li>
          <li><a href="<?=URL?>Usuario/editaPerfil">Editar Mi Perfil</a></li>
          <li><a href="<?=URL?>Usuario/subeProyecto">Subir Proyecto</a></li>
          <li><a href="#"></a></li>
        </ul>
      </div>
      <div class="top-bar-caja-buscador" id="contenedorBusqueda">
        <p class="info-busqueda">Titulo del proyecto o nombre del usuario</p>
      </div>
</div>
