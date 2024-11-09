<!--Menu Admin-->
<!-- Dropdown Structure -->
<ul id="menuadmin" class="dropdown-content">
  <li><a href="./settings.php" class="black-text"><i class="material-icons black-text">build</i>Configuracion</a></li>
  <li class="divider"></li>
  <li><a href="../controller/assets/salir.php" class="black-text"><i class="material-icons black-text">exit_to_app</i>Salir</a></li>
</ul>
<!--Menu Admin-->
<!-- Dropdown Structure -->

<a id="nivelUser" class="hide"><?php echo $template_tipo; ?></a>

<!-- NAV -->
<ul id="slide-out" class="sidenav sidenav-fixed">
  <li style="height: auto;">
    <div class="user-view" style="width: 100%;">
      <div class="row center">
        <div class="col s12">
          <img width="70%" height="auto" src="../docs/iconos/jireh.jpg" alt="Icono de Usuario"> <!-- Imagen ajustada -->
        </div>
      </div>
    </div>
  </li>
  <li>
    <div class="user-view" style="padding: 0px 32px 0;">
      <a><span class="black-text email"><strong><?php echo $template_email; ?></strong></span></a>
    </div>
  </li>
  <li><a class="subheader">Menu</a></li>

  <li><a id="n1" href="./index.php"><i id="i1" class="material-icons">desktop_mac</i>inicio</a></li>
  <li><a id="n2" href="datos.php"><i id="i2" class="material-icons">add_box</i>ingreso datos</a></li>
  <li><a id="n2" href="consulta.php"><i id="i2" class="material-icons">import_export</i>consulta datos</a></li>
  <li><a id="n9" href="./usuario.php"><i id="i9" class="material-icons">supervisor_account</i>usuario</a></li>
  <li><a id="n4" href="../controller/assets/salir.php"><i id="i5" class="material-icons">exit_to_app</i>Salir</a></li>
</ul>
<!-- NAV -->

<script type="text/javascript" charset="utf-8" async>
  let tipoUserV = $("#nivelUser").text();

  console.info("Bienvenido a la consola", tipoUserV);
</script>

<!-- NAV PRINCIPAL-->
<nav class="colorP borde7 hoverable" style="width: 97% !important; margin-left: 1.5%; margin-top: 1%; margin-bottom: 25px;">
  <div class="nav-wrapper" style="margin: 25px;">
    <a class="brand-logo" href="#"><i id="ocultarnav" class="material-icons hide-on-med-and-down">fullscreen</i><?php echo (new DateTime())->format('l d \d\e F \d\e\l Y'); ?></a>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
        <li><a class="busquedaglobal"><i class="material-icons left">search</i></a></li>
        <li><a id="zonaBienvenido" class="truncate">Bienvenido</a></li>
        <li><a id="dropdownuser" class="dropdown-trigger" data-target="menuadmin"><i class="material-icons left white-text">face</i><?php echo $template_nombre; ?><i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
<!-- NAV PRINCIPAL-->

<script type="text/javascript" charset="utf-8">
  $("#zonaBienvenido").text("Bienvenido");

  var menunavID = <?php echo $nav ?>;
  if (menunavID == "0") {
    $("#n" + menunavID + "").addClass('animated fadeOut');
    setTimeout(function() {
      $("#n" + menunavID + "").addClass('hide');
    }, 500);
  } else {
    $("#n" + menunavID + "").addClass('fontP');
    $("#i" + menunavID + "").addClass('accentfP');
  }

  $("#ocultarnav").click(function(event) {
    event.preventDefault();
    if ($("#slide-out").hasClass('sidenav-fixed')) {
      $("#ocultarnav").text('fullscreen');
      $("#slide-out").removeClass('sidenav-fixed');
      $("#bodyprin").removeClass('responsivo');
      $('.sidenav').sidenav("close");
      actResponsive();
    } else {
      $("#slide-out").addClass('sidenav-fixed');
      $("#bodyprin").addClass('responsivo');
      $('.sidenav').sidenav("open");
      $("#ocultarnav").text('fullscreen_exit');
      actResponsive();
    }
  });
</script>
<!-- Botón flotante para abrir el chatbot -->
<button onclick="toggleChat()" class="chatbot-toggle-btn">🗨️</button>

<!-- Contenedor del Chatbot -->
<div class="chatbot-container" id="chatbot-container">
    <!-- Cabecera del Chatbot -->
    <div class="chatbot-header">
        <span>Chat con nosotros</span>
        <button class="chatbot-close-btn" onclick="toggleChat()">❌</button>
    </div>

    <!-- Mensajes del Chat -->
    <div class="chatbot-box" id="chatbot-box"></div>

    <!-- Entrada de mensaje -->
    <div class="chatbot-input-container">
        <input type="text" id="chatbot-input" class="chatbot-input" placeholder="Escribe tu mensaje..." onkeypress="handleKeyPress(event)">
        <button onclick="sendMessage()" class="chatbot-send-btn">Enviar</button>
    </div>
