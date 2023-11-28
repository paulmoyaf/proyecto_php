<!DOCTYPE html>
<html>

<head>
    <title>Catalogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>


    <?php include '../includes/header.php'; ?>
    <?php include '../includes/nav.php';  ?>



    <div class="container py-5">

        <div class="container pb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="display-6 text-center">Catálogo</div>
                <div class="right-side d-grid mx-3">
                    <h6 class="h6">Categorias: </h6>
                    <div id="btn-categorias"></div>
                </div>
            </div>
            <hr>
        </div>
        <div class="row d-flex flex-wrap-reverse">
            <div class="col-md-8 col-12 div-productos">
                
                <div class="d-flex flex-wrap" id="lista-items">
                    <?php foreach ($productos as $producto) :
                        $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
                        $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 pb-5 px-3">

                            <div class="card bg-light text-center">
                                <a class="text-dark" href='../public/catalogo.php?id=<?= $producto->getId() ?>'>
                                    <div class="card-header" id="name-producto"><?php echo $producto->getNombre() ?></div>
                                    <div class="card-body">
                                        <img id="img-producto" src="<?php echo $producto->getImagenURL() ?>" class="img-fluid rounded-start py-3" style="width: 15em" alt="Card title">
                                        <h5 class="card-title"><?php echo $producto->getDescripcion() ?></h5>
                                        <p class="card-text">Categoría: <?php echo $nombre_tipo_categoria ?></p>
                                        <p class="card-text text-muted">Precio: <?php echo $producto->getPrecio() ?></p>
                                        <p class="card-text" id="tipo-producto">Tipo: <?php echo $nombre_tipo_producto ?></p>
                                    </div>
                                </a>
                                <div class="card-footer">
                                    <p class="card-text font-weight-bold" style="font-size: larger;" id="price-producto"><?php echo $producto->getPrecioFinal() ?> €</p>
                                </div>
                                <button class="btn btn-warning w-100 btn-add" data-nombre="<?php echo $producto->getNombre() ?>" data-imagen="<?php echo $producto->getImagenURL() ?>" data-precio="<?php echo $producto->getPrecioFinal() ?>" data-tipo="<?php echo $nombre_tipo_producto ?>">Agregar al carrito</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="d-flex flex-wrap" id="lista-items-filter" style="display: none"></div>
            </div>
            <div class="col-md-4 col-12 px-3" id="div-carrito">
                <div class="d-flex justify-content-around gap-2 pb-3">
                    <span class="">Productos en el Carrito: </span>
                    <!-- <span id="contador"></span> -->
                    <button class="btn btn-danger btn-small" id="btn-delete-all" style="display: none">Vaciar Carrito</button>
                </div>
                <span class="" id="new-product"></span>
            </div>
        </div>
    </div>
    <?php include '../includes/footer.php';  ?>


    <script>
        const productos = <?php echo $productosJSON; ?>;
    </script>
    <script>
        const categorias = <?php echo json_encode($categorias); ?>;
    </script>
    <script>
        const tiposProducto = <?php echo json_encode($tiposProducto); ?>;
    </script>
    <script>
        const tallas = <?php echo json_encode($tallas); ?>;
    </script>


    <script src="../assets/js/carrito.js"></script>
</body>

</html>