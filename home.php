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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <!-- Alerta: Inicio -->
                <?php include 'template/alertas.php' ?>                
                <!-- Alerta: Fin -->
                
                <div class="card">
                    <div class="card-header">
                        Ingrese PlayerID del usuario
                    </div>
                    <form action="buscar_usuario.php" class="p-4" method="POST">
                        <div class="mb-3">
                            <label class="form-label">PlayerID: </label>
                            <input type="text" class="form-control" name="form_id_usuario" required>
                        </div>

                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Buscar" required>
                        </div>
                    </form>
                </div>
                <div class="d-grid mt-5">
                    <a class="btn btn-dark" href="reportes.php" role="button">Reportes</a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'template/footer.php' ?>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
</script>
</body>

</html>