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

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.0.2/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">

</head>

<body>
    <?php include 'template/header.php' ?>

    <?php
        include_once "model/conexion.php";
        
        //Vista de los datos de recargas
        $sentencia = $bd -> prepare("SELECT * FROM recarga r, usuario u WHERE r.id_user = u.id_user");
        $sentencia->execute();
        $recarga = $sentencia->fetchAll(PDO::FETCH_OBJ);
    ?>

    <div class="container mt-5 mb-5">
        <table class="table align-middle nowrap" style="width:100%" id="tabla">
            <thead>
                <tr>
                    <th scope="col">PlayerID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Banco</th>
                    <th scope="col">N° de Operación</th>
                    <th scope="col">Fecha y hora (Voucher)</th>
                    <th scope="col">Fecha y hora (Registro)</th>
                    <th scope="col">Recarga (S/.)</th>
                    <th scope="col">Canal de Comunicación</th>
                    <th scope="col">Tipo de usuario</th>
                </tr>
            </thead>        
            <tbody>
                <?php
                    foreach($recarga as $dato){
                ?>
                <tr>
                    <td><?php echo $dato->id_user; ?></td>
                    <td><?php echo $dato->nombre_user; ?></td>
                    <td><?php echo $dato->apellido_user; ?></td>
                    <td><?php echo $dato->banco_recarga; ?></td>
                    <td><?php echo $dato->n_operacion; ?></td>
                    <td><?php echo $dato->fecha_voucher	; ?></td>
                    <td><?php echo $dato->fecha_monto; ?></td>
                    <td><?php echo $dato->monto	; ?></td>
                    <td><?php echo $dato->recarga_canal; ?></td>
                    <td><?php echo $dato->tipo_user; ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 
    <script src="js/tabla.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>