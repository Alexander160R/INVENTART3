<?php
setlocale(LC_ALL, "es_ES");
$modulo = "usuario";
$nav = '9';

require_once "../controller/assets/svrurl.php";
require_once "../controller/assets/validacion.php";
require_once "../controller/assets/inicio.php";

// Validacion de login
$login = new seguridad;
$login->seguridadLogin();

require_once "../controller/assets/session.php";
?>

<!-- Usuario -->
<a id="correousuarioperfil" class="hide"><?php echo $template_email; ?></a>
<a id="nombreusuario" class="hide"><?php echo $template_nombre; ?></a>
<a id="tipousuario" class="hide"><?php echo $template_tipo; ?></a>
<a id="accesousuario" class="hide"><?php echo $template_acceso; ?></a>
<a id="usuarioid" class="hide"><?php echo $template_id; ?></a>
<!-- Usuario -->
<?php
// Requerir NAVMENU
require "../controller/assets/menunav.php";
?>

<!-- BODDY -->
<div id="bodysecon" class="row"> 
  <h1 class="center-align" style="font-family: 'Roboto', sans-serif; font-weight: 700; letter-spacing: 1px; color: #333;">Usuario</h1>
  <div class="container">
    <form class="col s12" method="post" id="editar_usuario">
      <div class="row">
        <!-- Campo para el nombre -->
        <div class="input-field col s6">
          <input placeholder="Ingrese su nombre" id="template_nombre" name="template_nombre" type="text" class="validate campo-input" value="<?php echo $template_nombre; ?>">
          <label for="template_nombre">Nombre</label>
        </div>
        
        <!-- Campo para el email -->
        <div class="input-field col s6">
          <input placeholder="Ingrese su email" id="template_email" name="template_email" type="email" class="validate campo-input" value="<?php echo $template_email; ?>">
          <label for="template_email">Email</label>
        </div>
      </div>
      
      <div class="row">
        <!-- Campo para el tipo -->
        <div class="input-field col s6">
          <input placeholder="Ingrese el tipo" id="template_tipo" name="template_tipo" type="text" class="validate campo-input" value="<?php echo $template_tipo; ?>">
          <label for="template_tipo">Tipo</label>
        </div>

        <!-- Campo para el nivel de acceso -->
        <div class="input-field col s6">
          <input placeholder="Ingrese el nivel de acceso" id="template_acceso" name="template_acceso" type="text" class="validate campo-input">
          <label for="template_acceso">Nivel de Acceso</label>
        </div>
      </div>

      <div class="row">
        <!-- Campo para la contraseña -->
        <div class="input-field col s6">
          <input placeholder="Ingrese la contraseña" id="template_contra" name="template_contra" type="password" class="validate campo-input">
          <label for="template_contra">Ingrese la Contraseña</label>
        </div>

        <!-- Campo para confirmar la contraseña -->
        <div class="input-field col s6">
          <input placeholder="Confirme la contraseña" id="template_contra2" name="template_contra2" type="password" class="validate campo-input">
          <label for="template_contra2">Confirme la Contraseña</label>
        </div>
      </div>

      <!-- Botón para enviar el formulario -->
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Datos -->
<!-- BODDY -->

<!-- SCRIPTS CARGA -->
<?php
require_once "../controller/assets/scripts.php";
?>
<!-- SCRIPTS CARGA -->

<!-- SCRIPTS -->
<script>
jQuery(document).on("submit", "#editar_usuario", function (event) {
  event.preventDefault();
  console.log(jQuery("#editar_usuario").serialize(Array));
});
</script>
<!-- SCRIPTS -->

<!-- Fin HTML -->
<?php
require_once "../controller/assets/fin.php";
?>

<!-- Estilos CSS -->
<style>
  .campo-input {
    background-color: #333333; /* Fondo oscuro */
    color: #ffffff; /* Texto blanco */
  }

  .campo-input::placeholder {
    color: #b0b0b0; /* Color del texto del placeholder */
  }

  .campo-input:focus {
    border-color: #F08024; /* Color del borde al enfocar */
    background-color: #333333; /* Fondo oscuro */
  }
</style>
