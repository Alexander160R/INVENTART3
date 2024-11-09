<?php
$modulo = "Login";
require_once "controller/assets/validacion.php";

// Validación de login
$login = new seguridad;
$login->iniciologin();

require_once "controller/assets/svrurl.php";
require_once "controller/assets/inicio.php"; 
$num1 = rand(1, 10);
$num2 = rand(1, 10);
?>

<!-- Contenedor principal con fondo negro y diseño minimalista -->
<div class="row animated fadeIn fondoLogin" style="margin-bottom: 0;">
  <div class="row center" style="margin-top: 25vh;">
    <div class="col s12">
      <img src="docs/iconos/jireh.jpg" alt="Logo" class="logo-image" />
      <h4 class="titulo">INVENTART3</h4>
      <h5 class="subtitulo">Ingrese los siguientes datos:</h5>
    </div>
    
    <!-- Formulario de inicio de sesión -->
    <div class="col s6 offset-s3">
      <form id="login" accept-charset="utf-8" action="">
        <div class="row">
          <div class="col s12">
            <label for="mail" class="label-text">Correo</label>
            <div class="input-field col s12">
              <input type="email" name="mail" id="mail" class="validate login-input" required placeholder="Ingrese su correo">
            </div>
          </div>
          
          <div class="col s12">
            <label for="pass" class="label-text">Contraseña</label>
            <div class="input-field col s12">
              <input type="password" name="contra" id="pass" required class="validate login-input" pattern=".{8,25}" title="La contraseña debe tener al menos 8 caracteres, incluyendo letras y números." placeholder="Ingrese su contraseña">
            </div>
          </div>

          <!-- Verificador humano -->
          <div class="col s12">
            <span class="label-text">¿Cuánto es <?php echo $num1 ?> + <?php echo $num2 ?> ?</span>
            <div class="input-field col s12">
              <input type="number" name="human_check" id="human_check" class="validate login-input" required placeholder="Ingrese su respuesta">
              <input type="hidden" id="resultado" value="<?php echo $num1 + $num2; ?>">
            </div>
          </div>
        </div>
        
        <!-- Botón de ingreso minimalista, pequeño y centrado -->
        <div class="row">
          <div class="col s12 center">
            <input type="submit" id="botonlogin" class="btn colorP boton-dinamico" value="Ingreso">
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Botón de WhatsApp flotante en el lado derecho -->
  <div class="whatsapp-bubble" onclick="window.open('https://wa.me/58136366', '_blank');">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" />
  </div>
</div>

<!-- Carga de Scripts -->
<?php
require_once "controller/assets/scripts.php";
?>

<!-- Funcionalidad de verificación de login con jQuery -->
<script>
jQuery(document).on("submit", "#login", function (event) {
  event.preventDefault();

  const humanCheck = parseInt(jQuery("#human_check").val());
  const sumCheck = parseInt(jQuery("#resultado").val());
  if (humanCheck !== sumCheck) {
    swal("Oops", "Respuesta incorrecta a la pregunta de verificación!", "error");
    return;
  }

  jQuery("#botonlogin").addClass("disabled");

  jQuery.ajax({
    url: "controller/db/login.php",
    type: "POST",
    dataType: "json",
    data: jQuery("#login").serialize(),
    cache: "false",
    beforeSend: function () {
      M.toast({
        html: "Cargando...",
        classes: "rounded colorP",
        timeRemaining: 50,
      });
    },
  })
    .done(function (data) {
      if (data.acceso == "si") {
        console.log(data);
        window.location.href = "view/index.php";
        jQuery("#botonlogin").removeClass("disabled");
      } else if (data.acceso == "no") {
        swal("Sistema", "Usuario Bloqueado Informar a Desarrollo", "info");
        jQuery("#botonlogin").removeClass("disabled");
      } else if (data.error == true) {
        swal("Oops", "Correo o contraseña incorrecta! ", "info");
        jQuery("#botonlogin").removeClass("disabled");
      }
    })
    .fail(function (errordata) {
      console.log(errordata.responseText);
    });
});
</script>

<!-- Carga de estilos CSS -->
<style>
/* Fondo minimalista en negro */
.fondoLogin {
    background-color: #1c1c1c;
    height: 100vh;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding-left: 20px;
}

/* Logo e imagen del encabezado */
.logo-image {
    width: 120px;
    height: auto;
    margin-bottom: 15px;
}

/* Título y subtítulo */
.titulo, .subtitulo {
    color: #ffffff;
    font-weight: 500;
}

/* Etiquetas de campos */
.label-text {
    color: #bdbdbd;
    font-size: 0.9rem;
    font-weight: bold;
}

/* Estilo de los campos de entrada */
.login-input {
    border: 1px solid #666;
    border-radius: 10px;
    padding: 8px 14px;
    font-size: 1rem;
    color: #e0e0e0;
    background-color: #333;
    margin-bottom: 10px;
    transition: border-color 0.3s, background-color 0.3s;
}

.login-input::placeholder {
    color: #999;
}

.login-input:focus {
    border-color: #888;
    background-color: #444;
    box-shadow: 0 0 8px rgba(255, 255, 255, 0.2);
}

/* Botón de ingreso pequeño y color tenue */
.boton-dinamico {
    background-color: #444;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 6px 14px;
    font-size: 0.9rem;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    width: auto; /* Ancho adaptable al contenido */
    text-align: center;
    margin: auto; /* Centrado del botón */
}

.boton-dinamico:hover {
    background-color: #555;
}

.boton-dinamico:active {
    transform: translateY(1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Icono de WhatsApp flotante */
.whatsapp-bubble {
    position: fixed;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    background-color: #25D366;
    border-radius: 50%;
    padding: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: transform 0.3s;
    z-index: 1000;
    width: 48px;
    height: 48px;
}

.whatsapp-bubble:hover {
    transform: scale(1.1);
}

.whatsapp-bubble img {
    width: 32px;
    height: 32px;
}
</style>
