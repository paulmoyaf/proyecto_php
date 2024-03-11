<!DOCTYPE html>
<html>

<head>
    <title>Categorias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body class="container py-5">


    <div class="header-titulo">
    <a href='../../admin/index.php' >
                <img class="card-img-top logo" src="../../assets/img/logo/logo.png" alt="Logo">
            </a>     
        <p class="h2">Categorias</p>
        <button class="btn btn-warning btn-sm " onclick="window.location.href='../logout.php'" style="height: fit-content">Cerrar Sesión</button>  

    </div>
    <hr>

    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../admin/index.php" class="text-dark font-bold">Menu</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
        </ol>
    </div>

    <div class="row mt-5">


        <div class="col">


            <div class="card ">
                <div class="card-body">
                    <form id="categoria-form" action="index.php" method="post" class="row g-3">
                        <label for="nombre" class="form-label rounded-end">Añadir nueva categoria</label>
                        <div class="d-flex">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Categoria Nueva" required>
                            <button id="btn-agregar" class="btn btn-small btn-warning rounded-start" type="click">Añadir Categoria</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col">
            <h4 class="text-center mb-4">Lista de Categorias</h4>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead class="align-middle">
                        <tr class="table-light">
                            <th scope="col">Nombre</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($categorias as $categoria) : ?>
                            <tr class="align-middle">
                                <td><?= htmlspecialchars($categoria->getNombre()) ?></td>
                                <td class="d-flex gap-3 justify-content-center">
                                    <button id="btn-editar" class="btn btn-small btn-outline-secondary" data-id="<?= htmlspecialchars($categoria->getId()) ?>">Editar</button>
                                    <button id="btn-eliminar" class="btn btn-small btn-danger" data-id="<?= htmlspecialchars($categoria->getId()) ?>">Eliminar</button>
                                    <!-- <form method="post" action="index.php">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($categoria->getId()) ?>">
                                        <input type="hidden" name="eliminar" value="true">
                                        <input type="submit" value="Eliminar" id="btn-eliminar" class="btn btn-small btn-danger">
                                    </form> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div id="mensaje"></div>

    <div class="d-flex justify-content-between gap-3 row m-5">
        <a class="btn btn-outline-secondary col" href="../../admin/index.php" role="button">Regresar al Menu</a>
    </div>

    <script src="../../assets/js/categorias.js"></script>

</body>


</html>