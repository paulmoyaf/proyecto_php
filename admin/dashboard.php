<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body class="container-admin">

    <div class="container-fluid">
        <div class="row">
            <div class="py-5 col-md-6 col-12 custom-dashboard">
                <div class="d-flex justify-content-between align-items-center">
                    <a href='../admin/index.php' >
                        <img class="card-img-top logo" src="../assets/img/logo/logo.png" alt="Logo">
                    </a>
                    <h1 class="h3 text-black-50 text-end">Menu - Administrador</h1>
                    <button class="btn btn-warning btn-sm " onclick="window.location.href='logout.php'" style="height: fit-content">Log Out</button>  
                    
                </div>
                <hr>

                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex gap-3">
                            <h4 class="card-title">Opciones: </h4>
                            <div class="d-flex gap-2">
                                <!-- <button class="btn btn-outline-dark btn-sm" onclick="window.location.href='../admin/index.php'">Dashboard</button> -->
                                <button class="btn btn-outline-dark btn-sm" onclick="window.location.href='../admin/add/index.php'">Add New Item</button>
                                <button class="btn btn-outline-dark btn-sm" onclick="window.location.href='../admin/categorias/index.php'">Add Category</button>
                                <button class="btn btn-outline-dark btn-sm" onclick="window.location.href='../admin/messages/index.php'">View Messages</button>
                                <button class="btn btn-outline-dark btn-sm" onclick="window.location.href='../admin/users/index.php'">View Users (*)</button>
                                      
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="card bg-light">
                    <!-- <img class="card-img-top" src="" alt="Portada_Dashboard"> -->
                    <!-- <img class="card-img-top" src="../assets/img/portadas/BannerHorizontal.jpg" alt="Portada_Dashboard"> -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title text-uppercase text-center">Items List</h4>
                 </div>
                        <hr>

                        <!-- <div class="">
                            <div class="card-products">
                                <?php
                                foreach ($productos as $producto) :
                                    $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
                                    $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getTipoProductoId());
                                    $nombre_talla = ProductosDB::obtenerNombreTalla($producto->getTallaId());
                                ?>
                                    <div class="card text-bg-light card-items">
                                        <a href="../admin/view/index.php?id=<?= $producto->getId() ?>">
                                            <img class="card-img-top" src=<?= $producto->getImagenURL() ?> alt="imagen-item">
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $producto->getNombre() ?></h4>
                                            <p class="card-text text-price"><?= $producto->getDescripcion() ?></p>
                                            <p class="card-text text-price">Talla: <?= $nombre_talla ?></p>
                                            <p class="card-text text-price"><?= $producto->getPrecio() ?> €</p>
                                            <p class="card-text text-price">Tipo: <?= $nombre_tipo_producto ?></p>
                                            <p class="card-text font-weight-bold" style="font-size: larger;">P.F.: <?= $producto->getPrecioFinal() ?> €</p>
                                            <div class="mt-2">
                                                <a class="btn btn-outline-secondary" href='../admin/edit/index.php?id=<?= $producto->getId() ?>'>Edit</a>
                                                <a class="btn btn-outline-danger" href='../admin/remove/index.php?id=<?= $producto->getId() ?>'>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div> -->

                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="align-middle">
                                    <tr class="table-dark" >
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Talla</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Descuento</th>
                                        <th scope="col">Precio Final</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php
                                    foreach ($productos as $producto) :
                                        $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
                                        $nombre_talla = ProductosDB::obtenerNombreTalla($producto->getTallaId());
                                        $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
                                    ?>
                                        <tr class="">
                                            <td>
                                                <button class="btn btn-outline-dark">
                                                    <a href="../admin/view/index.php?id=<?= $producto->getId() ?>">
                                                    <img class="card-img-top" src=<?= $producto->getImagenURL() ?> alt="imagen-item" style="width: 5em">
                                                    </a>
                                                </button>
                                            </td>
                                            <td><?= $producto->getNombre() ?></td>
                                            <td><?= $producto->getDescripcion() ?></td>
                                            <td><?= $nombre_tipo_categoria ?></td>
                                            <td><?= $nombre_talla ?></td>
                                            <td><?= $nombre_tipo_producto ?></td>
                                            <td><?= $producto->getPrecio() ?></td>
                                            <td><?= $producto->getDescuento() ?></td>
                                            <td><?= $producto->getPrecioFinal() ?></td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm w-100 mb-1" href='../admin/edit/index.php?id=<?= $producto->getId() ?>'>Edit</a>
                                                <a class="btn btn-danger btn-sm w-100" href='../admin/remove/index.php?id=<?= $producto->getId() ?>'>Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>