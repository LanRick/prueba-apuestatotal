<!doctype html>
<html lang="es">

<head>
    <title>Apuesta Total - Depósito de Recargas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- CDN íconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php include 'template/header.php' ?>

    <?php
        if (!isset($_GET['id_recarga'])) {
            header('Location:index.php?mensaje=error');
            exit();
        }

        include_once 'model/conexion.php';
        $id_recarga = $_GET['id_recarga'];
        
        $s_recarga = $bd->prepare("SELECT * FROM recarga WHERE id_recarga = ?;");
        $s_recarga->execute([$id_recarga]);
        $recarga_usuario = $s_recarga->fetch(PDO::FETCH_OBJ);

        $s_usuario = $bd->prepare("SELECT nombre_user,apellido_user FROM usuario WHERE id_user = 203450;");
        $s_usuario->execute();
        $nombre_usuario = $s_usuario->fetch(PDO::FETCH_OBJ);

        //Lista de bancos
        $bbanco = $bd->prepare("SELECT * FROM bancos");
        $bbanco->execute();
        $lista_banco = $bbanco->fetchAll(PDO::FETCH_OBJ);
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Editar Recarga de <?php echo $nombre_usuario->nombre_user; ?> <?php echo $nombre_usuario->apellido_user; ?>
                    </div>
                    <form action="editar_proceso.php" class="p-4" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Banco: </label>
                            <select name="form_banco" class="form-select" aria-label="Default select example" required>
                                <?php
                                    foreach ($lista_banco as $datobanco) {
                                ?>
                                <option value="<?php echo $datobanco->nombre_banco; ?>" <?php if ($datobanco->nombre_banco == $recarga_usuario->banco_recarga) {echo "selected";} ?> ><?php echo $datobanco->nombre_banco; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">N° de Operación: </label>
                            <input type="number" class="form-control" name="form_operacion" required value="<?php echo $recarga_usuario->n_operacion; ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Fecha y hora (Voucher)</label>
                            <input type="datetime-local" class="form-control" name="form_fvoucher" value="<?php echo $recarga_usuario->fecha_voucher; ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Fecha y hora (Registro)</label>
                            <input type="datetime-local" class="form-control" name="form_fregistro" value="<?php echo $recarga_usuario->fecha_monto; ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Monto</label>
                            <input type="number" class="form-control" name="form_fmonto" required value="<?php echo $recarga_usuario->monto; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Canal de Comunicación</label>
                            <select name="form_fcanal" class="form-select" aria-label="Default select example" required>
                                <option value="WhatsApp" <?php if ($recarga_usuario->recarga_canal == 'WhatsApp') {echo "selected";} ?>>WhatsApp</option>
                                <option value="Telegram" <?php if ($recarga_usuario->recarga_canal == 'Telegram') {echo "selected";} ?>>Telegram</option>
                            </select>
                        </div>
                        
                        <div class="d-grid">
                            <input type="hidden" name="id_recarga" value="<?php echo $recarga_usuario->id_recarga; ?>">
                            <input type="submit" class="btn btn-primary" value="Registrar" required onclick="return confirm('¿Estás seguro de querer actualizar estos campos?');">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    
</body>

</html>