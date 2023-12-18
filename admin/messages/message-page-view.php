<!DOCTYPE html>
<html>

<head>
    <title>View Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>

<body class="container py-5">

    <div class="header-titulo">
        <img class="card-img-top logo" src="../../assets/img/logo/logo.png" alt="Title">
        <p class="h2 text-center">View Messages</p>
    </div>
    <hr>

    <div class="table-responsive mt-5">
        <table class="table table-bordered text-center">
            <thead class="">
                <tr>
                    <th scope="col">Fecha Creación</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="align-middle">
            <?php
                                    foreach ($mensajes as $mensaje) :
                                    ?>
                                        <tr class="">
                                            <td><?= $mensaje->getFecha() ?></td>
                                            <td><?= $mensaje->getNombre() ?></td>
                                            <td><?= $mensaje->getEmail() ?></td>
                                            <td><?= $mensaje->getMensaje() ?></td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm w-100 mb-1 disabled" href='../admin/message/edit/index.php?id=<?= $mensaje->getId() ?>'>Edit</a>
                                                <a class="btn btn-danger btn-sm w-100 disabled" href='../admin/message/remove/index.php?id=<?= $mensaje->getId() ?>'>Delete</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between gap-3 row mx-5">

        <a class="btn btn-outline-secondary col" href="../../admin/index.php" role="button">Regresar al Menu</a>
    </div>

</body>

</html>