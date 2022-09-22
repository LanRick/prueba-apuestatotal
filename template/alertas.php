<!-- Alerta FALTAN DATOS: INICIO -->
<?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>¡Cuidado!</strong> Rellena todos los campos
</div>

<?php
    }
?>
<!-- Alerta FALTAN DATOS: FIN -->

<!-- Alerta REGISTRADO: INICIO -->
<?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>¡Recarga Guardada!</strong> Registro de recarga completado
</div>

<?php
    }
?>
<!-- Alerta REGISTRADO: FIN -->

<!-- Alerta ERROR: INICIO -->
<?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>Error</strong> Vuelve a intentar
</div>

<?php
    }
?>
<!-- Alerta ERROR: FIN -->

<!-- Alerta ACTUALIZADO: INICIO -->
<?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado') {
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>¡Datos actualizados!</strong> Los datos han sido correctamente actualizados
</div>

<?php
    }
?>
<!-- Alerta ACTUALIZADO: FIN -->

<!-- Alerta ACTUALIZADO: INICIO -->
<?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>¡Datos eliminados!</strong>
</div>

<?php
    }
?>
<!-- Alerta ACTUALIZADO: FIN -->

<!-- Alerta ID ERROR: INICIO -->
<?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'iderror') {
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>ID incorrecto</strong> Introduzca nuevamente
</div>

<?php
    }
?>
<!-- Alerta ID ERROR: FIN -->

<!-- Alerta FALTA USUARIO: INICIO -->
<?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'faltausuario') {
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>ID incorrecto</strong> Falta introducir usuario
</div>

<?php
    }
?>
<!-- Alerta FALTA USUARIO: FIN -->