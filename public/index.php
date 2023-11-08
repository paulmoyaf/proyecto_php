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
    <link rel="stylesheet" href="../style.css">

</head>

<body class="">

<?php $currentPage = 'catalogo'; ?>

    <?php include 'includes/header.php'; ?>
    <?php include 'includes/nav.php'; ?>


    <div class="container py-5">
        <div class="container pb-3">
            <div class="display-6 text-center">Lista de Productos</div>
            <hr>
        </div>


        <div class="row">


            <?php
            $productos = ProductosDB::selectProductos();
            foreach ($productos as $producto) : ?>
                <?php $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());?>
                <?php $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());?>

                <div class="col-lg-4 col-md-4 col-sm-12 pb-5">
                    <div class="card w-100">
                        <a class="btn btn-outline-dark" href='view-page.php?id=<?= $producto->getId() ?>'>
                            <div class="card-body">
                                <h4 class="card-title font-weight-bold"><?php echo $producto->getNombre()  ?></h4>
                                <img src="<?php echo $producto->getImagenURL()  ?>" class="img-fluid rounded-start py-3" style="width: 15em" alt="Card title">
                                <p class="card-text">Modelo: <?php echo $producto->getDescripcion() ?></p>
                                <p class="card-text">Categoria: <?php echo $nombre_tipo_categoria ?></p>
                                <p class="card-text">Modelo: <?php echo $producto->getPrecio() ?></p>
                                <p class="card-text">Tipo: <?php echo $nombre_tipo_producto ?></p>
                                <p class="card-text font-weight-bold" style="font-size: larger;"><?php echo $producto->getPrecioFinal()?> €</p>
                            </div>
                        </a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <!-- <a href="../index.html" class="btn btn-primary">Volver a la Pagina</a> -->

    <?php include 'includes/footer.php'; ?>
</body>

</html>