</div>

<script>
    // Función para alternar la visibilidad del chat
    function toggleChat() {
        const chatbot = document.getElementById('chatbot-container');
        chatbot.style.display = (chatbot.style.display === 'none' || chatbot.style.display === '') ? 'block' : 'none';
    }

    // Función para manejar la interacción del chatbot
    function getRespuestaChatbot(mensaje) {
        mensaje = mensaje.toLowerCase();

        if (mensaje.includes('hola')) {
            return "¡Hola! ¿Cómo estás?";
        } else if (mensaje.includes('bien')) {
            return "Me alegra saber que estás bien 😊. ¿En qué te puedo ayudar?";
        } else if (mensaje.includes('ayuda')) {
            return "Claro, dime en qué te puedo ayudar. Tengo las siguientes opciones:\n1. Contactar a soporte\n2. Brindarte una guía\n3. Darte a conocer el producto. Escribe 'soporte', 'guía' o 'producto' para elegir.";
        } else if (mensaje.includes('guia') || mensaje.includes('guía')) {
            return "Claro, bienvenido a **INVENTARTE**. Somos un sistema de gestión de inventarios por medio del cual tú como usuario podrás ingresar cantidades de ingreso o salida de todos nuestros excelentes productos. Adicionalmente, si tienes alguna otra duda no dudes en contactarte con soporte. ¡Saludos y bienvenido!";
        } else if (mensaje.includes('soporte')) {
            return `Para contactar a soporte, haz clic en el siguiente enlace para enviarnos un mensaje directo en WhatsApp: <a href="https://wa.me/50558136366" target="_blank">Enviar mensaje a soporte</a>`;
        } else if (mensaje.includes('producto')) {
            return "Muy bien, en el apartado de los productos disponibles a tu izquierda tienes las opciones disponibles, las cuales son el inicio para conocer nuestros valores, además de opciones para el ingreso y consulta de datos. Te invito a echarles un ojo. Si necesitas ayuda más personalizada, no dudes en buscar la opción de soporte.";
        } else if (mensaje.includes('adios') || mensaje.includes('hasta luego') || mensaje.includes('bye') || mensaje.includes('nos vemos') || mensaje.includes('gracias')) {
            setTimeout(() => {
                toggleChat();
            }, 2000); // Cierra el chat después de 2 segundos
            return "¡Gracias por contactarte! 😊 Fue un placer ayudarte. ¡Hasta luego y que tengas un excelente día! 👋";
        } else {
            return "Lo siento, no entiendo la pregunta. ¿Puedes reformularla o elegir una opción válida?";
        }
    }

    // Función para enviar el mensaje y mostrar la respuesta
    function sendMessage() {
        const input = document.getElementById('chatbot-input');
        const mensajeUsuario = input.value.trim();

        if (mensajeUsuario) {
            const chatBox = document.getElementById('chatbot-box');
            chatBox.innerHTML += "<p class='chatbot-user'>Tú: " + mensajeUsuario + "</p>";

            const respuestaBot = getRespuestaChatbot(mensajeUsuario);
            chatBox.innerHTML += "<p class='chatbot-bot'>Chatbot: " + respuestaBot + "</p>";

            input.value = '';
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    }

    // Función para enviar mensaje con Enter
    function handleKeyPress(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    }
</script>

<style>
    .chatbot-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 320px;
        height: 450px;
        background-color: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        display: none;
        z-index: 9999;
        overflow: hidden;
        font-family: 'Roboto', sans-serif;
        animation: fadeIn 0.3s ease;
    }

    .chatbot-header {
        background-color: #007BFF;
        color: white;
        padding: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
    }

    .chatbot-box {
        height: 300px;
        padding: 15px;
        overflow-y: auto;
        background-color: #f9f9f9;
        color: #333;
        font-size: 16px;
        line-height: 1.6;
    }

    .chatbot-user {
        font-weight: bold;
        color: #007BFF;
        margin-bottom: 10px;
    }

    .chatbot-bot {
        background-color: #e6e6e6;
        padding: 10px;
        border-radius: 5px;
        margin-top: 5px;
    }

    .chatbot-input-container {
        display: flex;
        padding: 10px;
        background-color: #f1f1f1;
    }

    .chatbot-input {
        padding: 10px;
        width: 80%;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .chatbot-send-btn {
        width: 18%;
        padding: 10px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .chatbot-send-btn:hover {
        background-color: #0056b3;
    }

    .chatbot-toggle-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 50%;
        padding: 15px;
        font-size: 22px;
        cursor: pointer;
        z-index: 9999;
    }

    .chatbot-toggle-btn:hover {
        background-color: #0056b3;
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>
