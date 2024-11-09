<?php
setlocale(LC_ALL, "es_ES");
$modulo = "datos";
$nav = '2'; // Cambia el nav a 2 para indicar que estamos en la opción de ingreso de datos

require_once "../controller/assets/svrurl.php";
require_once "../controller/assets/validacion.php";
require_once "../controller/assets/inicio.php";

// Validación de login
$login = new seguridad;
$login->seguridadLogin();

require_once "../controller/assets/session.php";
?>

<!-- Datos -->
<a id="correousuarioperfil" class="hide"><?php echo $template_email; ?></a>
<a id="nombreusuario" class="hide"><?php echo $template_nombre; ?></a>
<a id="tipousuario" class="hide"><?php echo $template_tipo; ?></a>
<a id="accesousuari" class="hide"><?php echo $template_acceso; ?></a>
<a id="usuarioid" class="hide"><?php echo $template_id; ?></a>
<!-- Datos -->
<?php
// Requerir NAVMENU
require "../controller/assets/menunav.php";
?>

<!-- BODDY -->
<div id="bodysecon" class="row"> 
  <h1 class="center-align teal-text text-darken-2">Ingreso de Mercadería</h1>
  <div class="container">
    <form class="col s12" method="post" id="formulario_entrada_salida">
      <div class="row">
        <!-- Campo para seleccionar entrada o salida -->
        <div class="input-field col s12 m6 offset-m3"> 
          <select name="tipo" id="tipo" required>
            <option value="" disabled selected>Seleccione una opción</option>
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
          </select>
          <label>Tipo de Movimiento</label>
        </div>
      </div>

      <div class="row">
        <!-- Campo para el ID del producto -->
        <div class="input-field col s12 m6 offset-m3"> 
          <input placeholder="Ingrese el ID del producto" id="id_producto" name="id_producto" type="text" class="validate" required>
          <label for="id_producto">ID del Producto</label>
        </div>
      </div>

      <div class="row">
        <!-- Campo para la cantidad -->
        <div class="input-field col s12 m6 offset-m3"> 
          <input placeholder="Ingrese la cantidad" id="cantidad" name="cantidad" type="number" class="validate" required>
          <label for="cantidad">Cantidad</label>
        </div>
      </div>

      <div class="row">
        <!-- Campo para el proveedor -->
        <div class="input-field col s12 m6 offset-m3"> 
          <input placeholder="Ingrese el nombre del proveedor" id="proveedor" name="proveedor" type="text" class="validate" required>
          <label for="proveedor">Proveedor</label>
        </div>
      </div>

      <div class="row">
        <!-- Campo para la fecha -->
        <div class="input-field col s12 m6 offset-m3"> 
          <input placeholder="Ingrese la fecha" id="fecha" name="fecha" type="date" class="validate" required>
          <label for="fecha">Fecha</label>
        </div>
      </div>

      <!-- Botón para enviar el formulario -->
      <div class="row">
        <div class="input-field col s12 m6 offset-m3">
          <button type="submit" class="btn waves-effect waves-light teal darken-2">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Estilos personalizados para margen -->
<style>
  .input-field {
    margin-bottom: 40px; /* Aumenta el margen inferior para separar los campos */
  }

  h1 {
    font-family: 'Roboto', sans-serif; /* Establece la fuente */
    font-weight: 700; /* Peso de la fuente */
    letter-spacing: 1px; /* Espaciado entre letras */
    margin-bottom: 50px; /* Espacio debajo del título */
  }

  /* Estilos para campos de entrada */
  .input-field input.validate {
    background-color: #333333 !important; /* Fondo oscuro para los campos */
    color: #ffffff !important; /* Color del texto dentro de los campos (blanco) */
  }

  .input-field input.validate::placeholder {
    color: #b0b0b0 !important; /* Color del placeholder */
  }

  .input-field input.validate:focus {
    background-color: #333333 !important; /* Asegura que el fondo permanezca oscuro al enfocar */
    color: #ffffff !important; /* Mantener el color del texto al enfocar */
  }
</style>

<!-- SCRIPTS CARGA -->
<?php
require_once "../controller/assets/scripts.php";
?>
<!-- SCRIPTS CARGA -->

<!-- SCRIPTS -->
<script>
$(document).ready(function(){
  $('select').formSelect(); // Inicializa el select
});

jQuery(document).on("submit", "#formulario_entrada_salida", function (event) {
  event.preventDefault();

  // Serializar los datos del formulario
  let datos = jQuery(this).serialize();

  // Verificar que los datos están siendo serializados correctamente
  console.log("Datos enviados: ", datos);

  // Enviar datos mediante AJAX
  jQuery.ajax({
    type: "POST",
    url: "../controller/assets/guardar_datos.php", // Asegúrate de que la URL sea correcta
    data: datos,
    success: function(response) {
      console.log("Respuesta del servidor:", response);
      alert("Datos guardados exitosamente!");
      // Limpiar el formulario
      $('#formulario_entrada_salida')[0].reset();
      $('select').formSelect(); // Re-inicializar el select
    },
    error: function(xhr, status, error) {
      console.log("Error al guardar los datos:", status, error);
      alert("Error al guardar los datos.");
    }
  });
});
</script>
<!-- SCRIPTS -->

<!-- Fin HTML -->
<?php
require_once "../controller/assets/fin.php";
?>
