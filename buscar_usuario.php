<?php
    //print_r($_POST);
    if(empty($_POST["form_id_usuario"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';

    $form_id_usuario = $_POST["form_id_usuario"];
    
    $sentencia = $bd->prepare("SELECT nombre_user,apellido_user FROM usuario WHERE id_user=?;");
    $sentencia->execute([$form_id_usuario]);
    $nombre_usuario = $sentencia->fetch(PDO::FETCH_OBJ);

    if ($nombre_usuario == TRUE) {
        setcookie("id_usuario",$form_id_usuario, time() + 3600);
        header('Location: index.php');
    } else {
        header('Location: home.php?mensaje=iderror');
        exit();
    }
?>