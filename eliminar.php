<?php
    if (!isset($_GET['id_recarga'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id_recarga=$_GET['id_recarga'];

    $sentencia = $bd->prepare('DELETE FROM recarga WHERE id_recarga=?;');
    $resultado = $sentencia->execute([$id_recarga]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>