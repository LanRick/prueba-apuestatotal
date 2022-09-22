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
        //Valida si se ha introducido un id de usuario válido
        if(!isset($_COOKIE["id_usuario"])){
            header('Location: home.php');
            exit();
        }
        
        include_once "model/conexion.php";
        
        //Busca el nombre y el apellido del usuario
        $playerid=$_COOKIE["id_usuario"];
        $busca_nombre = $bd->prepare("SELECT * FROM usuario WHERE id_user=?;");
        $busca_nombre->execute([$playerid]);
        $name_user = $busca_nombre->fetch(PDO::FETCH_OBJ);

        //Vista de los datos de recargas
        $sentencia = $bd -> prepare("SELECT * FROM recarga WHERE id_user=?;");
        $sentencia->execute([$playerid]);
        $recarga = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //print_r($recarga);

        //Lista de bancos
        $bbanco = $bd->prepare("SELECT * FROM bancos");
        $bbanco->execute();
        $lista_banco = $bbanco->fetchAll(PDO::FETCH_OBJ);
    ?>

    <div class="container mb-5">
        <div class="row">
            <div class="col-md">
                <header class="py-3">
                    <h3 class="text-center">
                    Registro de recargas de <?php echo $name_user->nombre_user." ".$name_user->apellido_user ?>
                    </h3>
                </header>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Tipo de usuario</th>
                                <th scope="col">Sesión</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $name_user->nombre_user; ?></td>
                                <td><?php echo $name_user->apellido_user; ?></td>
                                <td><?php echo $name_user->tipo_user; ?></td>
                                <td><a href="cambiar_usuario.php"><button type="button" class="btn btn-dark">Cambiar usuario</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row justify-contenet-center mt-4">

            <div class="col-md-8">

                <!-- Alerta: Inicio -->
                <?php include 'template/alertas.php' ?>                
                <!-- Alerta: Fin -->

                <div class="card">
                    <div class="card-header">
                        Lista de Recargas de voucher
                    </div>
                    <div class="p-r">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Banco</th>
                                    <th scope="col">N° de Operación</th>
                                    <th scope="col">Fecha y hora (Voucher)</th>
                                    <th scope="col">Fecha y hora (Registro)</th>
                                    <th scope="col">Monto (S/.)</th>
                                    <th scope="col">Canal Comunicación</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($recarga as $dato){
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->banco_recarga; ?></td>
                                    <td><?php echo $dato->n_operacion; ?></td>
                                    <td><?php echo $dato->fecha_voucher; ?></td>
                                    <td><?php echo $dato->fecha_monto; ?></td>
                                    <td><?php echo $dato->monto; ?></td>
                                    <td><?php echo $dato->recarga_canal; ?></td>
                                    <td><a class="text-info" href="editar.php?id_recarga=<?php echo $dato->id_recarga; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('¿Estás seguro de quere eliminar esta recarga?');" class="text-danger" href="eliminar.php?id_recarga=<?php echo $dato->id_recarga; ?>"><i class="bi bi-x-circle"></i></a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Ingresar depósito
                    </div>
                    <form action="registrar_recarga.php" class="p-4" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Banco: </label>
                            <!--<input type="text" class="form-control" name="form_banco" required>-->

                            <select name="form_banco" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>----------Seleccione banco--------</option>
                                <?php
                                    foreach ($lista_banco as $datobanco) {
                                ?>
                                <option value="<?php echo $datobanco->nombre_banco; ?>"><?php echo $datobanco->nombre_banco; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">N° de Operación: </label>
                            <input type="number" class="form-control" name="form_operacion" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha y hora (Voucher)</label>
                            <input type="datetime-local" class="form-control" name="form_fvoucher" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha y hora (Registro)</label>
                            <input type="datetime-local" class="form-control" name="form_fregistro" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Monto (S/.)</label>
                            <input type="number" class="form-control" name="form_fmonto" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Canal de Comunicación</label>
                            <select name="form_fcanal" class="form-select" aria-label="Default select example" required>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Telegram">Telegram</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-primary" value="Registrar depósito" required>
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