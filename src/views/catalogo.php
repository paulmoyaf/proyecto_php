<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/head.php'; ?>
</head>

<body>


    <?php include '../includes/header.php'; ?>
    <?php include '../includes/nav.php';  ?>

<main class="custom-dashboard">



    <div class="container py-5" style="min-height: 73vh;">



    <div class="card text-dark bg-light p-3 mb-5">
                <p class="card-text">Buscar:</p>
                <input type="text" class="dropdown" id="search-input" placeholder="Buscar Producto">
            <div id="results-container"></div>
    </div> 

    <!-- <div class="dropdown">
        <input type="text" id="search-input" class="form-control" data-toggle="dropdown">
        <div id="results-container" class="dropdown-menu" aria-labelledby="search-input">
  </div> -->

  <!-- <div class="dropdown">
    <button
        class="btn btn-secondary dropdown-toggle"
        type="button"
        id="triggerId"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
    >
        Dropdown
    </button>
    <div class="dropdown-menu" aria-labelledby="triggerId">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item disabled" href="#">Disabled action</a>
        <h6 class="dropdown-header">Section header</h6>
        <a class="dropdown-item" href="#">Action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">After divider action</a>
    </div>
  </div> -->
  

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
                                <a class="link-dark" href='../public/catalogo.php?id=<?= $producto->getId() ?>'>
                                    <div class="card-header" id="name-producto"><?php echo $producto->getNombre() ?></div>
                                    <div class="card-body">
                                        <img id="img-producto" src="<?php echo $producto->getImagenURL() ?>" class="img-fluid rounded-start py-3" style="width: 15em" alt="Card title">
                                        <h5 class="card-title"><?php echo $producto->getDescripcion() ?></h5>
                                        <p class="card-text">Categoría: <?php echo $nombre_tipo_categoria ?></p>
                                        <p class="card-text">Precio: <?php echo $producto->getPrecio() ?>€</p>
                                        <p class="card-text" id="tipo-producto">Tipo: <?php echo $nombre_tipo_producto ?></p>
                                    </div>
                                </a>
                                <div class="card-footer">
                                    <p class="card-text font-weight-bold" style="font-size: larger;" id="price-producto"><?php echo $producto->getPrecioFinal() ?>€</p>
                                </div>
                                <button class="btn btn-warning w-100 btn-add" data-nombre="<?php echo $producto->getNombre() ?>" data-imagen="<?php echo $producto->getImagenURL() ?>" data-precio="<?php echo $producto->getPrecioFinal() ?>" data-tipo="<?php echo $nombre_tipo_producto ?>">Agregar al carrito</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="d-flex flex-wrap" id="lista-items-filter" style="display: none"></div>
            </div>
            <div class="col-md-4 col-12 px-3" id="div-carrito">

                <div class="d-flex justify-content-between pb-2">
                    <p class="lead font-weight-bold">Carrito:</p>
                    <button class="btn btn-danger btn-small" id="btn-delete-all" style="display: none">Vaciar Carrito</button>
                </div>
                <div class="d-flex">
                    <p class="mx-2">Valor Carrito:</p>
                    <p id="valor-total"></p>
                    <p>€</p>
                </div>
                
                <hr>
                <span class="" id="new-product"></span>
            </div>
        </div>
    </div>
    <?php include '../includes/footer.php';  ?>
    </main>


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