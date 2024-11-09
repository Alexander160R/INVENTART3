<?php

setlocale(LC_ALL, "es_ES");
$modulo = "menu";
$nav = '9';

require_once "../controller/assets/svrurl.php";
require_once "../controller/assets/validacion.php";
require_once "../controller/assets/inicio.php";

// Validación de login
$login = new seguridad;
$login->seguridadLogin();

require_once "../controller/assets/session.php";

?>
<!-- Usuario -->
<a id="tipodeusuario" class="hide"><?php echo $template_tipo; ?></a>
<!-- Usuario -->
<?php
//// Requerir NAVMENU
require "../controller/assets/menunav.php";
?>

<!-- BODDY -->
<div id="bodysecon" class="row">
    <div class="welcome-section">
        <h1>Bienvenido a Industrias Jireh</h1>
        <p>SOMOS TU MEJOR OPCION.</p>
    </div>

    <div class="mission-vision-values">
        <div class="mission">
            <h2>Misión</h2>
            <p>Proveer artículos promocionales innovadores y de calidad que ayuden a nuestros clientes a destacar y crecer en el mercado, mientras fomentamos relaciones duraderas y un servicio excepcional.</p>
        </div>
        <div class="vision">
            <h2>Visión</h2>
            <p>Ser la empresa líder en la industria de artículos promocionales, reconocida por nuestra creatividad, calidad y compromiso con la sostenibilidad.</p>
        </div>
        <div class="values">
            <h2>Valores</h2>
            <ul>
                <li><strong>Calidad:</strong> Nos comprometemos a ofrecer productos que superen las expectativas de nuestros clientes.</li>
                <li><strong>Innovación:</strong> Fomentamos un ambiente de creatividad y mejoras constantes en nuestros productos.</li>
                <li><strong>Integridad:</strong> Actuamos con honestidad y transparencia en todas nuestras relaciones.</li>
                <li><strong>Sostenibilidad:</strong> Promovemos prácticas responsables que cuiden nuestro planeta.</li>
                <li><strong>Servicio al Cliente:</strong> Nos dedicamos a proporcionar una experiencia excepcional a cada cliente.</li>
            </ul>
        </div>
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

</script>
<!-- SCRIPTS  -->

<!-- Fin HTML -->
<?php
require_once "../controller/assets/fin.php";
?>

<!-- Estilos CSS sugeridos -->
<style>
.welcome-section {
    text-align: center;
    margin-bottom: 30px;
}

.mission-vision-values {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 20px;
    background-color: #2d2d2d;
    border-radius: 10px;
    color: #f0f0f0;
}

.mission, .vision, .values {
    flex: 1;
    min-width: 250px; /* Ajusta según sea necesario */
    margin: 10px;
    padding: 20px;
    background-color: #333;
    border-radius: 5px;
}

h2 {
    color: #F08024; /* Color para los títulos */
}
</style>
