<!DOCTYPE html>
<html>

<head>
    <title>Ver Mensaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>

<body class="container py-5">

    <div class="header-titulo">
        <a href='../../admin/index.php'>
            <img class="card-img-top logo" src="../../assets/img/logo/logo.png" alt="Logo">
        </a>
        <p class="h2 text-center">Ver Mensaje</p>
    </div>
    <hr>

    <div class="mb-3">

        <div class="display-6 mb-5">Mensaje:</div>

        <div class="mensaje-view">

            <div class="d-flex align-items-center gap-3">
                <label for="" class="form-label">Fecha de Creación:</label>
                <input type="text" readonly class="form-control w-50" value="<?= htmlspecialchars($mensaje->getFecha()) ?>">
            </div>
            <div class="d-flex align-items-center gap-3">
                <label for="" class="form-label">Nombre:</label>
                <input type="text" readonly class="form-control w-50" value="<?= htmlspecialchars($mensaje->getNombre()) ?>">
            </div>
            <div class="d-flex align-items-center gap-3">
                <label for="" class="form-label">Teléfono:</label>
                <input type="text" readonly class="form-control w-50" value="<?= htmlspecialchars($mensaje->getTelefono()) ?>">
            </div>
            <div class="d-flex align-items-center gap-3">
                <label for="" class="form-label">Email:</label>
                <input type="text" readonly class="form-control w-50" value="<?= htmlspecialchars($mensaje->getEmail()) ?>">
            </div>
            <div class="d-flex align-items-center gap-3">
                <label for="" class="form-label">Status:</label>

                    <div id="spinner" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Cargando...</span>
                        </div>
                    </div>
                    
                <form method="post" action="index.php">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($mensaje->getId()) ?>">
                    <input id="status" type="checkbox" name="status" value="leido" <?= $mensaje->getStatus() == 'leido' ? 'checked' : '' ?>>
                    <label for="status"><?= $mensaje->getStatus() == 'leido' ? 'Leído' : 'Sin leer' ?></label>
                    <button id="btn-actualizar" type="submit" class="btn btn-sm btn-warning" disabled>Actualizar estado</button>
                </form>
            </div>
            <div class="d-flex align-items-center gap-3">
                <label for="" class="form-label">Mensaje:</label>
                <textarea readonly class="form-control w-50"><?= htmlspecialchars($mensaje->getMensaje()) ?></textarea>
            </div>
        </div>
    </div>



    <div class="d-flex justify-content-between gap-3 row mx-5">
        <a class="btn btn-outline-secondary col" href="../../admin/messages/" role="button">Ver Todos los Mensajes</a>
    </div>

    <script src="../../assets/js/mensajes.js"></script>
</body>

</html>