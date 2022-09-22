<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["form_banco"]) || empty($_POST["form_operacion"]) || empty($_POST["form_fvoucher"]) || empty($_POST["form_fregistro"]) || empty($_POST["form_fmonto"]) || empty($_POST["form_fcanal"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $id_user = $_COOKIE["id_usuario"];;
    $form_banco = $_POST["form_banco"];
    $form_operacion = $_POST["form_operacion"];
    $form_fvoucher = $_POST["form_fvoucher"];
    $form_fregistro = $_POST["form_fregistro"];
    $form_fmonto = $_POST["form_fmonto"];
    $form_fcanal = $_POST["form_fcanal"];

    $sentencia = $bd->prepare("INSERT INTO recarga (id_user,banco_recarga,n_operacion,fecha_voucher,fecha_monto,monto,recarga_canal) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$id_user,$form_banco,$form_operacion,$form_fvoucher,$form_fregistro,$form_fmonto, $form_fcanal]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=falloregistro');
        exit();
    }
?>