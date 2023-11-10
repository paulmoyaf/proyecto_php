<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body class="">

    <div class="container">
    <div class="row">
        <div class="py-5 col-md-6 col-12 custom-dashboard">
            <div class="d-flex justify-content-between">
                <img class="card-img-top logo" src="../assets/img/logo/logo.png" alt="Logo">
                <h1 class="h3 text-black-50 text-end">Menu - Administrador</h1>
                <button class="btn btn-warning" onclick="window.location.href='logout.php'">Log Out</button>
            </div>
            <hr>
            <div class="card bg-light">
                <!-- <img class="card-img-top" src="" alt="Portada_Dashboard"> -->
                <img class="card-img-top rounded-3" src="../assets/img/portadas/BannerHorizontal.jpg" alt="Portada_Dashboard">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title text-uppercase text-center">List Items</h4>
                        <button class="btn btn-outline-dark" onclick="window.location.href='../admin/add/logic.php'">Add New Item</button>
                    </div>
                    <hr>

                    <div class="">
                        <div class="card-products">
                            <?php
                            foreach ($productos as $producto) :
                                $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
                                $nombre_talla = ProductosDB::obtenerNombreTalla($producto->getTallaId());
                            ?>
                                <div class="card text-bg-light card-items">
                                    <a href="../admin/view/logic.php?id=<?= $producto->getId() ?>">
                                        <img class="card-img-top" src=<?= $producto->getImagenURL() ?>>
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $producto->getNombre() ?></h4>
                                        <p class="card-text text-price"><?= $producto->getDescripcion() ?></p>
                                        <p class="card-text text-price">Talla: <?= $nombre_talla ?></p>
                                        <p class="card-text text-price"><?= $producto->getPrecio() ?> €</p>
                                        <p class="card-text text-price">Tipo: <?= $nombre_tipo_producto ?></p>
                                        <p class="card-text font-weight-bold" style="font-size: larger;">P.F.: <?= $producto->getPrecioFinal() ?> €</p>
                                        <div class="mt-2">
                                            <a class="btn btn-outline-secondary" href='../admin/edit/logic.php?id=<?= $producto->getId() ?>'>Edit</a>
                                            <a class="btn btn-outline-danger" href='../admin/remove/logic.php?id=<?= $producto->getId() ?>'>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>