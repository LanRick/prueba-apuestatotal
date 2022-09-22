<?php
    //print_r($_POST);
    if (!isset($_POST['id_recarga'])) {
        header('Location: index.php?mensaje=error');
    }

    include_once 'model/conexion.php';
    $form_banco=$_POST['form_banco'];
    $form_operacion=$_POST['form_operacion'];
    $form_fvoucher=$_POST['form_fvoucher'];
    $form_fregistro=$_POST['form_fregistro'];
    $form_fmonto=$_POST['form_fmonto'];
    $id_recarga=$_POST['id_recarga'];
    $form_fcanal=$_POST['form_fcanal'];

    $edita_datos = $bd->prepare("UPDATE recarga SET banco_recarga = ?, n_operacion = ?, fecha_voucher = ?, fecha_monto = ?, monto = ?, recarga_canal = ? WHERE id_recarga = ?;");
    $res_edita = $edita_datos->execute([$form_banco, $form_operacion, $form_fvoucher, $form_fregistro, $form_fmonto, $form_fcanal, $id_recarga]);

    if ($res_edita === TRUE) {
        header('Location: index.php?mensaje=actualizado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>