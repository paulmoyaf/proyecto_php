<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/head.php';?>

</head>

<body class="full-height">

<?php include '../includes/header.php'; ?>
<?php include '../includes/nav.php';  ?>

    <div class="container">

        <div class="pt-5">
            <!-- <img class="card-img-top logo" src="../src/img/logo/logo.png" alt="Title"> -->
            <!-- <p class="display-5 text-end">View Item</p> -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="catalogo.php">Catalogo</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $producto->getId()  ?></li>
            </ol>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6 col-12 text-center p-5">

                <img class="card-img-top" src="<?php echo $producto->getImagenURL()  ?>">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $producto->getNombre()  ?></h4>
                    <p class="card-text"><?php echo $producto->getDescripcion()  ?></p>
                </div>
            </div>

            <div class="col-md-6 col-12 p-5">
                <div class="h3">Caracteristicas</div>
                <hr>
                <ul>
                    <li>Descripcion: <?php echo $producto->getDescripcion() ?></li>
                    <li>Tipo de Producto: <?php echo $nombre_tipo_producto ?></li>
                    <li>Precio: <?php echo $producto->getPrecio() ?></li>
                    <li>Descuento: <?php echo $producto->getDescuento() ?> % (Para usuarios PRIME)</li>
                </ul>
                <p class="display-6"><?php echo $producto->getPrecioFinal()  ?> €</p>

                <div class="row form-group">
                    <div class="mb-3 col">
                        <label for="talla_id">Talla:</label>
                        <select class="form-select form-select-md" name="talla_id">
                            <?php foreach ($tallas as $talla) { ?>
                                <option value="<?php echo $talla['id']; ?>"><?php echo $talla['nombre']; ?></option>
                            <?php } ?>
                        </select>

                    </div>


                    <div class="form-outline col">
                        <label for="cantidad">Cantidad: </label>
                        <input type="number" id="typeNumber" name="cantidad" class="form-control form-select-md" placeholder="Cantidad" min="0" />
                        <!-- <label class="form-label" for="typeNumber">Number input</label> -->
                    </div>
                </div>

                <input type="button" class="btn btn-primary w-100" value="AGREGAR AL CARRITO">
            </div>

        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="../assets/js/carrito.js"></script>
</body>

</html>