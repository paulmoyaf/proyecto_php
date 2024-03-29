<!DOCTYPE html>
<html>

<head>
    <title>Mensajes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
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
        <p class="h2 text-center">Mensajes</p>
        <button class="btn btn-warning btn-sm " onclick="window.location.href='../logout.php'" style="height: fit-content">Cerrar Sesión</button>  

    </div>
    <hr>

    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../admin/index.php" class="text-dark font-bold">Inicio</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Mensajes</li>
        </ol>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Fecha Creación</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php foreach ($mensajes as $mensaje) : ?>
                    <tr>
                        <td><?= htmlspecialchars($mensaje->getFecha()) ?></td>
                        <td><?= htmlspecialchars($mensaje->getNombre()) ?></td>
                        <td><?= htmlspecialchars($mensaje->getEmail()) ?></td>
                        <td><?= htmlspecialchars($mensaje->getMensaje()) ?></td>
                        <td>
                            <input type="checkbox" name="status" value="leido" <?= $mensaje->getStatus() == 'leido' ? 'checked' : '' ?> disabled>
                            <label for="status">Leído</label>
                        </td>

                        <td>
                            <form method="post" action="index.php">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($mensaje->getId()) ?>">
                                <input type="hidden" name="ver-item" value="true">
                                <input type="submit" value="Editar" id="btn-view" class="btn btn-outline-secondary btn-small w-100 mb-2">
                            </form>
                            <form method="post" action="index.php">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($mensaje->getId()) ?>">
                                <input type="hidden" name="eliminar" value="true">
                                <input type="submit" value="Eliminar" id="btn-delete" class="btn btn-danger btn-small w-100">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between gap-3 row mx-5">
        <a class="btn btn-outline-secondary col mt-3" href="../../admin/index.php" role="button">Regresar al Menu</a>
    </div>

    <script src="../../assets/js/mensajes.js"></script>
</body>

</html>