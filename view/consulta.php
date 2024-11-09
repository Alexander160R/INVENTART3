<?php
setlocale(LC_ALL, "es_ES");
$modulo = "consulta";
$nav = '3'; // Cambia esto al número correspondiente para la navegación

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
<a id="accesousuario" class="hide"><?php echo $template_acceso; ?></a>
<a id="usuarioid" class="hide"><?php echo $template_id; ?></a>

<!-- Requerir NAVMENU -->
<?php require "../controller/assets/menunav.php"; ?>

<!-- BODDY -->
<div id="bodysecon" class="row"> 
  <h1 class="center-align teal-text text-darken-2">Consulta de Entradas y Salidas</h1> <!-- Título centrado y estilizado -->
  <div class="container">
    <form class="col s12" method="post" id="formulario_consulta">
      
      <!-- Campo para seleccionar tipo de transacción -->
      <div class="row">
        <div class="input-field col s12 m6 offset-m3"> 
          <select name="tipo_transaccion" id="tipo_transaccion" required>
            <option value="" disabled selected>Seleccione el tipo de transacción</option>
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
          </select>
          <label for="tipo_transaccion">Tipo de Transacción</label>
        </div>
      </div>

      <!-- Campo para la fecha -->
      <div class="row">
        <div class="input-field col s12 m6 offset-m3"> 
          <input placeholder="Ingrese la fecha" id="fecha" name="fecha" type="date" class="validate" required>
          <label for="fecha">Fecha</label>
        </div>
      </div>

      <!-- Botón para realizar la consulta -->
      <div class="row">
        <div class="input-field col s12 m6 offset-m3">
          <button type="submit" class="btn waves-effect waves-light teal darken-2">Consultar</button>
        </div>
      </div>
    </form>

    <!-- Resultados de la consulta -->
    <div id="resultado_consulta" class="row">
      <table class="highlight">
        <thead>
          <tr>
            <th>ID Transacción</th>
            <th>ID Producto</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Proveedor</th>
          </tr>
        </thead>
        <tbody id="tbody_consulta">
          <!-- Aquí se mostrarán los resultados de la consulta -->
        </tbody>
      </table>
    </div>

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

  table {
    margin-top: 20px;
    background-color: #1c1c1c;
    color: white;
    border-radius: 10px;
  }

  th {
    background-color: #333333;
    color: white;
  }

  td {
    background-color: #262626;
  }

  .btn {
    width: 100%;
  }
</style>

<!-- SCRIPTS CARGA -->
<?php require_once "../controller/assets/scripts.php"; ?>

<!-- SCRIPTS -->
<script>
$(document).ready(function(){
  $('select').formSelect(); // Inicializa el select
});

// Procesar el formulario de consulta
jQuery(document).on("submit", "#formulario_consulta", function (event) {
  event.preventDefault();

  // Serializar los datos del formulario
  let datos = jQuery(this).serialize();

  // Enviar datos mediante AJAX para obtener la consulta
  jQuery.ajax({
    type: "POST",
    url: "../controller/assets/consulta_resultados.php", // Ruta corregida
    data: datos,
    success: function(response) {
      console.log("Respuesta recibida: ", response); // Depuración para ver la respuesta

      try {
        let results = JSON.parse(response); // Parseamos la respuesta JSON

        let tbody = $('#tbody_consulta');
        tbody.empty(); // Limpiar la tabla antes de agregar los nuevos resultados

        if (results.length > 0) {
          results.forEach(function(item) {
            tbody.append(`
              <tr>
                <td>${item.id_transaccion}</td>
                <td>${item.id_producto}</td>
                <td>${item.cantidad}</td>
                <td>${item.fecha}</td>
                <td>${item.proveedor}</td>
              </tr>
            `);
          });
        } else {
          tbody.append('<tr><td colspan="5" class="center-align">No se encontraron resultados.</td></tr>');
        }
      } catch (e) {
        console.error('Error al parsear JSON:', e);
        alert("Hubo un problema con los datos recibidos.");
      }
    },
    error: function() {
      alert("Error al realizar la consulta.");
    }
  });
});
</script>

<!-- Fin HTML -->
<?php require_once "../controller/assets/fin.php"; ?>
