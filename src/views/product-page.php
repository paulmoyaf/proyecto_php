<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/head.php';?>

</head>

<body class="full-height">

<?php include '../includes/header.php'; ?>
<?php include '../includes/nav.php';  ?>

    <div class="container" style="min-height: 100vh;">

        <div class="pt-5">
            <!-- <img class="card-img-top logo" src="../src/img/logo/logo.png" alt="Title"> -->
            <!-- <p class="display-5 text-end">View Item</p> -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="catalogo.php" class="text-dark font-bold"><?php echo $textos['catalogo']; ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $producto->getNombre() ?></li>
            </ol>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6 col-12 text-center p-5">

                <img class="card-img-top" src="<?php echo $producto->getImagenURL()  ?>">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $producto->getNombre()  ?></h4>
                    <p class="card-text"><?php echo $descripcion_producto ?></p>
                </div>
            </div>

            <div class="col-md-6 col-12 p-5">
                <div class="h3"><?php echo $textos['caracteristicas']; ?></div>
                <hr>
                <ul>
                    <li><?php echo $textos['descripcion']; ?>: <?php echo $descripcion_producto ?></li>
                    <li><?php echo $textos['tipo']; ?><?php echo $nombre_tipo_producto ?></li>
                    <li><?php echo $textos['precio']; ?>: <?php echo $producto->getPrecio() ?></li>
                    <li><?php echo $textos['descuentos']; ?>: <?php echo $producto->getDescuento() ?> % (<?php echo $textos['parrafo-prime'] ?>)</li>
                </ul>
                <p class="display-6 text-center"><?php echo $producto->getPrecioFinal()  ?> €</p>


                <button class="btn btn-warning w-100 btn-add"  id="btn-add-to-car"
                                data-id="<?php echo $producto->getId() ?>"
                                data-nombre="<?php echo $producto->getNombre() ?>"
                                data-descripcion="<?php echo $producto->getDescripcion() ?>"
                                data-categoria="<?php echo $producto->getCategoriaId() ?>"
                                data-talla="<?php echo $producto->getTallaId() ?>"
                                data-tipo="<?php echo $producto->getTipoProductoId() ?>"
                                data-descuento="<?php echo $producto->getDescuento()?>"
                                data-precio="<?php echo $producto->getPrecio() ?>"
                                data-imagen="<?php echo $producto->getImagenURL() ?>"
                                data-precio-final="<?php echo $producto->getPrecioFinal() ?>"
                                data-stock="<?php echo $producto->getStock() ?>"
                                data-descripcion-eus="<?php echo $producto->getDescripcionEus() ?>"
                                ><?php echo $textos['agregar-carrito']; ?></button>
            </div>

        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="../assets/js/carrito.js"></script>
</body>

</html>