<?php
require('../db/db_connection.php');
require('../src/objects/productos.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="">


    <?php include 'includes/header.php'; ?>
    <?php include 'includes/nav.php'; ?>

    <div class="container py-5">
        <div class="container pb-3">
            <div class="display-6 text-center">Catalogo</div>
            <hr>
        </div>


        <div class="row d-flex flex-wrap-reverse">

            <div class="col-md-8 col-12" class="div-productos">

                <div class="d-flex flex-wrap" id="lista-items">

                    <?php
                        $productos = ProductosDB::selectProductos();
                        foreach ($productos as $producto) :
                            $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
                            $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
                        ?>


                            <div class="col-lg-4 col-md-4 col-sm-12 pb-5 px-3">
                                <div class="card">
                                    <a class="btn btn-outline-dark" href='view-page/index.php?id=<?= $producto->getId() ?>'>
                                        <div class="card-body">
                                            <h4 class="card-title font-weight-bold" id="name-producto"><?php echo $producto->getNombre()  ?></h4>
                                            <img id="img-producto" src="<?php echo $producto->getImagenURL()  ?>" class="img-fluid rounded-start py-3" style="width: 15em" alt="Card title">
                                            <p class="card-text">Modelo: <?php echo $producto->getDescripcion() ?></p>
                                            <p class="card-text">Categoria: <?php echo $nombre_tipo_categoria ?></p>
                                            <p class="card-text">Modelo: <?php echo $producto->getPrecio() ?></p>
                                            <p class="card-text" id="tipo-producto">Tipo: <?php echo $nombre_tipo_producto ?></p>
                                            <p class="card-text font-weight-bold" style="font-size: larger;" id="price-producto"><?php echo $producto->getPrecioFinal()?> €</p>
                                        </div>
                                    </a>
                                </div>
                                <!-- <button class="btn btn-outline-dark" href='catalogo.php?id=<?= $producto->getId() ?>'>Ver detalle</button> -->
                                <button class="btn btn-warning w-100 btn-add" data-nombre="<?php echo $producto->getNombre() ?>" data-imagen="<?php echo $producto->getImagenURL() ?>" data-precio="<?php echo $producto->getPrecioFinal() ?>" data-tipo="<?php echo $nombre_tipo_producto?>">Agregar al carrito</button>
                            </div>
                    <?php endforeach; ?>

                </div>

            </div>

            <div class="col-md-4 col-12 px-3" id="div-carrito">
                <div class="d-flex justify-content-around gap-2 pb-3">
                    <span>Productos en el Carrito: </span>
                    <span id="contador"></span>
                    <button class="btn btn-danger btn-small" id="btn-delete-all" style="display: none">Empty Car</button>
                </div>
                <span class="" id="new-product"></span>
            </div>

            </div>


                </div>

    </div>


    <!-- <a href="../index.html" class="btn btn-primary">Volver a la Pagina</a> -->

    <?php include 'includes/footer.php'; ?>
    <script src="../assets/js/carrito.js"></script>
</body>

</html>

